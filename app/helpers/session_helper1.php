<?php 

    session_start();

    //Flash message helper
    //Example -flash('register_success', 'You are now registered')
    //display in view - echo flash('register_success')


    function flash($name='', $message='', $class='alert alert-success'){
        print_r($_SESSION);
        echo '<br>';
        echo '<br>';
        echo 'name: '.$name;
        echo '<br>';
        echo 'message: '.$message;
        echo '<br>';
        echo 'class: '.$class;
        echo '<br>';

        if(!empty($name)){

            $msg = !empty($message) ? 'True' : 'False';

            $session_nam = empty($_SESSION[$name]) ? 'True' : 'False'; 
            echo '<br>';
            echo '1is message not empty?:  '.$msg;
            echo '<br>';
            echo '1Message: '.$message;
            echo '<br>';
            echo '1is session_name empty?:  '.$session_nam;
            echo '<br>';
            echo '<br>';

            $bool = (!empty($message) && empty($_SESSION[$name])) ? 'True' : 'False';
            echo 'if_answer1 : '.$bool;
            $bool2 = ((empty($message) && !empty($_SESSION[$name]))) ? 'True' : 'False';
            echo '<br>';
            echo 'if_answer2 : '.$bool2;
            echo '<br>';
            echo '********** before 1st if() **********';

            if(!empty($message) && empty($_SESSION[$name])){
            
             if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }

             if(!empty($_SESSION[$name. '_class'])){
                    unset($_SESSION[$name. '_class']);
                }
            echo '<br>';
            echo '1Session-name-var '.$_SESSION[$name];
            echo '1Session-name-class '.$_SESSION[$name.'_class'];
            echo '<br>';
            echo '<br>';
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
            echo '<br>';
            echo '<br>';
            echo '1.1Session-name-var '.$_SESSION[$name];
            echo '1.1Session-name-class '.$_SESSION[$name.'_class'];
            echo '<br>';
            echo '<br>';

            echo '1session name: from:- !empty($message) && empty($_SESSION[$name]): '. $_SESSION[$name];
            echo '<br>';
            echo '1session classname:  from:- !empty($message) && empty($_SESSION[$name]):'. $_SESSION[$name.'_class'];
            echo '<br>';

          } elseif (empty($message) && !empty($_SESSION[$name])) {


            $msg = !empty($message) ? 'True' : 'False';
            $session_nam = empty($_SESSION[$name]) ? 'True' : 'False'; 

            echo '2ElseIF: is message not empty?:    '.$msg;
            echo '<br>';
            echo 'Message:   '.$message;
            echo '<br>';
            echo '2ElseIF:is session_name empty?:  '.$session_nam;
            echo '<br>';
            echo 'Session_Nam: '.$_SESSION[$name];
            $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name.'_class'] : '';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '2session name: empty($message) && !empty($_SESSION[$name]):   '. $_SESSION[$name];
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '2session classname: empty($message) && !empty($_SESSION[$name]):    '. $_SESSION[$name.'_class'];
            echo '<br>';
            echo '<br>';
            echo '<br>';

            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }

      }

    }



 ?>