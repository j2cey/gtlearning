<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(SettingSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        //$this->call(PersonneSeeder::class);
        //$this->call(AuteurSeeder::class);
        $this->call(NiveauSeeder::class);
        $this->call(ClasseSeeder::class);

        $this->call(TestDataSeeder::class);
    }
}
