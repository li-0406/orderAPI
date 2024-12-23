<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name'=>'PHP'],
            ['name'=>'JavaScript'],
            ['name'=>'Python'],
            ['name'=>'Java'],
            ['name'=>'C++'],
            ['name'=>'Ruby'],
        ]);
    }
}