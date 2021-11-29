<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Type;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('view_types')) {
            return 'You Dont Have Permission';
        }
        $types = Type::all();
        return view('admin.types.index', ['types' => $types]);
    }


    public function create()
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('create_types')) {
            return 'You Dont Have Permission';
        }
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $new = Type::create($request->except(['_token', '_method',]));
        if ($new) {
            return redirect()->route('types.index')->withSuccess('მონაცემი დაემატა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }


    public function edit(Type $type)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('edit_types')) {
            return 'You Dont Have Permission';
        }
        return view('admin.types.edit', ['type' => $type]);
    }

    public function show(Type $type)
    {
        return view('admin.types.show', ['type' => $type]);
    }

    public function update(Request $request, Type $type)
    {
        $update = $type->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->back()->withSuccess('მონაცემი განახლდა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function destroy($id)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('delete_types')) {
            return 'You Dont Have Permission';
        }
        $findItem = Type::find($id);
        if ($findItem->delete()) {
            return redirect()->route('types.index')->withSuccess('მონაცემი წაიშალა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }
}
