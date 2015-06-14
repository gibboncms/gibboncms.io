<?php

/* Register autoloaders
---------------------------------------------------------*/
require_once __DIR__.'/../vendor/autoload.php';


/* Load environment variables
---------------------------------------------------------*/
if (file_exists(__DIR__.'/../.env')) {
    Dotenv::load(__DIR__.'/../');
}
