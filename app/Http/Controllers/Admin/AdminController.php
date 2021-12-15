<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Your overall site details';
        $logs = Activity::orderBy('created_at', 'desc')->get();
//        dd($logs);

        return view('pages.dashboard', compact('page_title', 'page_description', 'logs'));
    }
}
