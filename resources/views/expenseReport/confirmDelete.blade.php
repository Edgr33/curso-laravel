@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col">
    <h1>Please confirm deletion of report "{{$report->title}}"</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <form action="../{{$report->id}}" method="POST">
            {{ csrf_field() }}
            {!! method_field('DELETE') !!}
            <button type="submit" class="btn btn-primary">Confirm Deletion</button>
            <a class="btn btn-warning" href="../../expense_reports">Back</a>
       </form>
    </div>
</div>

@endsection