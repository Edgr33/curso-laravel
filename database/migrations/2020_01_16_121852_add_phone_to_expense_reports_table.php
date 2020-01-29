<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToExpenseReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   //añadira el contenido del siguiente codigo a la tabla expense_reports
        Schema::table('expense_reports', function (Blueprint $table) {
            //$table->string('phone')->after('email')->nullable();     //comando ->after('') agregara la nueva columna despues de la columna indicada como parametro
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expense_reports', function (Blueprint $table) {
            //$table->dropColumn('phone');    //borra la columna 'phone' al realizar rollback
        });
    }
}
