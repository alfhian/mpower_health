<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Mail\SendCodeMail;
use App\Models\LabResult;
use App\Models\ClientInformation;

use Exception;
use Mail;
use Hash;
use Auth;
use DB;
use Session;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'password',
        'status',
        'user_input',
        'user_update',
        'user_delete'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function generateCode()
    {
        $code = rand(1000, 9999);

        $email = Session::get('email');

        $user = User::where('email', $email)->get();
  
        UserCode::updateOrCreate(
            [ 'user_id' => $user[0]['id'] ],
            [ 'code'    => $code ]
        );

        Session::put('2fa_code', $code);
    
        try {
            $details = [
                'title' => 'Authentication Code from MPower Health',
                'code'  => $code
            ];
             
            Mail::to(Session::get('email'))->send(new SendCodeMail($details));
        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }

    public static function checkLimit($email) {
        $limit = User::select('reset_password_limit')
                    ->where('email', $email)
                    ->get();

        return $limit;
    }

    public static function deactivate() {
        $deactivate = User::leftJoin('log_management as b', function($join) {
                            $join->on('b.user_input', '=', 'users.id')
                                ->on('b.created_at', '>=', DB::raw('DATE_ADD(CURDATE(), INTERVAL -6 MONTH)'));
                        })
                        ->where('b.created_at', NULL)
                        ->where('users.role_id', 1)
                        ->groupBy('users.id');

        $get_group_id = $inactive_user->select(DB::raw('GROUP_CONCAT(users.id) as id'))->get();

        $group_id = explode(',', $get_group_id[0]['id']);

        $lab_result = LabResult::whereIn('client_id', $group_id)->delete();

        $client_information = ClientInformation::whereIn('id', $group_id)->delete();                
        
        $deactivate = $deactivate->update([
                        'status' => 'N'
                    ]);

        return $deactivate;
    }

    public static function deleteInactive() {
        $inactive_user = User::leftJoin('log_management as b', function($join) {
                                $join->on('b.user_input', '=', 'users.id')
                                    ->on('b.created_at', '>=', DB::raw('DATE_ADD(CURDATE(), INTERVAL -1 YEAR)'));
                            })
                            ->where('b.created_at', NULL)
                            ->where('users.role_id', 1)
                            ->groupBy('users.id');

        $get_group_id = $inactive_user->select(DB::raw('GROUP_CONCAT(users.id) as id'))->get();

        $group_id = explode(',', $get_group_id[0]['id']);

        $lab_result = LabResult::whereIn('client_id', $group_id)->forceDelete();

        $client_information = ClientInformation::whereIn('id', $group_id)->forceDelete();

        $delete = $inactive_user->forceDelete();

        return $delete;
    }
}
