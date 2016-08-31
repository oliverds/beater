<?php

namespace Modules\ActivityLog\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$this->authorize('cp.activitylog');

        $logItems = $this->getLatestActivityItems();

        return view('activitylog::back.activitylog.index')->with(compact('logItems'));
    }

    protected function getLatestActivityItems()
    {
        return Activity::with('causer')
            ->latest()
            ->paginate(50);
    }
}
