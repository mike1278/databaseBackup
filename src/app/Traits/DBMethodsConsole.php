<?php

namespace kenwood\DBbackup\Traits;

trait DBMethodsConsole{
    function mysql():string{
        return 'mysqldump --user='.env('DB_USERNAME').' --password='.env('DB_PASSWORD');
    }

    function pgsql():string{
        return 'SET PGPASSWORD='.env('DB_PASSWORD').'  pg_dump -U '.env('DB_USERNAME');
    }
}