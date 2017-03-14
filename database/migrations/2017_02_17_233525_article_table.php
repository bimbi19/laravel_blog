<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
                    $table->string('id_artikel' ,32)->primary();
                    $table->string('user_id' ,32)->foreign;                   
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
        //
    }
}
