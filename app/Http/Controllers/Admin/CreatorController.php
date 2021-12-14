<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Creator;
use App\Models\Type;
use App\Models\Archive;

class CreatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('view_creators')) {
            return view('admin.noAccess');
        }
        $creators = Creator::all();
        return view('admin.creators.index', ['creators' => $creators]);
    }


    public function create()
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('create_creators')) {
            return view('admin.noAccess');
        }
        $types = Type::all();
        $mode = 'create';
        return view('admin.creators.create', ['mode' => $mode, 'types' => $types]);
    }

    public function store(Request $request)
    {
        $new = Creator::create($request->except(['_token', '_method',]));
        if ($new) {
            if ($request->file('file')) {
                $filename = md5($request->file('file')->getClientOriginalName()) . '.' . $request->file('file')->getClientOriginalExtension();
                $new->addMedia($request->file('file'))->setFileName($filename)->toMediaCollection('megzurebi');
                $new->update(['file' => $request->file('file')]);
            }

            return redirect()->route('creators.index')->withSuccess('მონაცემი დაემატა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }


    public function edit(Creator $creator)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('edit_creators')) {
            return view('admin.noAccess');
        }
        $mode = 'edit';
        $types = Type::all();
        return view('admin.creators.create', ['creator' => $creator, 'mode' => $mode, 'types' => $types]);
    }

    public function show(Creator $creator)
    {
        return view('admin.creators.show', ['creator' => $creator]);
    }

    public function update(Request $request, Creator $creator)
    {
        $update = $creator->update($request->except(['_token', '_method']));
        if ($update) {
            if ($request->file('file')) {
                if (!empty($creator->getMedia('megzurebi')->first())) {
                    $creator->getMedia('megzurebi')->first()->delete();
                }
                $filename = md5($request->file('file')->getClientOriginalName()) . '.' . $request->file('file')->getClientOriginalExtension();
                $creator->addMedia($request->file('file'))->setFileName($filename)->toMediaCollection('megzurebi');
                $creator->update(['file' => $request->file('file')]);
            }
            return redirect()->back()->withSuccess('მონაცემი განახლდა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function destroy($id)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('delete_creators')) {
            return view('admin.noAccess');
        }
        $findItem = Creator::find($id);
        if ($findItem->delete()) {
            return redirect()->route('creators.index')->withSuccess('მონაცემი წაიშალა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }
}
