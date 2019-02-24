<?php

namespace App\Http\Controllers\Auth;


use App\Models\Standard\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'user_type' => ['required', 'string', 'min:6'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'first_name'        => $data['first_name'],
            'last_name'         => $data['last_name'],
            'email'             => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type'         => $data['user_type'],
            'active'            => true,
            'confirmed'         => true,
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
        ]);

        // See if adding any additional permissions
        // if (! isset($data['permissions']) || ! count($data['permissions'])) {
        //     $data['permissions'] = [];
        // }

        if ($user) {
            // User must have at least one role
            // if (! count($data['roles'])) {
            //     throw new GeneralException(__('This User Needs atleast One Role'));
            // }

            // Add selected roles/permissions
            // $user->syncRoles($data['roles']);
            // $user->syncPermissions($data['permissions']);
            $user->assignRole('Organisation Superadmin');
            $user ->givePermissionTo('View Backend');

            //Send confirmation email if requested and account approval is off
            // if (isset($data['confirmation_email']) && $user->confirmed == 0 && ! config('access.users.requires_approval')) {
            //     $user->notify(new UserNeedsConfirmation($user->confirmation_code));
            // }

            // event(new UserCreated($user));

            return $user;
        }

    }
}
