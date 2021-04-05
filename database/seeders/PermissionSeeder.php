<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['role-list', 2],
            ['role-create', 1],
            ['role-edit', 1],
            ['role-delete', 1],
            // Cours
            ['cours-list', 4],
            ['cours-create', 3],
            ['cours-edit', 3],
            ['cours-delete', 3],
            // Chapitre
            ['chapitre-list', 4],
            ['chapitre-create', 3],
            ['chapitre-edit', 3],
            ['chapitre-delete', 3],
            // Session
            ['session-list', 4],
            ['session-create', 3],
            ['session-edit', 3],
            ['session-delete', 3]
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission[0], 'level' => $permission[1]]);
        }
    }
}
