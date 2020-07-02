<?php
if (!session_id())  session_start();


require_once 'app/init.php';

$app = new App;
 //composer require "mongodb/mongodb=^1.0.0"