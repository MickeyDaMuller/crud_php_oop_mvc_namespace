<?php 
use \controller\Controller;
require_once "core/controller.php";
$controller = new Controller();

$query = "SELECT * FROM `notes` ";
$array = [];
$res = $controller->listItems($query, $array);

if(!empty($res)){
foreach($res as $row){
    echo $row['note']."<br><br>";
}

}else{
    
    echo "no list";
    
}

?>