<?php

namespace App\Http\Controllers;

use App\Data;
use App\Jobs\PushData;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function dispatchQue()
    {
        $job = (new PushData(1, 100));
        dispatch($job);
        return 1000;
    }

    public function dispatchOtherQue()
    {
        $job = (new PushData(1, 100))->onQueue('other');
        dispatch($job);
        return 1000;
    }

    public function testPush()
    {
        Data::pushData(1, 100);
    }
}
