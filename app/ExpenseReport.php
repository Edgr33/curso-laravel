<?php

namespace App;

use App\Expense;
use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{

    protected $table="expense_reports";
    //funcion para crear una relacion entre el modelo ExpenseReport y el modelo Expense
    public function expenses() {
        return $this->hasMany(Expense::class);
        //return $this->hasMany(Expense::class,'expense_report_id');
    }
}
