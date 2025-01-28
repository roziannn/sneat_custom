<?php

namespace App\Http\Controllers\Settings;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {

        $role = Role::all();

        return view('page.settings.roleIndex', compact('role'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'role_name' => 'required|string|max:100',
            ]);

            $role = Role::create([
                'role_name' => $request->role_name,
            ]);

            return redirect()->route('settings.role')->with('success', 'Role created successfully');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create role',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'role_name' => 'required|string|max:100',
            ]);

            $role = Role::findOrFail($id);

            $role->update([
                'role_name' => $request->input('role_name'),
            ]);

            return redirect()->route('settings.role')->with('success', 'Role updated successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('settings.role')->with('error', 'Role not found.');
        } catch (\Exception $e) {
            return redirect()->route('settings.role')->with('error', 'An error occurred while updating the role: ' . $e->getMessage());
        }
    }


    public function destroy(string $id)
    {
        try {
            $role = Role::findOrFail($id);

            $role->delete();

            return redirect()->route('settings.role')->with('success', 'Role deleted successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('settings.role')->with('error', 'Role not found.');
        } catch (\Exception $e) {
            return redirect()->route('settings.role')->with('error', 'An error occurred while deleting the role: ' . $e->getMessage());
        }
    }
}
