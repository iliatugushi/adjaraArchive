<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sakme;
use App\Models\Anaweri;

class SakmeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Anaweri $anaweri)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('view_sakmes')) {
            return 'You Dont Have Permission';
        }
        $sakmes = Sakme::where('anaweri_id', $anaweri->id)->get();
        return view('admin.sakmes.index', ['sakmes' => $sakmes, 'anaweri' => $anaweri]);
    }


    public function create(Anaweri $anaweri)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('create_sakmes')) {
            return 'You Dont Have Permission';
        }
        $mode = 'create';

        return view('admin.sakmes.create', ['mode' => $mode, 'anaweri' => $anaweri]);
    }

    public function store(Request $request)
    {
        $new = Sakme::create($request->except(['_token', '_method',]));
        if ($new) {
            return redirect()->route('sakmes.index', ['anaweri' => $request->anaweri_id])->withSuccess('მონაცემი დაემატა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }


    public function edit(Sakme $sakme)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('edit_sakmes')) {
            return 'You Dont Have Permission';
        }
        $mode = 'edit';
        return view('admin.sakmes.create', ['sakme' => $sakme, 'mode' => $mode, 'anaweri' => $sakme->anaweri]);
    }

    public function show(Sakme $sakme)
    {
        return view('admin.sakmes.show', ['sakme' => $sakme]);
    }

    public function update(Request $request, Sakme $sakme)
    {
        $update = $sakme->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->back()->withSuccess('მონაცემი განახლდა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function destroy($id)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('delete_sakmes')) {
            return 'You Dont Have Permission';
        }
        $findItem = Sakme::find($id);
        if ($findItem->delete()) {
            return redirect()->route('sakmes.index')->withSuccess('მონაცემი წაიშალა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function viewFiles(Sakme $sakme)
    {
        $imgs = [];
        for ($i = 1; $i < 10; $i++) {
            $imgs[] = asset('images/news-' . $i . '.jpg');
        }
        return view('admin.sakmes.viewer', ['imgs' => $imgs]);
    }
}
