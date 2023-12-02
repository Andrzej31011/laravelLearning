<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Services\EmailVerificationService;
use Illuminate\Validation\ValidationException;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    protected $emailVerification;

    public function __construct(EmailVerificationService $emailVerification)
    {
        $this->emailVerification = $emailVerification;
    }

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $isValidEmail = $this->emailVerification->verifyEmail($input['email']);

        if (!$isValidEmail) {
            throw ValidationException::withMessages(['email' => 'Podany adres email jest nieprawidłowy lub nie istnieje.']);
        }
        

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'voievodeship' => ['required', 'min:1'],
            'shoe_number' => ['numeric', 'nullable'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'voievodeship' => $input['voievodeship'],
            'shoe_number' => $input['shoe_number'],
        ]);
    }
}
