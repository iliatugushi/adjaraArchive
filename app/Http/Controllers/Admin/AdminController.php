<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Archive;
use App\Models\Creator;
use App\Models\Fond;
use App\Models\Anaweri;
use App\Models\Sakme;
use App\Models\File;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function index()
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('view_admins')) {
            return view('admin.noAccess');
        }
        $admins = Admin::all();
        return view('admin.admins.index', ['admins' => $admins]);
    }

    public function create()
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('create_admins')) {
            return view('admin.noAccess');
        }

        $roles = Role::all();
        return view('admin.admins.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        // if (Auth::guard()->user()->is_moderator == 1) {
        //     return redirect()->route('admin.dashboard');
        // }
        $new = new Admin;
        $new->name = $request->name;
        $new->email = $request->email;
        $new->password = bcrypt($request->password);
        if ($new->save()) {

            $role = Role::where('id', $request->role_id)->first();
            $new->assignRole($role);

            return redirect()->route('admins.index')->withSuccess('მონაცემი დაემატა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function edit(Admin $admin)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('edit_admins')) {
            return view('admin.noAccess');
        }
        $roles = Role::all();
        return view('admin.admins.edit', ['admin' => $admin, 'roles' => $roles]);
    }

    public function update(Request $request)
    {
        if (Auth::guard()->user()->is_moderator == 1) {
            return redirect()->route('admin.dashboard');
        }

        $admin = Admin::find($request->admin_id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if (!empty($request->password)) {
            $admin->password = bcrypt($request->password);
        }
        if ($admin->save()) {


            // Clear all roles for user
            $roles = Role::all();
            foreach ($roles as $item) {
                if ($admin->hasRole($item->name)) {
                    $admin->removeRole($item->name);
                }
            }

            $role = Role::where('id', $request->role_id)->first();
            $admin->assignRole($role);

            return redirect()->route('admins.index')->withSuccess('მონაცემი განახლდა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function destroy($id)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('delete_admins')) {
            return view('admin.noAccess');
        }
        $findItem = Admin::find($id);
        if ($findItem->delete()) {
            return redirect()->route('admins.index')->withSuccess('მონაცემი წაიშალა');
        }
        return back()->withErrors(['დაფიქსირდა შეცდომა']);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function elementDetails(Request $request)
    {
        $model = $request->model;
        $modelID = $request->modelID;

        if ($model === 'Archive') {
            $element = Archive::where('id', $modelID)->first();
            $html = view('admin.archives.show_component', ['archive' => $element])->render();
        }
        if ($model === 'Creator') {
            $element = Creator::where('id', $modelID)->first();
            $html = view('admin.creators.show_component', ['creator' => $element])->render();
        }
        if ($model === 'Fond') {
            $element = Fond::where('id', $modelID)->first();
            $html = view('admin.fonds.show_component', ['fond' => $element])->render();
        }
        if ($model === 'Anaweri') {
            $element = Anaweri::where('id', $modelID)->first();
            $html = view('admin.anaweris.show_component', ['anaweri' => $element])->render();
        }
        if ($model === 'Sakme') {
            $element = Sakme::where('id', $modelID)->first();
            $html = view('admin.sakmes.show_component', ['sakme' => $element])->render();
        }
        if ($model === 'File') {
            $element = File::where('id', $modelID)->first();
            $html = view('admin.files.show_component', ['file' => $element])->render();
        }



        return response()->json([
            'result' => 'success',
            'html' => $html

        ]);
    }

    public function treeExpand(Request $request)
    {
        $model = $request->model;
        $modelID = $request->modelID;

        if ($model === 'Archive') {
            $data = Creator::where('archive_id', $modelID)->get();
            $element = 'Creator';

            $icon = 'far fa-user';
        }
        if ($model === 'Creator') {
            $data = Fond::where('creator_id', $modelID)->get();
            $element = 'Fond';
            $icon = 'fas fa-inbox';
        }
        if ($model === 'Fond') {
            $data = Anaweri::where('fond_id', $modelID)->get();
            $element = 'Anaweri';
            $icon = 'fas fa-layer-group';
        }
        if ($model === 'Anaweri') {
            $data = Sakme::where('anaweri_id', $modelID)->get();
            $element = 'Sakme';
            $icon = 'far fa-folder';
        }
        if ($model === 'Sakme') {
            $data = File::where('sakme_id', $modelID)->get();
            $element = 'File';
            $icon = 'far fa-file';
        }
        if ($model === 'File') {
            $data = File::where('id', $modelID)->get();
            $element = 'File';
        }

        if ($model === 'File') {
            $html = '';
        } else {
            $html = view('admin.tree.expand', [
                'data' => $data,
                'element' => $element,
                'icon' => $icon
            ])->render();
        }


        return response()->json([
            'result' => 'success',
            'html' => $html,
            'element' => $model,
            'elementID' => $modelID
        ]);
    }
}
