<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class updateStatusUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:status-update {status}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status all user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //command untuk update user
        $user = User::query()->update(['status' => $this->argument('status')] );

        $this->info("Rekod telah dikemaskini kepada " . $this->argument('status'));
    }
}
