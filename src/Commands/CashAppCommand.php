<?php

namespace NjoguAmos\CashApp\Commands;

use Illuminate\Console\Command;

class CashAppCommand extends Command
{
    public $signature = 'laravel-cashapp';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
