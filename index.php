<?php
ini_set('display_errors',TRUE);

require_once 'vendor/autoload.php';
require_once 'controller/controller.php';

(new controller\Controller((isset($_GET['act']) && !empty($_GET['act'])? $_GET['act'] : NULL)) );