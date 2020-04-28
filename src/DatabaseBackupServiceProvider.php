<?php

namespace kenwood\DBbackup;

use Illuminate\Support\ServiceProvider;
use kenwood\DBbackup\Console\DBbackup;
use kenwood\DBbackup\Console\applyDBbackup;
use kenwood\DBbackup\Console\sendEmailBackup;

class DatabaseBackupServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->publishConfig();
        $this->registerCommands();
        $this->loadViewsFrom(__DIR__.'/resources/views', 'kenwood');
    }

    public function register(){
    }

    public function registerCommands(){
    	if ($this->app->runningInConsole()) {
	        $this->commands([
	            DBbackup::class,
	            applyDBbackup::class,
                sendEmailBackup::class,
	        ]);
	    }
    }

    public function publishConfig(){
    	$this->publishes([
            __DIR__.'/../config/DatabaseBackup.php' => config_path('DatabaseBackup.php'),
        ], 'config');
    }
}