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
    public function __construct() {
      $this->primeCount = 2;
      $this->primes = [2,3];
      $this->divisors = array();
      $this->nextNumber = 5;
      $this->nextDivisorPos = $this->nextIncrement = 2;
    }
    
    /**
     * Generate Prime numbers 
     * Returns array of prime numbers
     */
    public function getNumbers($count = 10) {
      if($count <= 2) {
        $count = 2;
        return $this->primes;
      } else {
        $this->primeCount = $count;
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