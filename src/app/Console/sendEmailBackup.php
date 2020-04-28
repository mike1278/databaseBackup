<?php

namespace kenwood\DBbackup\Console;

use Illuminate\Console\Command;
use kenwood\DBbackup\Traits\Verify;
use kenwood\DBbackup\Mail\sendBackupSql;

class sendEmailBackup extends Command
{
    use Verify;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:sendBackup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar backup de la base de datos a un correo electronico';

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
        try {
            \Mail::to(config('DatabaseBackup.mail_to'))->queue(new sendBackupSql());
            $this->info('Email sent correctly');
        } catch (Exception $e) {
            $this->error('Errores when sending the email');
        }
    }
}
