<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeviceStatusRetrieve extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'device:retrivestatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve status from the connected devices';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
