<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

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
            return view('admin.noAccess');
        }
        $sakmes = Sakme::where('anaweri_id', $anaweri->id)->get();
        return view('admin.sakmes.index', ['sakmes' => $sakmes, 'anaweri' => $anaweri]);
    }


    public function create(Anaweri $anaweri)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('create_sakmes')) {
            return view('admin.noAccess');
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
            return view('admin.noAccess');
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
            return view('admin.noAccess');
        }
        $findItem = Sakme::find($id);
        if ($findItem->delete()) {
            return redirect()->route('sakmes.index')->withSuccess('მონაცემი წაიშალა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function viewFiles(Sakme $sakme)
    {
        $identifikator = $sakme->identifikatorClean;

        $current_page = 1;
        $per_page = 10;
        return view('admin.sakmes.viewer', [
            'current_page' => $current_page,
            'per_page' => $per_page,
            'sakme_id' => $identifikator,
        ]);
    }

    public function viewFilesPerPage(Request $request)
    {
        $identifikator = $request->sakme_id;
        $current_page = $request->current_page;
        $per_page = $request->per_page;



        $response = Http::post(env('FILE_SERVER') . '/api/get-sakme-files', [
            'identifikator' => $identifikator,
            'current_page' => $current_page,
            'per_page' => $per_page
        ]);

        if ($response->ok() && $response->json()['result']) {

            $data = $response->json();

            return response()->json([
                'result' => 'error',
                'message' => $data,
            ]);

            if ($data['result'] === 'success') {
                return response()->json([
                    'result' => 'success',
                    'data' => $data['data'],
                    'current_page' => $current_page,
                    'per_page' => $per_page,
                    'total' => $data['total']
                ]);
            }
            if ($data['result'] === 'error') {
                if (isset($data['message'])  && $data['message'] == "No More Files") {
                    return response()->json([
                        'result' => 'error',
                        'message' => 'No More Files',
                    ]);
                }
                return response()->json([
                    'result' => 'error',
                    'message' => 'Something Went Wrong',
                ]);
            }
        } else {
            return response()->json([
                'result' => 'error',
            ]);
        }
    }

    public function getFile()
    {
        $response = Http::post(env('FILE_SERVER') . '/api/get-file', [
            'identifikator' => 'file_1',
        ]);
        if (!$response->ok()) {
            return response()->json([
                'result' => 'error',
                'message' => 'Not Found'
            ]);
        }
        $data = $response->json();
        return response()->json([
            'result' => 'success',
            'data' => $data
        ]);
    }
}
