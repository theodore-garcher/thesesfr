<?php

namespace App\Console\Commands;

use App\Imports\ThesesImport;
use Illuminate\Console\Command;

class ImportExcel extends Command
{
    protected $signature = 'import:excel';

    protected $description = 'Laravel Excel importer';

    public function handle()
    {
        $this->output->title('Starting import');
        (new ThesesImport)->withOutput($this->output)->import('storage/dump/2021-09-15-theses.csv');
        $this->output->success('Import successful');
    }
}
