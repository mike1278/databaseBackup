<?php

namespace kenwood\DBbackup\Console;

use Illuminate\Console\Command;
use kenwood\DBbackup\Mail\sendBackupSql;
use kenwood\DBbackup\Traits\DBMethodsConsole;

class DBbackup extends VerifyConfigCommand
{
    use DBMethodsConsole;

    protected $signature = 'db:backup {--send}';
    protected $description = 'Database backup creation';

    public function __construct()
    {
        parent::__construct();
    }

    public function start()
    {
        $this->info('Database backup started...');
        $DB = env('DB_CONNECTION');
        if(!method_exists($this,$DB)){
            $this->error('No se suporta '.$DB);
            return;
        }
        exec($this->$DB().' '.env('DB_DATABASE').' > '.config('DatabaseBackup.db_backup_path').'/'.config('DatabaseBackup.name_file'));
        $this->info('Backup done correctly');
        if($this->option('send')){
            $this->call('db:sendBackup');
        }
    }
}