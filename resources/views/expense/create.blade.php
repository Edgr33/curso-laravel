@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col">
    <h1>Add New Expense to report "{{ $report->title }}"</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        @if($errors->any())
        <div class="alert d-inline">
            <ul class="alert-danger align-middle pt-3 pb-3 mb-0">
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
    <form action="../../{{$report->id}}/expenses" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Description:"
                <input type="text" value="{{old('description')}}" class="form-control" id="description" name="description" placeholder="Type a description">
                </label>
            </div>
            <div class="form-group">
                <label for="title">Amount:
                <input type="text" value="{{old('amount')}}" class="form-control" id="amount" name="amount" placeholder="Type an amount">
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning" href="../">Back</a>
       </form>
    </div>
</div>

@endsection
