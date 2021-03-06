<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Anaweri;
use App\Models\Fond;
use App\Models\Archive;

class AnaweriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Fond $fond)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('view_anaweris')) {
            return view('admin.noAccess');
        }
        $anaweris = Anaweri::where('fond_id', $fond->id)->get();
        return view('admin.anaweris.index', ['anaweris' => $anaweris, 'fond' => $fond]);
    }


    public function create(Fond $fond)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('create_anaweris')) {
            return view('admin.noAccess');
        }
        $mode = 'create';
        $archives = Archive::all();
        return view('admin.anaweris.create', ['mode' => $mode, 'fond' => $fond, 'archives' => $archives]);
    }

    public function store(Request $request)
    {
        $new = Anaweri::create($request->except(['_token', '_method',]));
        if ($new) {
            return redirect()->route('anaweris.index', ['fond' => $request->fond_id])->withSuccess('მონაცემი დაემატა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }


    public function edit(Anaweri $anaweri)
    {

        if (!auth()->guard('admin')->user()->hasPermissionTo('edit_anaweris')) {
            return view('admin.noAccess');
        }
        $mode = 'edit';
        $archives = Archive::all();
        return view('admin.anaweris.create', ['anaweri' => $anaweri, 'mode' => $mode, 'fond' => $anaweri->fond, 'archives' => $archives]);
    }

    public function show(Anaweri $anaweri)
    {
        return view('admin.anaweris.show', ['anaweri' => $anaweri]);
    }

    public function update(Request $request, Anaweri $anaweri)
    {
        $update = $anaweri->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->back()->withSuccess('მონაცემი განახლდა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function destroy($id)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('delete_anaweris')) {
            return view('admin.noAccess');
        }
        $findItem = Anaweri::find($id);

        $fond = $findItem->fond;
        if ($findItem->delete()) {
            return redirect()->route('anaweris.index', ['fond' => $fond->id])->withSuccess('მონაცემი წაიშალა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }
}
