<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'menu_name',
        'parent_id',
        'icon',
        'url_route'
    ];

    public function submenus()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
