<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Fond;
use App\Models\Creator;
use App\Models\Archive;

class FondController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('view_fonds')) {
            return 'You Dont Have Permission';
        }
        $fonds = Fond::all();
        return view('admin.fonds.index', ['fonds' => $fonds]);
    }


    public function create()
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('create_fonds')) {
            return 'You Dont Have Permission';
        }
        $creators = Creator::all();
        $archives = Archive::all();
        $mode = 'create';
        return view('admin.fonds.create', ['mode' => $mode, 'creators' => $creators, 'archives' => $archives]);
    }

    public function store(Request $request)
    {
        $new = Fond::create($request->except(['_token', '_method',]));
        if ($new) {
            if ($request->file('file')) {
                $filename = md5($request->file('file')->getClientOriginalName()) . '.' . $request->file('file')->getClientOriginalExtension();
                $new->addMedia($request->file('file'))->setFileName($filename)->toMediaCollection('megzurebi');
                $new->update(['file' => $request->file('file')]);
            }

            return redirect()->route('fonds.index')->withSuccess('მონაცემი დაემატა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }


    public function edit(Fond $fond)
    {


        if (!auth()->guard('admin')->user()->hasPermissionTo('edit_fonds')) {
            return 'You Dont Have Permission';
        }
        $mode = 'edit';
        $creators = Creator::all();
        $archives = Archive::all();
        return view('admin.fonds.create', ['fond' => $fond, 'mode' => $mode, 'creators' => $creators, 'archives' => $archives]);
    }

    public function show(Fond $fond)
    {
        return view('admin.fonds.show', ['fond' => $fond]);
    }

    public function update(Request $request, Fond $fond)
    {
        $update = $fond->update($request->except(['_token', '_method']));
        if ($update) {
            if ($request->file('file')) {
                if (!empty($fond->getMedia('megzurebi')->first())) {
                    $fond->getMedia('megzurebi')->first()->delete();
                }
                $filename = md5($request->file('file')->getClientOriginalName()) . '.' . $request->file('file')->getClientOriginalExtension();
                $fond->addMedia($request->file('file'))->setFileName($filename)->toMediaCollection('megzurebi');
                $fond->update(['file' => $request->file('file')]);
            }
            return redirect()->back()->withSuccess('მონაცემი განახლდა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function destroy($id)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('delete_fonds')) {
            return 'You Dont Have Permission';
        }
        $findItem = Fond::find($id);
        if ($findItem->delete()) {
            return redirect()->route('fonds.index')->withSuccess('მონაცემი წაიშალა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }
}
