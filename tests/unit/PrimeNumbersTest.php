<?php
  class PrimeNumbersTest extends \PHPUnit_Framework_TestCase {
    
    public function testGetPrimeNumbers() {
      $expectedResult = Array("0" => 2, "1" => 3, "2" => 5, "3" => 7, "4" => 11, "5" => 13, "6" => 17, "7" => 19, "8" => 23, "9" => 29, "10" => 31, "11" => 37, "12" => 41, "13" => 43, "14" => 47, "15" => 53, "16" => 59, "17" => 61, "18" => 67, "19" => 71);
      
      $primeObj = new \App\Models\primeNumbers();
      $result = $primeObj->getNumbers(20);
      
      $this->assertEquals($result, $expectedResult);
    }
    
  }