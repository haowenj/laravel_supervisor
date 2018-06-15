<?php

namespace App\Jobs;

use App\Data;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PushData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var int start number
     */
    protected $start;

    /**
     * @var int end number
     */
    protected $end;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Data::pushData($this->start, $this->end);
        echo "pushData $this->start ---> $this->end success\n";
    }
}
