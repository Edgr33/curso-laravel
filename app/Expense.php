<?php

namespace App;

use App\ExpenseReport;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function expenseReport(){
        return $this->belongsTo(ExpenseReport::class);
        //return $this->belongsTo(ExpenseReport::class, 'id');
    }
}
