<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $roleId = auth()->check() ? auth()->user()->role_id : null;

            if ($roleId) {
                // Ambil semua menu yang diizinkan berdasarkan role
                $permissions = Permission::where('role_id', $roleId)->pluck('menu_id');

                // Ambil menu root (parent_id null) beserta submenus-nya
                $menus = Menu::with(['submenus' => function ($query) use ($permissions) {
                    $query->whereIn('id', $permissions);
                }])
                    ->whereIn('id', $permissions)
                    ->whereNull('parent_id')
                    ->get();

                $view->with('menus', $menus);
            } else {
                $view->with('menus', []);
            }
        });
    }

    public function register() {}
}
