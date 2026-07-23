<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mongodb')->table('users', function ($collection) {
            # Ensure unique authentication fields
            $collection->index(
                ['email' => 1],
                ['unique' => true]
            );

            $collection->index(
                ['username' => 1],
                ['unique' => true]
            );

            # Optimize user filtering by role
            $collection->index(
                ['role' => 1]
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->table('users', function ($collection) {
            $collection->dropIndex(['email' => 1]);
            $collection->dropIndex(['username' => 1]);
            $collection->dropIndex((['role' => 1]));
        });
    }
};
