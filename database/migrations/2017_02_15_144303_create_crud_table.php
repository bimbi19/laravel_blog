<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crud', function (Blueprint $table) {
                    $table->string('id' ,32)->primary();
                    $table->string('judul');
                    $table->string('slug_judul');                    
                    $table->text('isi');
                    $table->string('komentar');
                    $table->string('rating');
                    $table->string('gambar');                    
                    $table->rememberToken();
                    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('crud');
    }
}
