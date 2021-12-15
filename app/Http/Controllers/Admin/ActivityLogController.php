<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index()
    {
        $page_title = 'Activity Log';
        $page_description = 'Monitor any important actions that have happened across your site';
        $logs = Activity::orderBy('id', 'desc')->get();
        return view('pages.activity-log.index', compact('logs', 'page_title', 'page_description'));
    }

    public function show(Activity $log)
    {
        $page_title = 'Activity details';
        $page_description = 'View the details of the activity log';
        return view('pages.activity-log.show', compact('log', 'page_title', 'page_description'));
    }
}
