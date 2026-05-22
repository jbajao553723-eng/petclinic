<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ShowAdmins extends Command
{
    protected $signature = 'show:admins';

    protected $description = 'List admin users (id, name, email, role)';

    public function handle()
    {
        $admins = User::where('role', 'admin')->get(['id','name','email','role']);

        if ($admins->isEmpty()) {
            $this->info('No admin users found.');
            return 0;
        }

        $this->table(['id','name','email','role'], $admins->toArray());

        return 0;
    }
}
