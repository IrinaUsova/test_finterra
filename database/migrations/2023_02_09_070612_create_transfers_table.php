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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('men_from_id')->nullable();
            $table->unsignedBigInteger('men_to_id')->nullable();
            $table->float('sum')->default(0);
            $table->dateTime('date_transfer', $precision = 0);
            $table->timestamps();
            $table->SoftDeletes();

            $table->index('men_from_id', 'transfer_men_from_idx');
            $table->foreign('men_from_id', 'transfer_men_from_fk')->on('men')->references('id');
            $table->index('men_to_id', 'transfer_men_to_idx');
            $table->foreign('men_to_id', 'transfer_men_to_fk')->on('men')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
};
