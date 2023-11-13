<?php

namespace App\Http\Controllers;

use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\EventBridge\EventBridgeClient;
use Aws\S3\S3Client;
use Aws\Scheduler\SchedulerClient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SaveEventBridgeController extends Controller
{
    public function __invoke(Request $request) {
        
        Log::debug('___Save method___');
        Log::debug('request : '.json_encode($request->all()));

        return response()->json([
            'success'
        ]);
    }
}
