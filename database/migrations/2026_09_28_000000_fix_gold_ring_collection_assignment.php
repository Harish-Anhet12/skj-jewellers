<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $collectionId = DB::table('collections')
            ->where('name', 'Gold Necklace')
            ->value('id');

        if ($collectionId) {
            DB::table('products')
                ->where('name', 'Gold Ring')
                ->update([
                    'collection_id' => $collectionId,
                ]);
        }
    }

    public function down(): void
    {
        $collectionId = DB::table('collections')
            ->where('name', 'Gold Necklace')
            ->value('id');

        if ($collectionId) {
            DB::table('products')
                ->where('name', 'Gold Ring')
                ->update([
                    'collection_id' => null,
                ]);
        }
    }
};