<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table("categories")->insert([
            ['name' => 'Electronics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Clothing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Home & Kitchen', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Health & Beauty', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sports & Outdoors', 'created_at' => now(), 'updated_at' => now()]
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
