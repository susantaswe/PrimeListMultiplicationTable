<?php
  namespace App\Models;
  /**
   * class primeNumbers
   * Usage: This class is used to get all prime numbers
   *        by taking the count as input
   */
  class primeNumbers {
    private $primes;
    private $divisors;
    private $primeCount;
    private $nextIncrement;
    private $nextDivisorPos;
    private $nextNumber;
    
    /**
     * Initiate the primeClass and set default values
     */
    public function __construct($count = 10) {
      if($count < 1) $count = 1;
      $this->primeCount = $count;
      $this->primes = [2,3];
      $this->divisors = array();
      $this->nextNumber = 5;
      $this->nextDivisorPos = $this->nextIncrement = 2;
    }
    
    /**
     * Generate the multiplication table of the Prime numbers 
     * Returns tabluar formated data with multiplication results
     */
    public function getMultiplicationTable () {
      $results = $this->getPrimeMulResults();
      $numSpaces = ceil(sqrt($this->primeCount))+1; // Number of Spaces required to display in table
      $output = str_pad('|', $numSpaces+1, " ",STR_PAD_LEFT) . " ";
      
      // Display first row with prime numbers
      for($k = 0; $k < $this->primeCount; $k++) {
        $output .= str_pad($this->primes[$k], $numSpaces, " ",STR_PAD_RIGHT);
      }
      $output .= "\n";
      
      // Display dashes below the first row with prime numbers
      for($j = 0; $j < $this->primeCount-1; $j++) {
        if($j == 0)
          $output .= str_pad('-', $numSpaces, "-",STR_PAD_RIGHT) . "+";
        else 
          $output .= str_pad('-', $numSpaces, "-",STR_PAD_RIGHT) . "-";
      }
      $output .= "\n";
      
      // Display multiplication results with formatting
      for($row = 0; $row < $this->primeCount; $row++) {
        for($col = 0; $col < $this->primeCount; $col++) {
          if ($col == 0) {
            // Display first column as prime numbers
            $output .= str_pad($this->primes[$row], $numSpaces, " ",STR_PAD_RIGHT) . "| ";
          }
          // Display multiplication results for each column
          $output .= str_pad($results[$row][$col], $numSpaces, " ",STR_PAD_RIGHT);
        }
        $output .= "\n";
      }
      return $output;
    }
    /**
     * Get the multiplication results of the Prime numbers 
     * Returns array of multiplication results
     */
    public function getPrimeMulResults() {
      $this->generatePrime();
      $rows = [];
      
      //Multiplication results by looping prime numbers as row and column
      for ($col = 0, $row = 0; $col < $this->primeCount - 1, $row < $this->primeCount; $col++) {
        $rows[$row][$col] = $this->primes[$row] * $this->primes[$col];
        if ($col >= $this->primeCount - 1) {
          $col = -1;
          $row++;
        }
      }
      return $rows;
    }

    /**
     * Generate Prime numbers 
     * Returns array of prime numbers
     */
    public function generatePrime() {
      if( $this->primeCount <= 2) {
        // Return part of default prime array of 2 numbers
        return array_slice($this->primes, 0, $this->primeCount);
      } else {
        // Add next prime numbers until count reaches
        while (count($this->primes) < $this->primeCount) {
          $this->addNextPrime();
        }
        return $this->primes;
      }
    }
    
    /**
     * Adds Next Prime number to the array
     */
    private function addNextPrime() {
      $cnt = count($this->primes);
      $lastPrime = $this->primes[$cnt-1]; // Last prime number
      
      if($lastPrime < 5) {
        $this->primes[] = $this->nextNumber;
      } else {
        // Get the next number
        $this->getNextNum();
        // Add divisor if the next number is greater than equals square of the prime number with next divisor position
        if ($this->nextNumber >= $this->primes[$this->nextDivisorPos] * $this->primes[$this->nextDivisorPos]) {
          $this->addDivisor();
        }
        // Assign to primes array if not divisible by any of the divisors
        if(!$this->isDivisible($this->nextNumber)) {
          $this->primes[] = $this->nextNumber;
        }
      }
    }
    
    /**
     * Get the Next Number to be checked for the divisibility
     */
    private function getNextNum() {
      if($this->nextIncrement == 2) {
        $this->nextNumber = $this->nextNumber + 2;
        $this->nextIncrement = 4;
      } else {
        $this->nextNumber = $this->nextNumber + 4;
        $this->nextIncrement = 2;
      }
    }
    
    /**
     * Add Numbers to the Divisor array
     */
    private function addDivisor() {
      $this->divisors[] = $this->primes[$this->nextDivisorPos];
      $this->nextDivisorPos = $this->nextDivisorPos + 1;
    }
    
    /**
     * Check if the number is Divisible by any of the divisors
     */
    private function isDivisible() {
      if(count($this->divisors) > 0) {
        foreach ($this->divisors as $div) {
          if($this->nextNumber % $div == 0) {
            return true;
          }
        }
      }
      return false;
    }
  }
?>