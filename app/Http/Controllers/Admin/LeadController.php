<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadController extends Controller
{
    public function index(Request $request): View
    {
        $query = Lead::query()->latest();
        if ($request->filled('q')) {
            $q = $request->string('q');
            $query->where(fn ($inner) => $inner->where('customer_name', 'like', "%{$q}%")->orWhere('email', 'like', "%{$q}%")->orWhere('phone', 'like', "%{$q}%"));
        }
        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }
        return view('admin.leads', ['leads' => $query->paginate(25)->withQueryString()]);
    }
}
