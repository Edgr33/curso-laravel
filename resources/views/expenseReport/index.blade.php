@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>Reports</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="./expense_reports/create">Create a new report</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            @foreach ($expenseReports as $expenseReport)
            <tr>
                <td>
                    <a href="./expense_reports/{{$expenseReport->id}}">{{$expenseReport->title}}</a>
                </td>
                <td class="align-items-center d-flex justify-content-around">
                    <a href="./expense_reports/{{$expenseReport->id}}/edit">Edit</a>
                    <form method="GET" style="display:inline" action="./expense_reports/{{$expenseReport->id}}/confirmDelete">
                        {!! csrf_field() !!}
                        <button class="btn btn-warning" type="submit">Delete Report</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
