<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\Subject;
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
        $subjects = [
            'Soep',
            'Wok maaltijd',
            'Broodjes',
            'Bijgerechten',
        ];

        foreach ($subjects as $subject) {
            Subject::factory()->create(['name' => $subject]);
        }

        $soep = Subject::where('name', 'Soep')->first();
        $wok = Subject::where('name', 'Wok maaltijd')->first();
        $broodjes = Subject::where('name', 'Broodjes')->first();
        $bijgerechten = Subject::where('name', 'Bijgerechten')->first();

        $soepen = [
            ['subject_id' => $soep->id, 'name' => 'Wantan soep', 'description' => 'Wan tan soep (ook wel wonton) is een bouillonachtige soep met daarin gekookte, delicate wantans', 'price' => 4.00],
            ['subject_id' => $soep->id, 'name' => 'tomatensoep', 'description' => 'Tomatensoep heeft relatief weinig calorieën - vooral als je gaat voor een variant met veel groente en zónder room', 'price' => 3.20],
            ['subject_id' => $soep->id, 'name' => 'Kippensoep', 'description' => 'Wil je afvallen met soep, kies dan voor kippensoep. Dit is in de eerste instantie een gezondheidsrecept.', 'price' => 3.20],
            ['subject_id' => $soep->id, 'name' => 'Champignonsoep', 'description' => 'Champignonsoep is een gebonden soep, die wordt bereid door een roux te verdunnen met room en paddenstoelenbouillon.', 'price' => 3.20],
            ['subject_id' => $soep->id, 'name' => 'Noedelsoep', 'description' => 'Een noodle soep kun je zo uitgebreid maken als je wilt. Voor een snelle versie kook je kip in bouillon, groente toevoegen en op het laatst de noodles erbij', 'price' => 7.95],
        ];

        $wokie = Subject::where('name', 'Wok maaltijd')->first();

        $wokken = [
            ['subject_id' => $wokie->id, 'name' => 'Groente', 'description' => 'Het enige verschil tussen roerbakken en wokken is eigenlijk dat er wordt gekozen voor andere groentes', 'price' => 3.95],
            ['subject_id' => $wokie->id, 'name' => 'Tofu', 'description' => 'Wil je vanavond iets gezonds op tafel zetten, maar geen zin om heel uitgebreid te koken? Dan is deze wokmaaltijd met tofu iets voor jou', 'price' => 4.30],
            ['subject_id' => $wokie->id, 'name' => 'Kipfilet', 'description' => 'Door je gerecht te wokken behouden de ingrediënten het grootste deel van de voedingsstoffen', 'price' => 4.50],
            ['subject_id' => $wokie->id, 'name' => 'varkenshaas', 'description' => 'Door je gerecht te wokken behouden de ingrediënten het grootste deel van de voedingsstoffen', 'price' => 4.50],
            ['subject_id' => $wokie->id, 'name' => 'Visfilet', 'description' => 'Door je gerecht te wokken behouden de ingrediënten het grootste deel van de voedingsstoffen', 'price' => 4.95],
            ['subject_id' => $wokie->id, 'name' => 'Biefstuk', 'description' => 'Door je gerecht te wokken behouden de ingrediënten het grootste deel van de voedingsstoffen', 'price' => 5.50],
            ['subject_id' => $wokie->id, 'name' => 'Garnalen', 'description' => 'Door je gerecht te wokken behouden de ingrediënten het grootste deel van de voedingsstoffen', 'price' => 5.50],
            ['subject_id' => $wokie->id, 'name' => 'Babi Pangang', 'description' => 'Door je gerecht te wokken behouden de ingrediënten het grootste deel van de voedingsstoffen', 'price' => 4.50],
            ['subject_id' => $wokie->id, 'name' => 'Sate kip', 'description' => 'Door je gerecht te wokken behouden de ingrediënten het grootste deel van de voedingsstoffen', 'price' => 3.95],
            ['subject_id' => $wokie->id, 'name' => 'Foe long hai', 'description' => 'Door je gerecht te wokken behouden de ingrediënten het grootste deel van de voedingsstoffen', 'price' => 3.95],
            ['subject_id' => $wokie->id, 'name' => 'Koe Loe kip', 'description' => 'Door je gerecht te wokken behouden de ingrediënten het grootste deel van de voedingsstoffen', 'price' => 4.50],
            ['subject_id' => $wokie->id, 'name' => 'Babi pangang spek', 'description' => 'Door je gerecht te wokken behouden de ingrediënten het grootste deel van de voedingsstoffen', 'price' => 4.50],
            ['subject_id' => $wokie->id, 'name' => 'Cha Sieuw', 'description' => 'Door je gerecht te wokken behouden de ingrediënten het grootste deel van de voedingsstoffen', 'price' => 4.50],
        ];

        foreach ($soepen as $soepie) {
            MenuItem::create($soepie);
        }

        foreach ($wokken as $wok) {
            MenuItem::create($wok);
        }


        $batch = Batch::factory()->create();
        User::factory()
            ->hasOrders(1)
            ->create([
                'email' => 'martijn.dorsman@gmail.com',
                'password' => Hash::make('password'),
            ]);

        $batch->orders()->saveMany(Order::factory()->count(10)->create());
    }
}
