<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Plan;
use App\Models\Product;
use Illuminate\Database\Seeder;

class UATSeeder extends Seeder
{
    public function run(): void
    {
        $collection = Collection::updateOrCreate(
            ['name' => 'Gold Necklace'],
            [
                'description' => 'Gold collection created for UAT testing.',
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Gold Classic Test Ring'],
            [
                'category' => 'Gold',
                'price' => 18500,
                'mrp' => 22000,
                'weight' => '4.5g',
                'description' => 'Classic gold ring added for DEV/TEST environment testing.',
                'image' => null,
                'is_featured' => true,
                'is_new_arrival' => true,
                'collection_id' => $collection->id,
            ]
        );

        Plan::updateOrCreate(
            ['name' => 'Gold Plus Test Plan'],
            [
                'short_description' => 'Flexible gold savings plan for monthly investments.',
                'duration_months' => 10,
                'minimum_amount' => 2000,
            ]
        );

        $this->command->info('UAT data seeded successfully.');
    }
}