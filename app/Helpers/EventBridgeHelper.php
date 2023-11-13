<?php
namespace App\Helpers;

use Aws\EventBridge\EventBridgeClient;
use Aws\S3\S3Client;

class EventBridgeHelpers {

    private $eventBridge;
    public function __construct() {
        $this->eventBridge = new EventBridgeClient([
            'region'      => 'ap-southeast-1',
        ]);
    }
}