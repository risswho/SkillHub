<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::with(['user', 'category'])
            ->where('status', 'active')
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::all();
        $totalServices = Service::where('status', 'active')->count();

        $user = null;
        $activeOrdersCount = 0;
        $incomingOrdersCount = 0;
        $myServicesCount = 0;

        if (session()->has('user_id')) {
            $user = User::find(session('user_id'));
            if ($user) {
                $activeOrdersCount = Order::where('buyer_id', $user->id)
                    ->whereIn('status', ['pending', 'accepted', 'in_progress'])
                    ->count();
                
                $incomingOrdersCount = Order::whereHas('service', function($q) use ($user) {
                    $q->where('user_id', $user->id);
                })->where('status', 'pending')->count();

                $myServicesCount = Service::where('user_id', $user->id)->count();
            }
        }

        return view('home', compact('services', 'categories', 'totalServices', 'user', 'activeOrdersCount', 'incomingOrdersCount', 'myServicesCount'));
    }
}
