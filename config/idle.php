<?php
$idletime=60;//after 60 seconds the user gets logged out

if (time()-$_SESSION['timestamp']>$idletime){
    session_destroy();
    session_unset();
}else{
    $_SESSION['timestamp']=time();
}

?>