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
            // Role
            ['role-list', 2],
            ['role-create', 1],
            ['role-update', 1],
            ['role-delete', 1],
            // User
            ['user-list', 2],
            ['user-create', 1],
            ['user-update', 1],
            ['user-delete', 1],
            // Personne
            ['personne-list', 2],
            ['personne-create', 1],
            ['personne-update', 1],
            ['personne-delete', 1],
            // Cours
            ['cours-list', 4],
            ['cours-create', 3],
            ['cours-update', 3],
            ['cours-delete', 3],
            // Chapitre
            ['chapitre-list', 4],
            ['chapitre-create', 3],
            ['chapitre-update', 3],
            ['chapitre-delete', 3],
            // Session
            ['session-list', 4],
            ['session-create', 3],
            ['session-update', 3],
            ['session-delete', 3],
            // Auteur
            ['auteur-list', 4],
            ['auteur-create', 3],
            ['auteur-update', 3],
            ['auteur-delete', 3]
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission[0], 'level' => $permission[1]]);
        }
    }
}
