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
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::query()->where('is_active', true)->orderBy('order')->get();
        $projects = Project::query()->where('is_active', true)->orderBy('order')->get();
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
        $happyClients = $testimonials->count();
        $projectsCount = $testimonials->count();
        $avgRating = (float)($testimonials->avg('rating') ?? 0);
        $avgSatisfaction = (int) round(($avgRating/5) * 100);
        $firstYear = optional($testimonials->min('created_at')) ? (int)date('Y', strtotime($testimonials->min('created_at'))) : (int)date('Y');
        $yearsExperience = max(1, (int)date('Y') - $firstYear + 1);
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

        return view('home', compact('services','projects','process','technologies','timeline','testimonials','testimonialItems','faqs','contacts','promo','happyClients','avgSatisfaction','projectsCount','yearsExperience'));
    }
}
