<?php

namespace App\Http\Controllers\PPIC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PPICController extends Controller
{
    function mstBN()
    {
        return view('page.ppic.mstBN');
    }

    function historyBN()
    {
        return view('page.ppic.history');
    }

    function dashboard()
    {
        return view('page.ppic.dashboard');
    }
}
