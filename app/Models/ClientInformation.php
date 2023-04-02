<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class ClientInformation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded  = [];
    protected $dates    = ['deleted_at'];

    protected $casts = [
        'firstname'         => 'encrypted',
        'lastname'          => 'encrypted',
        'birthdate'         => 'encrypted',
        'phone_number'      => 'encrypted',
        'street_address'    => 'encrypted',
        'street_address_2'  => 'encrypted',
        'city'              => 'encrypted',
        'state_province'    => 'encrypted',
        'postal_code'       => 'encrypted',
        'country'           => 'encrypted',
        'terms_agreed'      => 'encrypted',
        'policy_agreed'     => 'encrypted',
        'marketing_agreed'  => 'encrypted',
    ];

    public static function edit($request)
    {
        $client = ClientInformation::find(Auth::id());

        $client->firstname         = $request->firstname;
        $client->lastname           = $request->lastname;
        $client->street_address     = $request->street_address;
        $client->street_address_2   = $request->street_address_2;
        $client->city               = $request->city;
        $client->state_province     = $request->state_province;
        $client->postal_code        = $request->postal_code;
        $client->country            = $request->country;
        $client->save();

        return $client;
    }
}
