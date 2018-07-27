<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::insert([
            [
                'name' => 'manager',
                'level' => '2',
                'parent' => '1',
                'description' => 'A Manager',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name' => 'employee',
                'level' => '5',
                'parent' => '4',
                'description' => 'A Employee',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            
    ]);
    }
}
