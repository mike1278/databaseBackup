<?php

namespace kenwood\DBbackup\Console;

use kenwood\DBbackup\Mail\sendBackupSql;
use Illuminate\Console\Command;
use kenwood\DBbackup\Traits\DBMethodsConsole;
use kenwood\DBbackup\Traits\Verify;

class DBbackup extends Command
{
    use DBMethodsConsole,Verify;

    protected $signature = 'db:backup {--send}';
    protected $description = 'Creacion de backup de la base de datos';

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
        exec($this->$DB().' '.env('DB_DATABASE').' > '.config('DatabaseBackup.ubication_file').'/'.config('DatabaseBackup.name_file'));
        $this->info('Backup done correctly');
        if($this->option('send')){
            $this->call('db:sendBackup');
        }
    }
}