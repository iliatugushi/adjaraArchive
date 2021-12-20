<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\File;
use App\Models\Sakme;
use App\Models\Archive;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Sakme $sakme)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('view_files')) {
            return view('admin.noAccess');
        }
        $files = File::where('sakme_id', $sakme->id)->get();
        return view('admin.files.index', ['files' => $files, 'sakme' => $sakme]);
    }


    public function create(Sakme $sakme)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('create_files')) {
            return view('admin.noAccess');
        }
        $mode = 'create';
        $archives = Archive::all();
        return view('admin.files.create', ['mode' => $mode, 'sakme' => $sakme, 'archives' => $archives]);
    }

    public function store(Request $request)
    {

        $new = File::create($request->except(['_token', '_method',]));
        if ($new) {
            return redirect()->route('files.index', ['sakme' => $request->sakme_id])->withSuccess('მონაცემი დაემატა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }


    public function edit(File $file)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('edit_files')) {
            return view('admin.noAccess');
        }
        $mode = 'edit';
        $archives = Archive::all();
        return view('admin.files.create', ['file' => $file, 'mode' => $mode, 'sakme' => $file->sakme, 'archives' => $archives]);
    }

    public function show(File $file)
    {
        return view('admin.files.show', ['file' => $file]);
    }

    public function update(Request $request, File $file)
    {
        $update = $file->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->back()->withSuccess('მონაცემი განახლდა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function destroy($id)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('delete_files')) {
            return view('admin.noAccess');
        }
        $findItem = File::find($id);
        if ($findItem->delete()) {
            return redirect()->route('files.index')->withSuccess('მონაცემი წაიშალა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function details($identifikator)
    {
        $file = File::where('reference_code', $identifikator)->first();
        if (!$file) {
            dd('File Not Found');
        }
        return view('admin.files.show', ['file' => $file]);
    }
}
