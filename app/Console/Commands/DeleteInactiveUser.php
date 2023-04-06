<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;

class DeleteInactiveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:inactiveuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete user account after 1 year inactive';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $delete = User::deleteInactive();

        return Command::SUCCESS;
    }
}
