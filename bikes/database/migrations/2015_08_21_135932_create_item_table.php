<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->string('item_code')->primary();
            $table->string('invoice_id')->unsignedString();
            $table->foreign('invoice_id')->references('invoice_code')->on('invoice');
            $table->string('description');
            $table->string('gross');
            $table->string('net');
            $table->string('vat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('item');
    }
}
