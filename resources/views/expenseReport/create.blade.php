@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col">
        <h1>New Report</h1>
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
        <form action="../expense_reports" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:
                <input type="text" value="{{old('title')}}" class="form-control" id="title" name="title" placeholder="Type a title">
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning" href="../expense_reports">Back</a>
       </form>
    </div>
</div>

@endsection
