<?php

    namespace App\Http\Controllers\auth;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class LogoutController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Request $request)
        {

            Auth::logout();
            return redirect()->route('login.view');
        }
    }
