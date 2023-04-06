<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;

use DB;

class DeactivateInactiveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deactivate:inactiveuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate user after 6 months inactive';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $deactivate = User::deactivate();

        return Command::SUCCESS;
    }
}
