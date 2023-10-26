<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $incomeCategories = ['Wage', 'Bonus', 'Gift'];
        $expenseCategories = ['Food & Drinks', 'Shopping', 'Charity', 'Housing', 'Insurance', 'Transportation'];

        for ($i = 0; $i < 100; $i++){
            $amount = $faker->randomFloat(1, 1, 100);
            $type = $faker->randomElement(['Income', 'Expense']);
            $category = $type === 'Income' ? $faker->randomElement($incomeCategories) : $faker->randomElement($expenseCategories);
            $notes = $faker->text(100);
            $created_at = $faker->dateTimeBetween('-1 year', 'now');

            DB::table('transactions')->insert([
                'amount' => $amount,
                'type' => $type,
                'category' => $category,
                'notes' => $notes,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
        }
    }
}
