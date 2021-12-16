<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Archive;
use App\Models\Creator;
use App\Models\Fond;
use App\Models\Anaweri;
use App\Models\Sakme;
use App\Models\File;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('view_archives')) {
            return view('admin.noAccess');
        }

        $archives = Archive::all();
        return view('admin.archives.index', ['archives' => $archives]);
    }


    public function create()
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('create_archives')) {
            return view('admin.noAccess');
        }

        $mode = 'create';
        return view('admin.archives.create', ['mode' => $mode]);
    }

    public function store(Request $request)
    {
        $check = Archive::where('identifier', $request->identifier)->first();
        if ($check) {
            return back()->withErrors(['დაფიქსირდა შეცდომა იდენტიფიკატორი უკვე არსებობს']);
        }

        $new = Archive::create($request->except(['_token', '_method',]));
        if ($new) {
            if ($request->file('file')) {
                $filename = md5($request->file('file')->getClientOriginalName()) . '.' . $request->file('file')->getClientOriginalExtension();
                $new->addMedia($request->file('file'))->setFileName($filename)->toMediaCollection('megzurebi');
                $new->update(['file' => $request->file('file')]);
            }

            return redirect()->route('archives.index')->withSuccess('მონაცემი დაემატა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }


    public function edit(Archive $archive)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('edit_archives')) {
            return view('admin.noAccess');
        }
        $mode = 'edit';
        return view('admin.archives.create', ['archive' => $archive, 'mode' => $mode]);
    }

    public function show(Archive $archive)
    {
        return view('admin.archives.show', ['archive' => $archive]);
    }

    public function update(Request $request, Archive $archive)
    {
        $check = Archive::where([['identifier', $request->identifier], ['id', '!=', $archive->id]])->first();
        if ($check) {
            return back()->withErrors(['დაფიქსირდა შეცდომა იდენტიფიკატორი უკვე არსებობს']);
        }


        $update = $archive->update($request->except(['_token', '_method']));
        if ($update) {
            if ($request->file('file')) {
                if (!empty($archive->getMedia('megzurebi')->first())) {
                    $archive->getMedia('megzurebi')->first()->delete();
                }
                $filename = md5($request->file('file')->getClientOriginalName()) . '.' . $request->file('file')->getClientOriginalExtension();
                $archive->addMedia($request->file('file'))->setFileName($filename)->toMediaCollection('megzurebi');
                $archive->update(['file' => $request->file('file')]);
            }
            return redirect()->back()->withSuccess('მონაცემი განახლდა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function destroy($id)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('delete_archives')) {
            return view('admin.noAccess');
        }
        $findItem = Archive::find($id);
        if ($findItem->delete()) {
            return redirect()->route('archives.index')->withSuccess('მონაცემი წაიშალა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }
}
