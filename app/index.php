<?php
  include("Models\primeNumbers.php");
  use \App\Models\primeNumbers;

  $obj = new primeNumbers(10);
  $result = $obj->getMultiplicationTable();
  
  echo $result;
?>