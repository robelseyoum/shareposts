
<?php 

    //Load Config
    require_once 'config/config.php';
    //Load url_helper
    require_once 'helpers/url_helper.php';
    //Load flash
    require_once 'helpers/session_helper.php';

    //Load Libraries
    // require_once 'libraries/Core.php';
    // require_once 'libraries/Controller.php';
    // require_once 'libraries/Database.php';


    //Autoload Core Libraries
    spl_autoload_register(function($className){
        require_once 'libraries/'.$className.'.php';
    });

 ?>
