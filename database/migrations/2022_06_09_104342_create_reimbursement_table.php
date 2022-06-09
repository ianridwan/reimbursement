<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reimbursement', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengajuan');
            $table->string('jenis_pengajuan',2);
            $table->text('alasan');
            $table->string('klien');
            $table->string('status',2);
            $table->string('bukti');
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
        Schema::dropIfExists('reimbursement');
    }
};
