<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$this->authorize('cp.dashboard');

        $logItems = $this->getLatestActivityItems();

        return $view = view('back.dashboard.index')->with(compact('logItems'));
    }

    protected function getLatestActivityItems()
    {
        return Activity::with('causer')
        	->latest()
            ->limit(30)
            ->get();
    }
}
