<?php
require '../Config/define_path.php';
require '../vendor/autoload.php';
require '../core/Database.php';
require '../bootstraps/database.php';


session_start();

$app = new Core\App();
