<?php

namespace Intranet\Console\Commands;

use Ifsnop\Mysqldump as IMysqldump;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Intranet\Mail\BackupDone;

class BackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        try {
            $dump = new IMysqldump\Mysqldump('mysql:host=localhost;dbname=intranet', env('DB_USERNAME'), env('DB_PASSWORD'));
            $dump->start('storage/backups/summit-intranet-'. time() .'.sql');

            $dump = new IMysqldump\Mysqldump('mysql:host=localhost;dbname=summit', env('DB_USERNAME'), env('DB_PASSWORD'));
            $dump->start('storage/backups/summit-samurai-'. time() .'.sql');

            \Mail::to('summitsamurai@summit-agro.com.ar')->send(new BackupDone());

        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            echo 'mysqldump-php error: ' . $e->getMessage();
        }
    }
}
