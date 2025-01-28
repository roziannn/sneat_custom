<?php

namespace App\Http\Controllers\MSTD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MSTDController extends Controller
{
    function dashboard()
    {
        return view('page.mstd.dashboard');
    }

    function mstProduct()
    {
        return view('page.mstd.mstProduct');
    }

    function mstPengujian()
    {
        return view('page.mstd.mstPengujian');
    }
}
