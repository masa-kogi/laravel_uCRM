<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Order;

class AnalysisController extends Controller
{
    public function index()
    {
        $startDate = '2022-08-01';
        $endDate = '2022-08-31';



        // dd($data);

        return Inertia::render('Analysis');
    }
}
