<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Permission;
use App\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        // abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permissions.*' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        // abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($role->id==1)
        {
            return redirect()->route('roles.index');
        }
        $permissions = Permission::all()->pluck('title', 'id');

        $role->load('permissions');

        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required',
            'permissions.*' => 'required',
        ]);

        $role->name = $request->input('name');
        $role->save();
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index');
    }
    
    public function show(Role $role)
    {
        // abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        // abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if($role->id==1)
        {
            return redirect()->route('roles.index');
        }

        $role->delete();
        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}