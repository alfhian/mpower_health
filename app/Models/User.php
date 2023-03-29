<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Mail\SendCodeMail;

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
}
