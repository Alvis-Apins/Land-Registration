<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\LandUnit;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        DB::table('land_usages')->insert([
            [
                'category' => 'Agricultural land',
                'identification' => 011,
                'type'=> 'Arable land',
                'created_at' => now()
            ],
            [
                'category' => 'Agricultural land',
                'identification' => 012,
                'type'=> 'Fruit garden',
                'created_at' => now()
            ],
            [
                'category' => 'Agricultural land',
                'identification' => 013,
                'type'=> 'Meadow',
                'created_at' => now()
            ],
            [
                'category' => 'Agricultural land',
                'identification' => 014,
                'type'=> 'Pasture',
                'created_at' => now()
            ],
            [
                'category' => 'Forest',
                'identification' => 021,
                'type'=> 'Forest',
                'created_at' => now()
            ],
            [
                'category' => 'Shrubbery',
                'identification' => 031,
                'type'=> 'Shrubbery',
                'created_at' => now()
            ],
            [
                'category' => 'Swamp',
                'identification' => 041,
                'type'=> 'Swamp',
                'created_at' => now()
            ],
            [
                'category' => 'Land of water features',
                'identification' => 051,
                'type'=> 'Earth under the waters',
                'created_at' => now()
            ],
            [
                'category' => 'Land of water features',
                'identification' => 052,
                'type'=> 'The land under the fish ponds',
                'created_at' => now()
            ],
            [
                'category' => 'Land under buildings and yards',
                'identification' => 061,
                'type'=> 'Land under buildings and yards',
                'created_at' => now()
            ],
            [
                'category' => 'Land under the roads',
                'identification' => 071,
                'type'=> 'Land under the roads',
                'created_at' => now()
            ],
            [
                'category' => 'Other lands',
                'identification' => 82,
                'type'=> 'Other lands',
                'created_at' => now()
            ],
        ]);


        Client::factory(50)
            ->create()
            ->each(function ($client) {
                Property::factory(rand(0,15))
                    ->create(['client_id' => $client->id])
                    ->each(function ($property) {
                        LandUnit::factory(rand(0,25))
                            ->create(['property_id' => $property->id]);
                    });
            });
    }
}
