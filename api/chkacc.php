<?php
include_once "../base.php";
$acc=$_GET["acc"];

$chk=$User->count(['acc'=>$acc]);
if($chk>0){
    echo "1";
}else{
    echo "0"; 
}

?>