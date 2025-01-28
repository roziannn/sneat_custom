<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::with(['role:id,role_name', 'menu:id,menu_name'])
            ->get()
            ->groupBy('role_id');

        // dd($permissions);

        return view('page.settings.permissionIndex', compact('permissions'));
    }

    public function create()
    {
        $roles = Role::all(); // soon ada penjagaan jika sudah ada di daftar maka di exclude jgn munculkan lagi
        $menu = Menu::where('parent_id', null)->get();

        return view('page.settings.permissionCreate', compact('menu', 'roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'role_id' => 'required',
                'menu_id' => 'required|array',
                'menu_id.*' => 'exists:menus,id',
            ]);

            foreach ($request->menu_id as $menuId) {
                Permission::create([
                    'role_id' => $request->role_id,
                    'menu_id' => $menuId,
                ]);
            }
            return redirect()->route('settings.permissionIndex')->with('success', 'Permission created successfully');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create menu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Role::findOrFail($id);
        $menu = Menu::all();

        $selectedMenu = Permission::where('role_id', $data->id)
            ->pluck('menu_id')
            ->toArray();
        // dd($selectedMenu);

        return view('page.settings.permissionEdit', compact('data', 'menu', 'selectedMenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $roleId)
    {
        try {
            $request->validate([
                'menu_id' => 'required|array',
                'menu_id.*' => 'exists:menus,id',
            ]);

            Permission::where('role_id', $roleId)->delete();

            foreach ($request->menu_id as $menuId) {
                Permission::create([
                    'role_id' => $roleId,
                    'menu_id' => $menuId,
                ]);
            }

            return redirect()->route('settings.permission')->with('success', 'Permission updated successfully');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update permissions',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
