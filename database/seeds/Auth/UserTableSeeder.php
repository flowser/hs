<?php


use App\Models\Standard\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'first_name'        => 'Felix',
            'last_name'         => 'Nyachio',
            'email'             => 'felixnyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Organisation Superadmin',
            'confirmed'         => true,

        ]);
        User::create([
            'first_name'        => 'Ruth',
            'last_name'         => 'Nyachio',
            'email'             => 'ruthnyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Organisation Admin',
            'confirmed'         => true,

        ]);
        User::create([
            'first_name'        => 'Slayer',
            'last_name'         => 'Nyachio',
            'email'             => 'slayernyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Organisation Accountant',
            'confirmed'         => true,

        ]);
        User::create([
            'first_name'        => 'Steward',
            'last_name'         => 'Nyachio',
            'email'             => 'stewardnyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Bureau Superadmin',
            'confirmed'         => true,

        ]);
        User::create([
            'first_name'        => 'Keith',
            'last_name'         => 'Nyachio',
            'email'             => 'keithnyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Bureau Admin',
            'confirmed'         => true,

        ]);
        User::create([
            'first_name'        => 'Lewis',
            'last_name'         => 'Nyachio',
            'email'             => 'lewisnyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Bureau Accountant',
            'confirmed'         => true,

        ]);
        User::create([
            'first_name'        => 'Essense',
            'last_name'         => 'Nyachio',
            'email'             => 'essencenyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Househelp',
            'confirmed'         => true,

        ]);
        User::create([
            'first_name'        => 'Eunice',
            'last_name'         => 'Nyachio',
            'email'             => 'eunicenyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Client',
            'confirmed'         => true,

        ]);

        $this->enableForeignKeys();
    }
}
