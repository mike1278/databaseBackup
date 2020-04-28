<?php

return [

	//where send the email with backup database
    'mail_to' => env('DBbackup_to'),

    'db_backup_path' => env('DB_BACKUP_PATH',storage_path('app/databaseBackup')),

    'name_file' => env('DB_BACKUP_NAME_FILE','DBbackup.sql'),
];
