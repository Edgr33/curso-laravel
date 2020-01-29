@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col">
    <h1>Showing report "{{$report->title}}"</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3>Details</h3>
        <table class="table">
            @foreach ($report->expenses as $expense)
                <tr>
                <td>{{$expense->description}}</td>
                <td>{{$expense->created_at}}</td>
                <td>${{$expense->amount}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<div class="row">
    <div class="col">
    <a href="./{{ $report->id }}/expenses/create" class="btn btn-primary">New Expense</a>
    <a href="../expense_reports/{{ $report->id }}/confirmSendMail" class="btn btn-secondary">Send Email</a>
    </div>
</div>
<div class="row">
    <div class="col">
    </div>
</div>
<a class="btn btn-warning" href="../expense_reports">Back</a>

@endsection