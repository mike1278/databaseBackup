<?php

namespace kenwood\DBbackup\Console;

use Illuminate\Console\Command;
use kenwood\DBbackup\Mail\sendBackupSql;

class sendEmailBackup extends VerifyConfigCommand
{

    protected $signature = 'db:sendBackup';
    protected $description = 'Send database backup to an email';

    public function __construct()
    {
        parent::__construct();
    }

    public function start()
    {
        $this->info('The backup has been sent to your email...');
        try {
            \Mail::to(config('DatabaseBackup.mail_to'))->queue(new sendBackupSql());
            $this->info('Email sent correctly');
        } catch (Exception $e) {
            $this->error('Errores when sending the email');
        }
    }
}
