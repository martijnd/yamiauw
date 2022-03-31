<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $batch = Batch::factory()->create();
        User::factory()
        ->hasOrders(1)
        ->create([
            'email' => 'martijn.dorsman@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $batch->orders()->saveMany(Order::factory()->hasMenuItems(10)->count(10)->create());
    }
}
