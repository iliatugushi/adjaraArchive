<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\Action;

use Carbon\Carbon;

class ActionController extends Controller
{

    public function index()
    {
        $actions = Action::all();
        return view('admin.actions.index', ['actions' => $actions]);
    }


    public function newAction($message, $module, $module_id)
    {
        if (Auth::guard('admin')->check()) {
            $user_id = Auth::guard('admin')->user()->id;
            $user_type = 'ADMIN';
        }
        if (Auth::guard('operator')->check()) {
            $user_id = Auth::guard('operator')->user()->id;
            $user_type = 'OPERATOR';
        }

        Action::insert([
            'created_at' => Carbon::now(),
            'message' => $message,
            'user_id' => $user_id,
            'module' => $module,
            'module_id' => $module_id,
            'user_type' => $user_type
        ]);
    }
}
