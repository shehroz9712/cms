<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $users = [
            [
                'title' => 'home',
                'slug' => 'home',
                'content' => '<p>abc</p>',
                'meta_title' => Hash::make('admin123'),
                'meta_desc' => 'abc',
                'meta_keyword' => 'abc',
                'status' => 1,
            ],

        ];

        DB::table('pages')->insert($users);
    }
}
