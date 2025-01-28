<?php

namespace App\Http\Controllers\Settings;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        $asParent = Menu::where('parent_id', null)->get();

        return view('page.settings.menuIndex', compact('menu', 'asParent'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'menu_name' => 'required|string|max:100',
                'parent_id' => 'nullable',
                'icon' => 'required|string|max:30',
                'url_route' => 'required|string|max:30',
            ]);

            $menu = Menu::create([
                'menu_name' => $request->menu_name,
                // 'menu_url' => "/" . $request->menu_url,
                'parent_id' => $request->parent_id,
                'icon' => $request->icon,
                'url_route' => $request->url_route,
            ]);

            return redirect()->route('settings.menu')->with('success', 'Menu created successfully');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create menu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'menu_name' => 'required|string|max:100',
                'menu_url' => 'required|string|max:100',
            ]);

            $Menu = Menu::findOrFail($id);

            $Menu->update([
                'menu_name' => $request->input('menu_name'),
                'menu_url' => $request->input('menu_url'),
            ]);

            return redirect()->route('settings.menu')->with('success', 'Menu updated successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('settings.menu')->with('error', 'Menu not found.');
        } catch (\Exception $e) {
            return redirect()->route('settings.menu')->with('error', 'An error occurred while updating the Menu: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $menu = Menu::findOrFail($id);

            $menu->delete();

            return redirect()->route('settings.menu')->with('success', 'Menu deleted successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('settings.menu')->with('error', 'Menu not found.');
        } catch (\Exception $e) {
            return redirect()->route('settings.menu')->with('error', 'An error occurred while deleting the menu: ' . $e->getMessage());
        }
    }
}
