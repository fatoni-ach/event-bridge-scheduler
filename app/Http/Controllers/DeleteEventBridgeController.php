<?php

namespace App\Http\Controllers;

use App\Helpers\EventBridgeHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Aws\Credentials\Credentials;
use Aws\Scheduler\SchedulerClient;


class DeleteEventBridgeController extends Controller
{
    public function __invoke(Request $request) 
    {
        // http::localhost/api/delete-method?name=Schedule-republish-a2rmIuQcMH
        $result = (new EventBridgeHelpers())->deleteSchedule($request->input('name', ''));

        return response()->json([
            'success delete'
        ]);
    }
}
