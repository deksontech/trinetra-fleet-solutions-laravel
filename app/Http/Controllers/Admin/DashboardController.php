<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ContentController;
use App\Models\JobApplication;
use App\Models\Lead;
use App\Support\TrinetraData;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'modules' => TrinetraData::adminModules(),
            'contentModules' => app(ContentController::class)->modules(),
            'stats' => [
                'Total enquiries' => Lead::count(),
                'New enquiries' => Lead::where('status', 'New')->count(),
                'Quote sent' => Lead::where('status', 'Quote Sent')->count(),
                'Confirmed' => Lead::where('status', 'Confirmed')->count(),
                'Completed' => Lead::where('status', 'Completed')->count(),
                'Lost' => Lead::where('status', 'Lost')->count(),
                'Job applications' => JobApplication::count(),
                'Popular vehicles' => '-',
            ],
        ]);
    }
}
