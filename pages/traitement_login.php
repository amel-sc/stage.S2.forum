<?php
    require('../inc/function.php');
    session_start();
    // value posted
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // naviagtion link
    $link = array();
    $link[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($link, "page");

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
        $link[$page_index]['value'] = "inscription";
        header('Location: ' . navigation_link($link));
    }
?>