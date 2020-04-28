<?php

return [

	//where send the email with backup database
    'mail_to' => env('DBbackup_to'),

    //where save the backup
    'ubication_file' => storage_path('app'),

    'name_file' => 'DBbackup.sql',
];
