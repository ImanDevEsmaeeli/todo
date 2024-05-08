<?php

    namespace App\Http\Controllers\auth;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\auth\SignupRequest;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;

    class SignupController extends Controller
    {
        public function view()
        {
            return view('auth.signup');
        }

        public function signup(SignupRequest $request)
        {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);

            Session::flash('success', "$user->name successfully created.Please login ..... ");
            return redirect()->route('login.view');
        }
    }
