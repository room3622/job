<?php
$file = storage_path().'/logs/';
return [

    'directories' => [

        /*
         * Here you can specify which directories need to be cleanup. All files older than
         * the specified amount of minutes will be deleted.
         */


        $file => [
            'deleteAllOlderThanMinutes' => 60 * 24
        ],

    ],
];
