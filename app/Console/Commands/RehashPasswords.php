<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RehashPasswords extends Command
{
    protected $signature = 'rehash:passwords';

    protected $description = 'Re-hash any stored plaintext or non-supported password values using the configured hasher.';

    public function handle()
    {
        $this->info('Starting password rehash...');

        $count = 0;

        User::chunk(100, function ($users) use (&$count) {
            foreach ($users as $user) {
                $pw = $user->password;

                // If it already looks like a modern hash, skip
                if (is_string($pw) && preg_match('/^(\$2y\$|\$2a\$|\$argon2i\$|\$argon2id\$)/', $pw)) {
                    continue;
                }

                // Re-hash whatever value is stored (likely plaintext)
                try {
                    $user->password = Hash::make($pw);
                    $user->save();
                    $count++;
                    $this->line("Re-hashed user id={$user->id}");
                } catch (\Exception $e) {
                    $this->error("Failed id={$user->id}: {$e->getMessage()}");
                }
            }
        });

        $this->info("Done. Re-hashed: {$count} users.");

        return 0;
    }
}
