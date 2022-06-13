<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEasyinvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('easyinvoices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('invoice_number');
            $table->date('invoice_date');
            $table->string('invoice_location');
            $table->string('invoicetotal');
            $table->string('employee');
            $table->string('customer');
            $table->string('nit');
            $table->string('cellphone');
            $table->string('invoice_info');
            $table->string('invoice_typepayment');
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
        Schema::dropIfExists('easyinvoices');
    }
}
