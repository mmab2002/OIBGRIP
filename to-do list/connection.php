<?php
$servername ="localhost";
$username ="root";
$password ="";
$database="todo list";
$connection= mysqli_connect($servername,$username,$password,$database);
if($connection){
    echo "connected";
}else{
    echo "not connected";
}
?> 
 