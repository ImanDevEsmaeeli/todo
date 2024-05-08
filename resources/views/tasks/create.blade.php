@extends('layouts.master')
@section('title','add task')
@section('content')

    @include('layouts.error')
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h3> Complete your task information </h3>
        </div>
        <div class="card-body">
            <div class="mb-3">

                <form action="{{route('task.store')}}" method="POST">
                    @csrf
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>

                    <label for="body" class="form-label">Body</label>
                    <input type="text" class="form-control" id="body" name="body" value="{{old('body')}}" required>

                    <label for="deadline" class="form-label">Deadline</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" value="{{old('deadline')}}"
                           required>

                    <div class="row" style="margin-right: 0px;margin-left: 0px">
                        <button type="submit" class="col-md-2 btn btn-primary" style="margin-top: 15px">Create task </button>
                        <a  class="col-md-8 " style="margin-top: 15px"> </a>
                        <a  class="col-md-2 btn btn-secondary" style="margin-top: 15px">Back </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
