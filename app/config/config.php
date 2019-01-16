<?php 

    // DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'Madiera3');
    define('DB_NAME', 'shareposts');




    //echo __FILE__; // it shows the the file directory paths
    //dirname() // A method used for one down the file directory paths
    
    //App root 
    define('APPROOT', dirname(dirname(__FILE__)));


    //URL root
    define('URLROOT', 'http://traversymedia.test/shareposts');

   //echo URLROOT; //output http://traversymedia.test/shareposts


    
    //Below are its 'about', are functions inside controllers folder and file Pages.php
    
    //Below 'register', 'login' are functions inside controllers folder and file Pages.php
    //http://traversymedia.test/shareposts/pages/about
    //http://traversymedia.test/shareposts/users/register 
    //http://traversymedia.test/shareposts/users/login



    //Site Name;
    define('SITENAME', 'SharePosts');

    //App Version
    define('APPVERSION', '1.0.0');


    
 ?>