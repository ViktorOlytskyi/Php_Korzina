<?php

set_time_limit(0);

date_default_timezone_set('Europe/Kiev');

define('FILE_MAX_LIFE_TIME_MINUTES', 20);

$now = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));

$dir = new DirectoryIterator(__DIR__.'/notes/');


foreach ($dir as $fileinfo) {
     if (!$fileinfo->isDot()) {
         
        $fileCreationDateTime = new \DateTime();
        $fileCreationDateTime->setTimestamp($fileinfo->getCTime());

        $interval = $fileCreationDateTime->diff($now);

        $minutes = $interval->format('%i');
        $hours = $interval->format('%i');

        print_r($liveMins);


        

        //  if ($secondsGoes > FILE_MAX_LIFE_TIME_MINUTES) {20       //     unlink(
        //         $fileinfo->getRealPath()
        //     );
        //  }
         
        
     }
 }