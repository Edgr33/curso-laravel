<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableExpenseReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



     //PARA AÑADIR UNA NUEVA COLUMNA A UNA MIGRACION YA EXISTENTE SE RECOMIENDA USAR EL SIGUIENTE COMANDO EN LA CONSOLA
     //primero se crea un nuevo archivo de migracion pero utilizando el comando table
     //EJ: php artisan make:migration (nombre descriptivo)= add_phone_to_messages_table --table=expense_reports(TABLA A MODIFICAR)
    
     public function up()
    {
        Schema::create('expense_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
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
        Schema::dropIfExists('expense_reports');
    }
}
