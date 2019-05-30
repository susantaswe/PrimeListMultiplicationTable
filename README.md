Print Multiplication Table of Prime Numbers 

Description:   
This program prints out a multiplication table of the first 10 prime numbers, whereas we can make it for any numbers instead of 10. This program is written in order to run from the command line and print to screen one table. Across the top and down the left side, there are 10 prime numbers, and the body of the table contains the product of multiplying these numbers.   

An example of the output is:
   
   |  2   3   5   7  11  13  17  19  23  29   
­­­+­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­­   
 2 |  4   6  10  14  22  26  34  38  46  58   
 3 |  6   9  15  21  33  39  51  57  69  87   
 5 | 10  15  25  35  55  65  85  95 115 145   
 7 | 14  21  35  49  77  91 119 133 161 203   
11 | 22  33  55  77 121 143 187 209 253 319   
13 | 26  39  65  91 143 169 221 247 299 377   
17 | 34  51  85 119 187 221 289 323 391 493   
19 | 38  57  95 133 209 247 323 361 437 551   
23 | 46  69 115 161 253 299 391 437 529 667   
29 | 58  87 145 203 319 377 493 551 667 841   

This program uses the Sieve of Eratosthenes concept to find the prime numbers. The time complexity of the program is O(n(logn)(loglogn)).

Note:
•	Please make sure that you have phpunit installed. If not installed please follow the below commands
  o	 composer require phpunit/phpunit --dev
•	In order to run the phpunit tests, please check and run any of the below commands
  o	phpunit
  o	./vendor/bin/phpunit
  o	php vendor/phpunit/phpunit/phpunit

Steps to execute the code:
============================
1. Install xampp / wamp OR install Apache & PHP separately
2. Go to web root folder (D:\xampp\htdocs in my case)
3. Clone the code from https://github.com/susantaswe/PrimeListMultiplicationTable.git 
4. Now "PrimeListMultiplicationTable" should be in there in your machine ("D:\xampp\htdocs\PrimeListMultiplicationTable" in my case)
5. Run the code in command prompt. In my case - php D:\xampp\htdocs\PrimeListMultiplicationTable\index.php 5
   - Please note that 10 is the count of prime numbers which should be passed as a parameter. The program is updated such a way that if there is no parameter sent to index.php then it would take 10 as default count.
