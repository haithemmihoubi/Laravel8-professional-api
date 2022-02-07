<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageManupulationsTable extends Migration
{

    public function up()
    {
        Schema::create('image_manupulations', static function (Blueprint $table) {
            $table->id();
            $table->String('name', 2000);
            $table->String('path', 2000);
            $table->String('type', 255);
            $table->String('data');
            $table->String('output_path', 2000)->nullable();
            $table->foreignIdFor(\App\Models\User::class, 'user_id')->nullable();
            $table->foreignIdFor(\App\Models\Album::class, 'album_id')->nullable();
            $table->timestamp('created_at')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_manupulations');
    }
}
