<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'add-post'],
            ['name' => 'view-post'],
            ['name' => 'edit-post'],
            ['name' => 'delete-post'],
            ['name' => 'add-user']
        ]);
    }
}
