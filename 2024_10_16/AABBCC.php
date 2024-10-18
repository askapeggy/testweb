<?php  
$colors = array("red", "green", "blue", "yellow"); 

foreach ($colors as $x) {
  echo $x."<br>";
}


$colors = array(A=>"red", B=>"green", C=>"blue", D=>"yellow"); 

foreach ($colors as $x=>$y) {
  echo "Key:".$x."<br>";
  echo "V:".$y."<br>";
}
?>  
