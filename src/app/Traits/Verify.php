<?php

namespace kenwood\DBbackup\Traits;

use File;

trait Verify{
    public function	handle(){
    	if(!File::exists(config('DatabaseBackup.ubication_file'))){
            $this->error('The config file, does not exist.');
            $this->line('you can run: php artisan vendor:publish --provider="kenwood\DBbackup\DatabaseBackupServiceProvider" --tag="config"');
            return;
        }
        $this->start();
    }
}