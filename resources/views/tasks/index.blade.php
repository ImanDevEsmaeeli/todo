@extends('layouts.master')
@section('title','Tasks')
@section('content')

    {{--    <div class="card" style="width: 18rem;">--}}
    {{--        <img class="card-img-top" src="{{asset('assets\images\failed.png')}}" alt="Card image cap">--}}
    {{--        <div class="accordion" id="accordionExample">--}}
    {{--            <div class="accordion-item">--}}
    {{--                <h2 class="accordion-header" id="headingOne">--}}
    {{--                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"  aria-controls="collapseOne">--}}
    {{--                        {{$state}}--}}
    {{--                    </button>--}}
    {{--                </h2>--}}
    {{--                <div id="collapseOne" class="accordion-collapse collapse show" data-parent="#headingOne" aria-labelledby="headingOne" >--}}
    {{--                    <div class="accordion-body">--}}
    {{--                        <strong>--}}
    {{--                            This is the first item's accordion body.--}}
    {{--                        </strong>--}}
    {{--                        It is shown by default, until the collapse plugin adds--}}
    {{--                        the appropriate classes that we use to style each element.--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--<div class="accordion" id="accordionExample">--}}
    {{--    <div class="accordion-item">--}}
    {{--        <h2 class="accordion-header" id="headingOne">--}}
    {{--            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
    {{--                Accordion Item #1--}}
    {{--            </button>--}}
    {{--        </h2>--}}
    {{--        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">--}}
    {{--            <div class="accordion-body">--}}
    {{--                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="accordion-item">--}}
    {{--        <h2 class="accordion-header" id="headingTwo">--}}
    {{--            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
    {{--                Accordion Item #2--}}
    {{--            </button>--}}
    {{--        </h2>--}}
    {{--        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">--}}
    {{--            <div class="accordion-body">--}}
    {{--                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="accordion-item">--}}
    {{--        <h2 class="accordion-header" id="headingThree">--}}
    {{--            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
    {{--                Accordion Item #3--}}
    {{--            </button>--}}
    {{--        </h2>--}}
    {{--        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">--}}
    {{--            <div class="accordion-body">--}}
    {{--                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}

    <div class="d-flex justify-content-center" style="margin: 15px">
        <a class="btn btn-primary" href="{{route('task.create')}}">Add task</a>
        <i class="fa fa-home"></i>
    </div>
    <div class="row">
        <div class="card col-md-4" style=" width: 30%">
            <img class="card-img-top" src="{{asset('assets\images\failed.png')}}" alt="Card image cap">
            <div class="list-group">

                @if( count($failedTasks)>0)
                    @foreach($failedTasks as $task)

                        <a href="#"
                           class="list-group-item list-group-item-action list-group-item-primary">{{ $task->title }}</a>
                    @endforeach
                @else
                    <div class="alert alert-info">
                        No task found!
                    </div>
                @endif


            </div>
        </div>
        <div class="card col-md-4" style=" margin-left: 5%; margin-right: 5%; width: 30% ">
            <img class="card-img-top" src="{{asset('assets\images\done.png')}}" alt="Card image cap">
            <div class="list-group">

                @if( count($doneTasks)>0)
                    @foreach($doneTasks as $task)
                        <a href="#"
                           class="list-group-item list-group-item-action list-group-item-primary">{{ $task->title }}</a>
                    @endforeach
                @else
                    <div class="alert alert-info">
                        No task found!
                    </div>
                @endif


            </div>
        </div>
        <div class="card col-md-4" style=" width: 30%">
            <img class="card-img-top" src="{{asset('assets\images\waiting.png')}}" alt="Card image cap">
            <div class="list-group">

                @if( count($waitingTasks)>0)
                    @foreach($waitingTasks as $task)

                            <a href="#" class="list-group-item list-group-item-action list-group-item-primary">
                                <div class="row">
                                    <p class="col-md-10">
                                        {{ $task->title }}
                                    </p>

                                    <form class="col-md-2" action="{{route('change-status',$task)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-outline-success btn-circle "  >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                            </svg>
                                        </button>
                                    </form>

                                </div>

                            </a>




                    @endforeach
                @else
                    <div class="alert alert-info">
                        No task found!
                    </div>
                @endif


            </div>

        </div>
    </div>
@endsection
