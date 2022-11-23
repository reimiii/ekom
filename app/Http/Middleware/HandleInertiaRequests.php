<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed[]
     */
    public function share(Request $request)
    {
        $chartBelongsToRequestUser = Cart::whereBelongsTo($request->user())->whereNull('paid_at')->count();
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'categories_global' => cache()->rememberForever('categories_global', fn() => Category::withWhereHas('products')->get()->map(fn($q) => [
                'name' => $q->name,
                'slug' => $q->slug
            ])),
            'charts_global_count' => $request->user() ? cache()->rememberForever('charts_global_count', fn() => $chartBelongsToRequestUser) : null,
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
        ]);
    }
}
