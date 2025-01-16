<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function dashboard()
    {

        return view('page.dashboard');
    }

    function datatable()
    {

        return view('page.datatable');
    }

    function rolePermission()
    {

        return view('page.rolePermission');
    }
}
