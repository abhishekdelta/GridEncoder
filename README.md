GridEncoder
===========

A small encryption tool I wrote in order to convert Numeric IDs into unique &amp; random Alpha-Numeric codes so as to hide the integer behind it. 

USECASE
-------
 When you want to expose a database index (primary key, incremental column) value to the user but don't want him to know the actual number which might reveal sensitive info like his actual user ID, then you encrypt it via Grid Encoder which ultimately generates Youtube video links like alpha-numeric code for your integer.

USAGE
-----
* Ensure you have python and php installed
* Execute python script grid_generator.py. It will generate 3 files in the same directory in which it is executed. These files act as source data.
* PHP-based encryption and decryption functions are defined in gridencoder.lib.php. Simply include that file in your code and use the methods.
* Checkout sample.php for sample code.

SAMPLE OUTPUT
-------------
    >php sample.php 
    INTEGER 	  ==> ENCODED 		       ==> DECODED
    0 		       ==> S54Oo5Lg7qK1An6 	==> 0
    1 		       ==> TV5WW0Lg7xo9xo9 	==> 1
    2 		       ==> YH5Ci8xo9xo9Oo5 	==> 2
    3 	       	==> 844xo9Lg7qK17M2 	==> 3
    4 		       ==> 2r0xo9Oo5qK1WW0 	==> 4
    5 		       ==> OQ7WW0qK1qK1Lg7 	==> 5
    6 		       ==> a61xo9An6Lg7Ci8 	==> 6
    7 		       ==> Xz9Lg7Lg7An6Oo5 	==> 7
    8 		       ==> 8F1xo9WW07M2Ci8 	==> 8
    9 		       ==> oB9An6S54S54Oo5 	==> 9
    100000000 	==> WW03W3An6Oo5GU7 	==> 100000000
    100000001 	==> Zs13W37M2qK1q62 	==> 100000001
    100000002 	==> lU33W3WW07M2Bw4 	==> 100000002
    100000003 	==> RC1Ci8Ci8Lg7q62 	==> 100000003
    100000004 	==> 8R7WW0An6Oo5SE8 	==> 100000004
    100000005 	==> uJ2An6xo97M2Zs1 	==> 100000005
    100000006 	==> Yk8xo9An6Oo5dN0 	==> 100000006
    100000007 	==> Vw2Lg7An6S54JY9 	==> 100000007
    100000008 	==> XH3An6Ci8WW0e56 	==> 100000008
    100000009 	==> oB9S547M2An6q62 	==> 100000009

ISSUES
------
Ping me.
