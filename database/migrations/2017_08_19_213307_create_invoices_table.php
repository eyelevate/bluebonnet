<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('employee_id');
            $table->integer('vendor_id')->nullable();
            $table->string('fob')->nullable();
            $table->string('po_number')->nullable();
            $table->string('requisitioner')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('subtotal', 11, 2)->nullable();
            $table->decimal('tax', 11, 2)->nullable();
            $table->decimal('total', 11, 2)->nullable();
            $table->decimal('tendered', 11, 2)->nullable();
            $table->tinyInteger('payment_type')->default(1);
            $table->string('last_four')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('street')->nullable();
            $table->string('suite')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('terms')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('invoices');
    }
}
