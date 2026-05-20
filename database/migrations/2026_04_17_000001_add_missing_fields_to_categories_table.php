<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasColumn('categories', 'title')) {
                $table->string('title')->after('name');
            }
            if (!Schema::hasColumn('categories', 'sub_title')) {
                $table->string('sub_title')->after('title');
            }
            if (!Schema::hasColumn('categories', 'content')) {
                $table->text('content')->nullable()->after('sub_title');
            }
            if (!Schema::hasColumn('categories', 'image')) {
                $table->string('image')->nullable()->after('description');
            }
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'image')) {
                $table->dropColumn('image');
            }
            if (Schema::hasColumn('categories', 'content')) {
                $table->dropColumn('content');
            }
            if (Schema::hasColumn('categories', 'sub_title')) {
                $table->dropColumn('sub_title');
            }
            if (Schema::hasColumn('categories', 'title')) {
                $table->dropColumn('title');
            }
        });
    }
};
