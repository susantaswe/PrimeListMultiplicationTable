<?php
  include('Models\primeNumbers.php');
  include('Models\renderer.php');
  
  use \App\Models\primeNumbers;
  use \App\Models\renderer;

  $primeObj = new primeNumbers();
  $primeNums = $primeObj->getNumbers(10);
  
  $viewerObj = new renderer();
  $tableOutput = $viewerObj->getTableMulResults($primeNums);
  
  echo $tableOutput;
?>