<?php
include("danhmuc/them.php");
include("danhmuc/lietke.php");
if(isset($_GET['query'])){
    $query = $_GET['query'];
}else{
    $query = null;
}
if($query == 'sua'){
    include("danhmuc/sua.php");
}
?>