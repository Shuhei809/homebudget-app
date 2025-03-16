<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BudgetCategory;

class BudgetCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BudgetCategory::create(['name' => '食費']);
        BudgetCategory::create(['name' => '日用品']);
        BudgetCategory::create(['name' => '交通費']);
        BudgetCategory::create(['name' => '水道・光熱費']);
        BudgetCategory::create(['name' => '通信費']);
        
    }
}
