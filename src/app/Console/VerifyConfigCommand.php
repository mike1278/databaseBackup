<?php

namespace kenwood\DBbackup\Console;

use File;
use Illuminate\Console\Command;

class VerifyConfigCommand extends Command
{

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if(!File::exists(config('DatabaseBackup.db_backup_path'))){
            File::makeDirectory(config('DatabaseBackup.db_backup_path'));
        }
        $this->start();
    }
}