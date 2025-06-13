<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $events = Event::latest()->limit(6)->get();
        $products = Product::with('style')->latest()->limit(6)->get();
        
        return view('admin.home', compact('events', 'products'));
    }
}