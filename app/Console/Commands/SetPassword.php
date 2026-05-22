<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SetPassword extends Command
{
    protected $signature = 'set:password {email} {password}';

    protected $description = 'Set password for a user by email (plaintext provided will be hashed).';

    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        $user = User::where('email', $email)->first();

        if (! $user) {
            $this->error("User with email {$email} not found.");
            return 1;
        }

        $user->password = Hash::make($password);
        $user->save();

        $this->info("Password updated for {$email}");

        return 0;
    }
}
