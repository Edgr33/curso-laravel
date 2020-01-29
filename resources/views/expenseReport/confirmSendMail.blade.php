@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col">
        <h1>Send Report</h1>
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
    <form action="../{{$report->id}}/sendMail" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Email:
                <input type="text" value="{{old('email')}}" class="form-control" id="email" name="email" placeholder="Type an email">
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Send Mail</button>
            <a class="btn btn-warning" href="../../expense_reports/{{$report->id}}">Back</a>
       </form>
    </div>
</div>

@endsection
