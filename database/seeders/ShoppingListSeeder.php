<?php

namespace Database\Seeders;

use App\Models\ShoppingList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoppingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShoppingList::create([
            'user_id' => 1
        ]);
    }
}
