<?php



use App\Models\Standard\User;
use Illuminate\Database\Seeder;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleTableSeeder extends Seeder
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

       User::find(1)->assignRole('Organisation Superadmin');
       User::find(2)->assignRole('Organisation Admin');
       User::find(3)->assignRole('Organisation Accountant');
       User::find(4)->assignRole('Bureau Superadmin');
       User::find(5)->assignRole('Bureau Admin');
       User::find(6)->assignRole('Bureau Accountant');
       User::find(7)->assignRole('Househelp');
       User::find(8)->assignRole('Client');

       User::find(1)->givePermissionTo('View Backend');
       User::find(2)->givePermissionTo('View Backend');
       User::find(3)->givePermissionTo('View Backend');
       User::find(4)->givePermissionTo('View Backend');
       User::find(5)->givePermissionTo('View Backend');
       User::find(6)->givePermissionTo('View Backend');
       User::find(7)->givePermissionTo('View Frontend');
       User::find(8)->givePermissionTo('View Frontend');

        $this->enableForeignKeys();
    }
}
