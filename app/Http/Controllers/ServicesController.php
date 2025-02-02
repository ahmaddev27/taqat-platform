<?php

namespace App\Http\Controllers;

use App\Models\Taqat2\KhadmaCategory;
use App\Models\Taqat2\Khadmat;

class ServicesController extends Controller
{
    public function all()
    {
        $categories = KhadmaCategory::withCount('khadmats')->get();
        $minBudget = request()->input('expected_budget.min');
        $maxBudget = request()->input('expected_budget.max');

        // Ensure we have a Query Builder instance
        $query = Khadmat::with(['user', 'category', 'reviews', 'orders'])->withCount('orders');

        if ($minBudget !== null && $maxBudget !== null) {
            $query->whereBetween('price', [$minBudget, $maxBudget]);
        }

        if ($categoriesList = request()->input('categories')) {
            if (is_array($categoriesList)) {
                $query->whereIn('category_id', $categoriesList);
            }
        }


        if ($search = request()->search) {
            $query->WhenSearch($search);
        }


        $services = $query->orderBy('created_at', 'desc')->paginate(6);

        // Compute average review for each service
        foreach ($services as $service) {
            $service->average_review = $service->averageReview();
            $service->total_reviews = $service->reviews->count();
        }

        if (request()->ajax()) {
            return view('front.pages.site.services.partials.services_list', compact('services'))->render();
        }

        return view('front.pages.site.services.all', [
            'services' => $services,
            'categories' => $categories,
        ]);
    }

    public function index($slug)
    {
        $service = Khadmat::where('slug', 'LIKE', "%{$slug}%")
            ->with(['orders', 'user', 'category', 'reviews'])
            ->withCount('orders')
            ->firstOrFail();

        // Compute the average review dynamically
        $averageReview = $service->averageReview();
        $totalReviews = $service->reviews->count();

        return view('front.pages.site.services.index', [
            'service' => $service,
            'averageReview' => $averageReview,
            'totalReviews' => $totalReviews,
        ]);
    }



}
