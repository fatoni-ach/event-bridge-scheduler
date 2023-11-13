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

class EventBridgeController extends Controller
{
    public function __invoke(Request $request) {
        $credentials = new Credentials(env('AWS_ACCESS_KEY_ID', ''), env('AWS_SECRET_ACCESS_KEY', ''));
        // $eventBridge = new EventBridgeClient([
        //     'region'      => 'ap-southeast-1',
        //     'credentials' => $credentials
        // ]);

        $scheduleClient = new SchedulerClient([
            'region'      => 'ap-southeast-1',
            'credentials' => $credentials,
        ]);

        // Params 
        // https://docs.aws.amazon.com/aws-sdk-php/v3/api/api-scheduler-2021-06-30.html#createschedule
        $result = $scheduleClient->createSchedule([
            'ActionAfterCompletion' => 'NONE',
            // 'ClientToken' => '<string>',
            'Description' => 'Hello toni was here',
            // 'EndDate' => <integer || string || DateTime>,
            'FlexibleTimeWindow' => [ // REQUIRED
                // 'MaximumWindowInMinutes' => <integer>,
                'Mode' => 'OFF', // REQUIRED
            ],
            // 'GroupName' => '<string>',
            // 'KmsKeyArn' => '<string>',
            'Name' => 'schedule-21-03', // REQUIRED
            'ScheduleExpression' => 'at(2023-11-10T18:00:00)', // REQUIRED
            'ScheduleExpressionTimezone' => 'Asia/Jakarta',
            // 'StartDate' => <integer || string || DateTime>,
            'State' => 'ENABLED',
            'Target' => [ // REQUIRED
                'Arn' => 'arn:aws:events:ap-southeast-1:487053431871:event-bus/event-bus-EB', // REQUIRED
                // 'DeadLetterConfig' => [
                //     'Arn' => '<string>',
                // ],
                // 'EcsParameters' => [
                //     'CapacityProviderStrategy' => [
                //         [
                //             'base' => <integer>,
                //             'capacityProvider' => '<string>', // REQUIRED
                //             'weight' => <integer>,
                //         ],
                //         // ...
                //     ],
                //     'EnableECSManagedTags' => true || false,
                //     'EnableExecuteCommand' => true || false,
                //     'Group' => '<string>',
                //     'LaunchType' => 'EC2|FARGATE|EXTERNAL',
                //     'NetworkConfiguration' => [
                //         'awsvpcConfiguration' => [
                //             'AssignPublicIp' => 'ENABLED|DISABLED',
                //             'SecurityGroups' => ['<string>', ...],
                //             'Subnets' => ['<string>', ...], // REQUIRED
                //         ],
                //     ],
                //     'PlacementConstraints' => [
                //         [
                //             'expression' => '<string>',
                //             'type' => 'distinctInstance|memberOf',
                //         ],
                //         // ...
                //     ],
                //     'PlacementStrategy' => [
                //         [
                //             'field' => '<string>',
                //             'type' => 'random|spread|binpack',
                //         ],
                //         // ...
                //     ],
                //     'PlatformVersion' => '<string>',
                //     'PropagateTags' => 'TASK_DEFINITION',
                //     'ReferenceId' => '<string>',
                //     'Tags' => [
                //         ['<string>', ...],
                //         // ...
                //     ],
                //     'TaskCount' => <integer>,
                //     'TaskDefinitionArn' => '<string>', // REQUIRED
                // ],
                'EventBridgeParameters' => [
                    'DetailType' => 'Scheduled Event', // REQUIRED
                    'Source' => 'pattern-EB-save-method', // REQUIRED
                ],
                // 'Input' => '<string>',
                // 'KinesisParameters' => [
                //     'PartitionKey' => '<string>', // REQUIRED
                // ],
                'RetryPolicy' => [
                    'MaximumEventAgeInSeconds' => 3600,
                    'MaximumRetryAttempts' => 10,
                ],
                'RoleArn' => 'arn:aws:iam::487053431871:role/service-role/Amazon_EventBridge_Invoke_Api_Destination_1164534574', // REQUIRED
                // 'RoleArn' => 'arn:aws:iam::aws:policy/AdministratorAccess', // REQUIRED
                // 'SageMakerPipelineParameters' => [
                //     'PipelineParameterList' => [
                //         [
                //             'Name' => '<string>', // REQUIRED
                //             'Value' => '<string>', // REQUIRED
                //         ],
                //         // ...
                //     ],
                // ],
                // 'SqsParameters' => [
                //     'MessageGroupId' => '<string>',
                // ],
            ],
        ]);

        dd($result);

        return response()->json([
            'success'
        ]);
    }
}
