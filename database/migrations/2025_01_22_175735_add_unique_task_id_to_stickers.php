<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueTaskIdToStickers extends Migration
{
    public function up()
    {
        Schema::table('stickers', function (Blueprint $table) {
            // First add the column as nullable
            $table->string('task_id')->after('id')->nullable();
        });

        // Populate existing rows with unique values
        \App\Models\Sticker::query()->each(function ($sticker) {
            $sticker->task_id = uniqid();
            $sticker->save();
        });

        Schema::table('stickers', function (Blueprint $table) {
            // Then make it unique and non-nullable
            $table->string('task_id')->nullable(false)->change();
            $table->unique('task_id');
        });
    }

    public function down()
    {
        Schema::table('stickers', function (Blueprint $table) {
            $table->dropUnique('stickers_task_id_unique');
        });
    }
}
