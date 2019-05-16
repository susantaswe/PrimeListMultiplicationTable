<?php
  namespace App\Models;
  
  /**
   * class renderer
   * Usage: This class is used to display the prime multiplications in tabular view
   *        by taking the count as input
   */
  class renderer {
    
    /**
     * Initiate the renderer class
     */
    public function __construct() {
      
    }
    
    /**
     * Generate the multiplication table of the Prime numbers 
     * Returns tabluar formated data with multiplication results
     */
    public function getTableMulResults ($arrNums) {
      
      $count = count($arrNums);
    
      $mulResults = $this->getMultiplicationResult($arrNums);
      
      $numSpaces = ceil(sqrt($count))+1; // Number of Spaces required to display in table
      $output = str_pad('|', $numSpaces+1, " ",STR_PAD_LEFT) . " ";
      
      // Display first row with prime numbers
      for($k = 0; $k < $count; $k++) {
        $output .= str_pad($arrNums[$k], $numSpaces, " ",STR_PAD_RIGHT);
      }
      $output .= "\n";
      
      // Display dashes below the first row with prime numbers
      for($j = 0; $j < $count-1; $j++) {
        if($j == 0)
          $output .= str_pad('-', $numSpaces, "-",STR_PAD_RIGHT) . "+";
        else 
          $output .= str_pad('-', $numSpaces, "-",STR_PAD_RIGHT) . "-";
      }
      $output .= "\n";
      
      // Display multiplication results with formatting
      for($row = 0; $row < $count; $row++) {
        for($col = 0; $col < $count; $col++) {
          if ($col == 0) {
            // Display first column as prime numbers
            $output .= str_pad($arrNums[$row], $numSpaces, " ",STR_PAD_RIGHT) . "| ";
          }
          // Display multiplication results for each column
          $output .= str_pad($mulResults[$row][$col], $numSpaces, " ",STR_PAD_RIGHT);
        }
        $output .= "\n";
      }
      return $output;
    }
    /**
     * Get the multiplication results of array of numbers 
     * Returns 2 dimensional array of multiplication results
     */
    public function getMultiplicationResult($arrNums) {
      if (is_array($arrNums) && count($arrNums) > 1) {
        $rows = [];
        $count = count($arrNums);
        
        //Multiplication results by looping prime numbers as row and column
        for ($col = 0, $row = 0; $col < $count - 1, $row < $count; $col++) {
          $rows[$row][$col] = $arrNums[$row] * $arrNums[$col];
          if ($col >= $count - 1) {
            $col = -1;
            $row++;
          }
        }
        return $rows;
      } else {
        return $arrNums;
      }
    }

  }
?>