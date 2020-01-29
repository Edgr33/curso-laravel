<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpenseReport;
use App\Expense;
use Mail;
use App\Mail\SummaryReport;

class ExpenseReportController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenseReports = ExpenseReport::all();

        return view('expenseReport.index', compact('expenseReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //METODO PARA VALIDACION DE CAMPOS INPUT
        //EN CASO DE QUE SE QUIERA INCLUIR MAS DE UN METODO DE VALIDACION, SE PUEDE UTILIZAR EL SIMBOLO: "|" PARA SEPARARLOS 
        //segun la documentacion de laravel, en este caso se le esta pidiendo al campo que debe es obligatorio
        //llenarlo y que ademas debe tener como minimo 3 caracteres.
        $validData = $request->validate([
            'title' => 'required|min:3'
        ]);

        $report = new ExpenseReport();
        $report->title = $request->input('title');
        $report->save();

        return redirect('expense_reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*     public function show($id)
    {
        $report = ExpenseReport::findOrFail($id);

        return view('expenseReport.show', ['report' => $report]);
    }
 */

//Metodo para utilizar la funcion findOrFail de manera mas simple. conocida como "model binding"
//equivalente a funcion "show" de arriba. En caso de usar una id inexistente en la url, seguira enviando un error 404 
    public function show(ExpenseReport $expenseReport)  
    {
        //$report = ExpenseReport::all();     //IGUAL FUNCIONA
        $report = ExpenseReport::first()->with('expenses')->get();
        return view('expenseReport.show', ['report' => $expenseReport], compact('report', 'expenses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $report = ExpenseReport::findOrFail($id);

        return view('expenseReport.edit', ['report' => $report]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'title' => 'required|min:3'
        ]);
        $report = ExpenseReport::where('id', $id)->first();

        $report->title = $request->input('title');
        $report->save();

        return redirect('expense_reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::findOrFail($id)->delete();


        //DIFERENTE METODO PARA BORRAR VARIABLES INDICADAS
        //$report = ExpenseReport::findOrFail($id);
        //$report->delete();  


        return redirect('expense_reports');
    }


    public function confirmDelete($id)
    {
        $report = ExpenseReport::findOrFail($id);

        return view('expenseReport.confirmDelete', ['report' => $report]);
    }
    
    
    public function confirmSendMail($id)
    {
        $report = ExpenseReport::findOrFail($id);

        return view('expenseReport.confirmSendMail', ['report' => $report]);
    }

    public function sendMail(Request $request, $id)
    {
        $report = ExpenseReport::findOrFail($id);

        Mail::to($request->get('email'))->send(new SummaryReport($report));

        return redirect('/expense_reports/' . $id);
    }
}
