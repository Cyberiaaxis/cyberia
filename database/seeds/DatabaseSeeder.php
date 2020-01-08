<?php

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => "create",
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => "edit",
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => "delete",
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => "lock",
            'guard_name' => 'web',
        ]);
    }
}



