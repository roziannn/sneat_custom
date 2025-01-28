<?php

namespace App\Http\Controllers\QC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QCController extends Controller
{
    function dashboard()
    {
        return view('page.qc.dashboard');
    }

    function dataSample()
    {
        return view('page.qc.dataSample');
    }
}
