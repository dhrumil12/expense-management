<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Expense;
use Faker\Factory as Faker;

class ExpenseTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all()->pluck('id')->toArray();
        $type = ['Expense','Income'];
        foreach(range(1,50) as $index){
            $company = Expense::create([
                'user_id' => $faker->randomElement($users),
                'type' => $type[array_rand($type, 1)],
                'amount' => number_format((float)rand(1000,10000), 2, '.', ''),
                'date' => date('Y-m-d'),
            ]);
        }
    }
}
