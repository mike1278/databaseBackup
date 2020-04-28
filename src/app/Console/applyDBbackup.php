<?php

namespace kenwood\DBbackup\Console;

use Illuminate\Console\Command;
use kenwood\DBbackup\Traits\DBMethodsConsole;
use kenwood\DBbackup\Traits\Verify;

class applyDBbackup extends Command
{
    use DBMethodsConsole,Verify;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:applyBackup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aplicar backup existente';

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
    public function start()
    {
        $DB = env('DB_CONNECTION');
        if(!method_exists($this,$DB)){
            $this->error('No se suporta '.$DB);
            return;
        }
        exec($this->$DB().' '.env('DB_DATABASE').' < '.config('DatabaseBackup.ubication_file').'/'.config('DatabaseBackup.name_file'));
        $this->info('Backup restaurado correctamente');
    }
}
