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

        ]);//2
        User::create([
            'first_name'        => 'Ruth',
            'last_name'         => 'Nyachio',
            'email'             => 'ruthnyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Organisation Admin',
            'confirmed'         => true,

        ]);//3
        User::create([
            'first_name'        => 'Slayer',
            'last_name'         => 'Nyachio',
            'email'             => 'slayernyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Organisation Accountant',
            'confirmed'         => true,

        ]);//4
        User::create([
            'first_name'        => 'Steward',
            'last_name'         => 'Nyachio',
            'email'             => 'stewardnyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Bureau Superadmin',
            'confirmed'         => true,

        ]);//5
        User::create([
            'first_name'        => 'Keith',
            'last_name'         => 'Nyachio',
            'email'             => 'keithnyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Bureau Admin',
            'confirmed'         => true,

        ]);//6
        User::create([
            'first_name'        => 'Lewis',
            'last_name'         => 'Nyachio',
            'email'             => 'lewisnyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Bureau Accountant',
            'confirmed'         => true,

        ]);//7
        User::create([
            'first_name'        => 'Essense',
            'last_name'         => 'Nyachio',
            'email'             => 'essencenyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Househelp',
            'confirmed'         => true,

        ]);//8
        User::create([
            'first_name'        => 'Raxon',
            'last_name'         => 'Nyachio',
            'email'             => 'raxonnyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Househelp',
            'confirmed'         => true,

        ]);//9
        User::create([
            'first_name'        => 'Eunice',
            'last_name'         => 'Nyachio',
            'email'             => 'eunicenyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Client',
            'confirmed'         => true,

        ]);//10
        User::create([
            'first_name'        => 'Mexvill',
            'last_name'         => 'Nyachio',
            'email'             => 'mexvillnyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Client',
            'confirmed'         => true,

        ]);//11
        User::create([
            'first_name'        => 'Onsombi',
            'last_name'         => 'Nyachio',
            'email'             => 'onsombinyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Kin',
            'confirmed'         => true,

        ]);//12
        User::create([
            'first_name'        => 'kerubo',
            'last_name'         => 'Nyachio',
            'email'             => 'kerubonyachio@teifinnovate.foundation',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'user_type'        => 'Kin',
            'confirmed'         => true,

        ]);

        $this->enableForeignKeys();
    }
}
