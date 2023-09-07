<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\ApiUserTrait;

class RefreshUsers extends Command
{   
    use ApiUserTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command forcefully fetches new data from API server even before 1 hour.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Getting users from server......');
        $this->refreshLocalData();
        $this->info('Done......');
        
    }
}
