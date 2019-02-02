<?php

use Illuminate\Database\Seeder;

/**
 * Class AuthTableSeeder.
 */
class AuthTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $this->truncateMultiple([
            config('permission.table_names.model_has_permissions'),
            config('permission.table_names.model_has_roles'),
            config('permission.table_names.role_has_permissions'),
            config('permission.table_names.permissions'),
            config('permission.table_names.roles'),
            'users',
                      
        ]);

        $this->call(UserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);        
        $this->call(CountryTableSeeder::class);
        $this->call(CountyTableSeeder::class);
        $this->call(TownTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(TribeTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(EducationTableSeeder::class);
        $this->call(ExperienceTableSeeder::class);
        $this->call(MaritalstatusTableSeeder::class);
        $this->call(OperationTableSeeder::class);
        $this->call(SkillTableSeeder::class);
        $this->call(DurationTableSeeder::class);
        $this->call(EnglishstatusTableSeeder::class);
        $this->call(HealthstatusTableSeeder::class);
        $this->call(IdstatusTableSeeder::class);
        $this->call(SkillTableSeeder::class);
        $this->call(KidTableSeeder::class);        
        $this->enableForeignKeys();
    }
}
