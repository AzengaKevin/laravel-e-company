<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('services.frontend.index', compact('services'));
    }
}
