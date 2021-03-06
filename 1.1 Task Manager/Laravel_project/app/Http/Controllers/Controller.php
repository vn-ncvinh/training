<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Users;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(Request $request)
    {
        if ($request->session()->has('username')) {
            $tasks = Tasks::where('username', Session::get('username'))->get()->all();
            $user = Users::where('username', Session::get('username'))->first();
            return view('index',compact('tasks', 'user'));
        } else {
            return redirect()->route('login');
        }
    }
}
