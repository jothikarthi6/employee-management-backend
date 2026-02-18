<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employees')->insert([
            ['name' => 'Alice Johnson', 'email' => 'alice@company.com', 'department' => 'Engineering', 'position' => 'Senior Dev',     'joined_date' => '2016-03-15', 'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bob Smith',     'email' => 'bob@company.com',   'department' => 'Design',      'position' => 'UI Designer',    'joined_date' => '2019-07-22', 'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Carol White',   'email' => 'carol@company.com', 'department' => 'HR',          'position' => 'HR Manager',     'joined_date' => '2015-01-10', 'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['name' => 'David Brown',   'email' => 'david@company.com', 'department' => 'Engineering', 'position' => 'Backend Dev',    'joined_date' => '2018-11-05', 'status' => 'inactive', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Eva Martinez',  'email' => 'eva@company.com',   'department' => 'Marketing',   'position' => 'SEO Specialist', 'joined_date' => '2014-06-30', 'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Frank Lee',     'email' => 'frank@company.com', 'department' => 'Finance',     'position' => 'Accountant',     'joined_date' => '2021-09-01', 'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grace Kim',     'email' => 'grace@company.com', 'department' => 'Engineering', 'position' => 'DevOps',         'joined_date' => '2013-04-18', 'status' => 'active',   'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Henry Wilson',  'email' => 'henry@company.com', 'department' => 'Sales',       'position' => 'Sales Lead',     'joined_date' => '2017-12-20', 'status' => 'inactive', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}