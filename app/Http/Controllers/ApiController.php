<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Archive;
use App\Models\Creator;
use App\Models\Fond;
use App\Models\Anaweri;
use App\Models\Sakme;
use App\Models\File;


class ApiController extends Controller
{
    public function getList(Request $request)
    {
        if (!isset($request->security_key)) {
            return response()->json([
                'result' => 'error',
                'message' => 'Not Allowed'
            ]);
        }

        if ($request->list_type === 'archive') {
            $data = Archive::all();
        }
        if ($request->list_type === 'creator') {
            $data = Creator::all();
        }
        if ($request->list_type === 'fonds') {
            $data = Fond::all();
        }
        if ($request->list_type === 'anaweris') {
            $data = Anaweri::all();
        }
        if ($request->list_type === 'files') {
            $data = File::all();
        }
        if ($request->list_type === 'sakmes') {
            $data = Sakme::all();
        }

        $data->makeHidden(['updated_at', 'created_at', 'id']);
        return response()->json([
            'result' => 'success',
            'data' => $data
        ]);
    }

    public function getIdentifikator(Request $request)
    {
        if (!isset($request->security_key)) {
            return response()->json([
                'result' => 'error',
                'message' => 'Not Allowed'
            ]);
        }

        if ($request->identifikator_type === 'archive') {
            $data = Archive::orderBy('id', 'desc')->first();
        }
        if ($request->identifikator_type === 'creator') {
            $data = Creator::orderBy('id', 'desc')->first();
        }
        if ($request->identifikator_type === 'fonds') {
            $data = Fond::orderBy('id', 'desc')->first();
        }
        if ($request->identifikator_type === 'anaweris') {
            $data = Anaweri::orderBy('id', 'desc')->first();
        }
        if ($request->identifikator_type === 'files') {
            $data = File::orderBy('id', 'desc')->first();
        }
        if ($request->identifikator_type === 'sakmes') {
            $data = Sakme::orderBy('id', 'desc')->first();
        }

        $data->makeHidden(['updated_at', 'created_at', 'id']);
        return response()->json([
            'result' => 'success',
            'data' => $data
        ]);
    }
}
