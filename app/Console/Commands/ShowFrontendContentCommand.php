<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Frontend; // Import the Frontend model

class ShowFrontendContentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:show-frontend-content {key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Displays the data_values of a specific frontend record.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $key = $this->argument('key');
        $this->info("Fetching content for data_keys: {$key}");

        $frontend = Frontend::where('data_keys', $key)->first();

        if (!$frontend) {
            $this->error("Frontend record with data_keys \"{$key}\" not found.");
            return;
        }

        $this->info('Data Values:');
        print_r($frontend->data_values);
    }
}
