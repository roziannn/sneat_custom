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


    function dashboardQc()
    {

        return view('page.dashboardQc');
    }

    function qc()
    {

        return view('page.qc');
    }

    function qcFlow2()
    {

        return view('page.qc-flow2');
    }

    function excelImport()
    {

        return view('page.excelImport');
    }

    function pctLogin()
    {
        return view('page.login');
    }
}
