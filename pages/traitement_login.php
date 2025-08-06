<?php
    require('../inc/function.php');
    session_start();
    // naviagtion link
    $link = array();
    $link[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($link, "page");

    // condition admin login or common user login
    if (isset($_GET['admin_login']))
    {
        // values getted
        $user_id = $_GET['user_id'];
        // get user clicked
        $user_condition = array();
        $user_condition[] = array('key' => 'user_id', 'value' => $user_id);
        // request
        $user = select_table("user", $user_condition, null);

        // session and header location
        $_SESSION['current_user'] = $user[0];
        $link[$page_index]['value'] = "home.php";
        header('Location: ' . navigation_link($link));
    }
    else 
    {
        // value posted
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
    
        // verification if user already exist
        $condition = array();
        $condition[] = array('key' => 'u_email', 'value' => $email);
        $condition[] = array('key' => 'u_mdp', 'value' => $mdp);
        // request
        $result = select_table("user", $condition, null);
        if (count($result) > 0)
        {
            $_SESSION['current_user'] = $result[0];
            $link[$page_index]['value'] = "home.php";
            header('Location: ' . navigation_link($link));
        }
    
        else 
        {
            $link[] = array('key' => 'error', 'value' => 0);
            $link[$page_index]['value'] = "login.php";
            header('Location: ' . navigation_link($link));
        }
    }
?>