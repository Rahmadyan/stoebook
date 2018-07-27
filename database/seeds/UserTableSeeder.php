<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // $role_employee = Role::where('name', 'employee')->first();
        // $role_manager  = Role::where('name', 'manager')->first();

        
        // $employee = new User();
        // $employee->name = 'Employee Name';
        // $employee->email = 'employee@example.com';
        // $employee->password = bcrypt('secret');
        // $employee->save();
        // $employee->roles()->attach($role_employee);
    
        // $manager = new User();
        // $manager->name = 'Manager Name';
        // $manager->email = 'manager@example.com';
        // $manager->password = bcrypt('secret');
        // $manager->save();
        // $manager->roles()->attach($role_manager);

        // \App\User::insert([
        //     [
        //         'name' => 'kelopo',
        //         'email' => 'naufalhaq24@gmail.com',
        //         'email' => 'naufalhaq24@gmail.com',
        //         'email' => 'naufalhaq24@gmail.com',
        //         'email' => 'naufalhaq24@gmail.com',
        //         'email' => 'naufalhaq24@gmail.com',
        //         'email' => 'naufalhaq24@gmail.com',
        //         'email' => 'naufalhaq24@gmail.com',
        //         'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
        //     ],
        //     [
        //         'subject' => 'degan',
        //         'thread' => 'degan ono opo kelopo ono opo kelopo ono opo kelopo ono opo'
        //         'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
        //     ],
        //     [
        //         'subject' => 'sayur',
        //         'thread' => 'sayur ono opo kelopo ono opo kelopo ono opo kelopo ono opo'
        //         'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
        //     ],
        // ]);

        \App\User::insert([
            [
                'name' => 'nopla',
                'firstname' => 'Naufal',
                'lastname' => 'Haq',
                'email' => 'naufalhaq24@gmail.com',
                'address' => 'sidoarjo',
                'birthdate' => '1996-09-24',
                'phone_number' => '12345670',
                'gender' => '0',
                'avatar' => 'avatar.png',
                'password' => bcrypt('secret'),
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name' => 'wiwid',
                'firstname' => 'Rahmadyan',
                'lastname' => 'Nurwidhi',
                'email' => 'rahmadyan98@gmail.com',
                'address' => 'sidoarjo',
                'birthdate' => '1996-09-24',
                'phone_number' => '1234567',
                'gender' => '0',
                'avatar' => 'zgeist.jpg',
                'password' => bcrypt('secret'),
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'name' => 'rohman',
                'firstname' => 'Rohman',
                'lastname' => 'Rizky',
                'email' => 'rohman@gmail.com',
                'address' => 'sidoarjo',
                'birthdate' => '1996-09-24',
                'phone_number' => '2234567',
                'gender' => '0',
                'avatar' => 'avatar04.png',
                'password' => bcrypt('secret'),
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
