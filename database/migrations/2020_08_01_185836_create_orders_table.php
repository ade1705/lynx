<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->enum('order_has_paid', ['yes', 'no'])->default('no');
            $table->enum('order_status', ['in-progress', 'pending', 'delayed', 'completed'])->default('pending');
            $table->integer('order_provider_id');
            $table->integer('order_service_id');
            $table->integer('order_customer_id');
            $table->text('order_job_name');
            $table->text('order_details');
            $table->text('order_price');
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
        Schema::dropIfExists('orders');
    }
}
