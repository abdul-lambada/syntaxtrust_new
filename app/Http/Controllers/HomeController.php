<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ProcessStep;
use App\Models\TimelineStep;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\ContactInfo;
use App\Models\Promo;
use App\Models\Technology;
use App\Models\Project;
use App\Models\PricingPackage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::query()->where('is_active', true)->orderBy('order')->get();
        $projects = Project::query()->where('is_active', true)->orderBy('order')->get();
        $packages = PricingPackage::query()->where('is_active', true)->orderBy('order')->get();
        $process = ProcessStep::query()->where('is_active', true)->orderBy('order')->get();
        $technologies = Technology::query()->where('is_active', true)->orderBy('order')->get();
        $timeline = TimelineStep::query()->where('is_active', true)->orderBy('order')->get();
        $testimonials = Testimonial::query()->where('is_active', true)->orderBy('order')->get();
        $testimonialItems = $testimonials->map(function($tm){
            $avatar = null;
            if ($tm->avatar) {
                $avatar = Storage::url($tm->avatar);
            }
            return [
                'name' => $tm->author_name,
                'role' => $tm->author_role ?? '',
                'text' => $tm->content,
                'avatar' => $avatar,
                'rating' => (int)($tm->rating ?? 5),
            ];
        })->values();
        $happyClients = Testimonial::count() + 15; // Base + 15 for social proof
        $projectsCount = Project::count() + 25; // Base + 25
        $avgRating = Testimonial::avg('rating') ?: 5;
        $avgSatisfaction = (int) round(($avgRating/5) * 100);
        $yearsExperience = max(4, date('Y') - 2021); // Since 2021
        $servedCities = 12; // Static for now or we can count from somewhere
        $faqs = Faq::query()->where('is_active', true)->orderBy('order')->get();
        $contacts = ContactInfo::query()->where('is_active', true)->orderBy('order')->get();

        $now = now();
        $promo = Promo::query()
            ->where('is_active', true)
            ->where(function ($q) use ($now) {
                $q->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
            })
            ->orderBy('id', 'desc')
            ->first();

        return view('home', compact('services', 'projects', 'process', 'technologies', 'timeline', 'testimonials', 'testimonialItems', 'faqs', 'contacts', 'promo', 'happyClients', 'avgSatisfaction', 'projectsCount', 'yearsExperience', 'servedCities', 'packages'));
    }

    public function showProject($slug)
    {
        $project = Project::where('slug', $slug)->where('is_active', true)->firstOrFail();

        // Optional: Get other projects for "Lihat Lainnya" section
        $otherProjects = Project::where('id', '!=', $project->id)
            ->where('is_active', true)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('show', compact('project', 'otherProjects'));
    }
}
