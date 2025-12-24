<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\MeetingRequest;
use App\Models\Technology;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'services' => Service::count(),
            'testimonials' => Testimonial::count(),
            'meetings' => MeetingRequest::count(),
            'technologies' => Technology::count(),
        ];

        $recent_meetings = MeetingRequest::latest()->take(5)->get();
        $recent_projects = Project::latest()->take(5)->get();

        $project_categories = Project::selectRaw('IFNULL(NULLIF(category, ""), "Tanpa Kategori") as category_name, count(*) as total')
            ->groupBy('category_name')
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_meetings', 'recent_projects', 'project_categories'));
    }
}
