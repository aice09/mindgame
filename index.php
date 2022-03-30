<?php 
require_once 'environment.php';

$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case 'play' :
        $title="play";  
        $content='pages/play.php';        
        break;

    case 'results' :
        $title="results";  
        $content='pages/results.php';        
        break;
       
    default :
        $title="Home";  
        $content ='pages/home.php';     
}

require_once 'template/body.php';
//require_once 'config/idle.php';
?>