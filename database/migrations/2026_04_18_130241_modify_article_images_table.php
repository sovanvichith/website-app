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
        Schema::table('article_images', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->renameColumn('image', 'image_path');
            $table->foreignId('article_id')->constrained('articles')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('article_images', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropColumn('article_id');
            $table->renameColumn('image_path', 'image');
            $table->string('title')->after('id');
        });
    }
};
