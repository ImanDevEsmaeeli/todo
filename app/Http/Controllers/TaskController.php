<?php

    namespace App\Http\Controllers;

    use App\Enums\Status;
    use App\Http\Requests\task\TaskRequest;
    use App\Models\task\Task;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use mysql_xdevapi\Result;

    class TaskController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {

            $failedTasks = [];
            $doneTasks = [];
            $waitingTasks = [];
            if (Auth::check()) {
                $failedTasks = Auth::user()->tasks()->wherestatus(Status::FAILED->value)->get();
                $doneTasks = Auth::user()->tasks()->wherestatus(Status::DONE->value)->get();
                $waitingTasks = Auth::user()->tasks()->wherestatus(Status::WAITING->value)->get();
            }
            return view('tasks.index', compact(['failedTasks','doneTasks','waitingTasks']));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('tasks.create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(TaskRequest $request)
        {

            $result=Auth::user()->tasks()->create([
               'title'=>$request->input('title'),
               'body'=>$request->input('body'),
               'deadline'=>$request->input('deadline'),
               'status'=>Status::WAITING,
            ]);

            return redirect()->route('task.index');
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }
    }
