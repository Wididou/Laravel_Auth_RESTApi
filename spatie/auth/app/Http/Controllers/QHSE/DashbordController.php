<?php

namespace App\Http\Controllers\QHSE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index()
    {
        return view('quality.dashbord');
    }
}
