<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name',
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'permissions', 'role_id', 'menu_id');
    }
}
