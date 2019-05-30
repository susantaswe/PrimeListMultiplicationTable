<?php
  //include(dirname(__FILE__).'\models\primenumbers.php');
  //include(dirname(__FILE__).'\models\renderer.php');
  
  include('models/primenumbers.php');
  include('models/renderer.php');
  
  use \App\Models\primenumbers;
  use \App\Models\renderer;

  if (defined('STDIN') && isset($argv[1])) {
    $num = $argv[1];
  } else if (isset($_GET['num']) && $_GET['num']!= '') { 
    $num = $_GET['num'];
  } else {
	$num = 10; // default value
  }


  $primeObj = new primenumbers();
  $primeNums = $primeObj->getNumbers($num);
  
  if($primeNums) {
	  $viewerObj = new renderer();
	  $tableOutput = $viewerObj->getTableMulResults($primeNums);
	  
	  echo $tableOutput;
  }
  else echo 'Please input the count';
?>