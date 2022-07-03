<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatakaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datakaryawan', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('nama_karyawan');
            $table->string('jabatan');
            $table->string('jenis_kelamin');
            $table->text('alamat_karyawan');
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
        Schema::dropIfExists('datakaryawan');
    }
}
