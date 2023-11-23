<?php

namespace App\Http\Controllers;

use App\Helpers\EventBridgeHelpers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateEventBridgeController extends Controller
{
    public function __invoke(Request $request) 
    {
        $date = Carbon::createFromDate($request->input('date'));

        // http::localhost/api/create-event-bridge?date=2023-11-15T14:40:00
        $result = (new EventBridgeHelpers())->createSchedule(
            'Schedule-republish-'.$date->format('Y-d-m-H-i-s'), 
            $request->input('date', ''),
            // '2023-11-13T16:00:00',
            ['message' => 'Hello there!']);

        return response()->json([
            'success'
        ]);
    }
}
