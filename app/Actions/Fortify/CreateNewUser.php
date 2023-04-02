<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\ClientInformation;
use App\Models\LogManagement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Crypt;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email_confirmation' => ['required', 'string', 'same:email'],
            'birthdate' => ['required', 'date'],
            'mothers_name' => ['required', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:13'],
            'phone_number_confirmation' => ['required', 'string', 'max:13', 'same:phone_number'],
            'street_address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:50'],
            'postal_code' => ['required', 'string', 'max:6'],
            'password' => ['required', $this->passwordRules()],
            'password_confirmation' => ['required', $this->passwordRules(), 'same:password'],
            'country' => ['required', 'string'],
            'terms_date' => ['required', 'date'],
            'policy_date' => ['required', 'date'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        
        $user = User::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => 1,
            'user_input' => 'REGISTRATION'
        ]);

        $client = User::where('email', $input['email'])->get();

        $update_user = User::find($client[0]['id']);
        $update_user->role_id = 1;
        $update_user->user_input = $client[0]['id'];
        $update_user->save();

        ClientInformation::create([
            'id' => $client[0]['id'],
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'birthdate' => $input['birthdate'],
            'phone_code' => '+1',
            'phone_number' => $input['phone_number'],
            'mothers_name' => $input['mothers_name'],
            'street_address' => $input['street_address'],
            'street_address_2' => $input['street_address_2'],
            'city' => $input['city'],
            'state_province' => $input['state_province'],
            'postal_code' => $input['postal_code'],
            'country' => $input['country'],
            'terms_agreed' => $input['terms_date'],
            'policy_agreed' => $input['policy_date'],
            'marketing_agreed' => $input['marketing_date'],
            'user_input' => $client[0]['id'],
        ]);

        // Save Log
        $log_data   = \Location::get();
        $log_detail = [
            'url'       => url()->current(),
            'action'    => 'Create New Account from Register page'
        ];
        $log        = LogManagement::store($log_data, $log_detail);

        return $user;
    }
}
