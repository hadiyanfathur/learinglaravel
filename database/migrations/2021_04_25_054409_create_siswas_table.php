<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->char('nisn', 10);
            $table->char('nis', 10);
            $table->string('nama', 100);
            $table->foreignId('kelas_id')
                ->constrained('kelas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('alamat', 255)->nullable();
            $table->string('telp', 13)->nullable();
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
        Schema::dropIfExists('siswa');
    }
}
