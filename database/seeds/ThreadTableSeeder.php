<?php

use Illuminate\Database\Seeder;

class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Thread::insert([
            [
                'subject'         => 'kelopo',
                'thread'          => 'kelopo ono opo kelopo ono opo kelopo ono opo kelopo ono opo',
            'user_id'         =>'1',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'subject'         => 'degan',
                'thread'          => 'degan ono opo kelopo ono opo kelopo ono opo kelopo ono opo',
            'user_id'         =>'2',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'subject'         => 'sayur',
                'thread'          => 'sayur ono opo kelopo ono opo kelopo ono opo kelopo ono opo',
            'user_id'         =>'4',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}