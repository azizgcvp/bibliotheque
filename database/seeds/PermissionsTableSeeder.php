<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'title' => 'access_admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Les permissions sont implémentées dans le code, on ne les gère pas via l'admin

        DB::table('permissions')->insert([
            'title' => 'manage_roles',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
