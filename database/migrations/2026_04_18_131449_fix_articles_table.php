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
        Schema::table('articles', function (Blueprint $table) {
            // Rename categories_id to category_id
            $table->renameColumn('categories_id', 'category_id');

            // Modify title to varchar(50)
            $table->string('title', 50)->change();

            // Modify description to varchar(200)
            $table->string('description', 200)->change();

            // Drop unnecessary columns
            $table->dropColumn('slug');
            $table->dropColumn('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->renameColumn('category_id', 'categories_id');
            $table->string('title')->change();
            $table->string('description')->change();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
        });
    }
};
