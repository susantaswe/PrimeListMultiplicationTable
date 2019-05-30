<?php
  include(dirname(__FILE__).'\Models\primeNumbers.php');
  include(dirname(__FILE__).'\Models\renderer.php');
  
  use \App\Models\primeNumbers;
  use \App\Models\renderer;
  
  if (defined('STDIN') && isset($argv[1])) {
    $num = $argv[1];
  } else if (isset($_GET['num']) && $_GET['num']!= '') { 
    $num = $_GET['num'];
  } else {
	$num = 10; // default value
  }


  $primeObj = new primeNumbers();
  $primeNums = $primeObj->getNumbers($num);
  
  $viewerObj = new renderer();
  $tableOutput = $viewerObj->getTableMulResults($primeNums);
  
  echo $tableOutput;
?>