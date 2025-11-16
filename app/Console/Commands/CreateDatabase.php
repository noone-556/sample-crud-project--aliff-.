<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Database in MySQL';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dbName = config('database.connections.mysql.database');

        $query = "CREATE DATABASE IF NOT EXISTS `$dbName` ";

        config(['database.connections.mysql.database' => null]);

        DB::statement($query);

        $this->info("Database '$dbName' created or already exists.");

    }
}
