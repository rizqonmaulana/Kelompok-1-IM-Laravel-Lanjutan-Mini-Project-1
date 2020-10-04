<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema tabel mata_kuliah
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->primary('id');
            $table->string('id');
            $table->string('kode_mata_kuliah')->unique();
            $table->string('nama_mata_kuliah');
            $table->string('sks');
            $table->string('nip_dosen');
            $table->timestamps();
        });

        // Schema::create('dosen', function(Blueprint $table){
        //     $table->primary('dosen_id');
        //     $table->string('nip');
        //     $table->string('nama');
        // });

        // Schema foreign key
        // Schema::table('dosen', function(Blueprint $table){
        //     $table->foreign('nip_dosen')
        //           ->references('nip')
        //           ->On('dosen');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_kuliah');
    }
}
