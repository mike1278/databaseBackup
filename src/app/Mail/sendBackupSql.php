<?php

namespace kenwood\DBbackup\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendBackupSql extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('APP_NAME').'@mail.com',env('APP_NAME'))
                    ->subject('Backup base de datos de '.env('APP_NAME'))
                    ->attach(storage_path('app').'/dbBackup.sql')
                    ->view('kenwood::mails.dbBackup');
    }
}
