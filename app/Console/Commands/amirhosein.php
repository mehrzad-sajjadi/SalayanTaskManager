<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class amirhosein extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amirhosein:ok';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all()->pluck("name");

        foreach($users as $user){
            $this->info($user);
        };
 
        $this->info("Done");
    }
}
