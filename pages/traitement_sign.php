<?php
    require('../inc/function.php'); 
    // value posted
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
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
        $link[$page_index]['value'] = "login.php";
        header('Location: ' . navigation_link($link));
    }

    else 
    {
        // insert values
        $value = array();
        $value[] = array('key' => 'u_last_name', 'value' => $last_name);
        $value[] = array('key' => 'u_first_name', 'value' => $first_name);
        $value[] = array('key' => 'u_birth_date', 'value' => $birth_date);
        $value[] = array('key' => 'u_gender', 'value' => $gender);
        $value[] = array('key' => 'u_email', 'value' => $email);
        $value[] = array('key' => 'u_mdp', 'value' => $mdp);
        $value[] = array('key' => 'u_image', 'value' => "../assets/images/user.png");
        // insert values in table
        insert_table("user", $value);
        // navigation link
        $link[$page_index]['value'] = "login.php";
        header('Location: ' . navigation_link($link));
    }
?>