<?php
    require('../inc/function.php');
    // naviagtion link
    $link = array();
    $link[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($link, "page");

    // current date
    $date_now = get_current_date()['date_now'];

    if (isset($_POST['admin_create']))
    {
        // value posted
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $statut = $_POST['statut'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        // verification if user already exist
        $condition = array();
        $condition[] = array('key' => 'u_email', 'value' => $email);
        // request
        $result = select_table('user', $condition, null);
        if (count($result) > 0)
        {
            $link[] = array('key' => 'user_exist', 'value' => 1);
            $link[$page_index]['value'] = 'create_user.php';
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
            $value[] = array('key' => 'u_statut', 'value' => $statut);
            $value[] = array('key' => 'u_email', 'value' => $email);
            $value[] = array('key' => 'u_mdp', 'value' => $mdp);
            $value[] = array('key' => 'u_image', 'value' => "../assets/images/user.png");
            $value[] = array('key' => 'u_inscription_date', 'value' => $date_now);
            // insert values in table
            insert_table("user", $value);
            // navigation link
            $link[$page_index]['value'] = "user_management.php";
            header('Location: ' . navigation_link($link));
        }
    }

    else 
    {
        // value posted
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
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
            $value[] = array('key' => 'u_statut', 'value' => 0); 
            $value[] = array('key' => 'u_inscription_date', 'value' => $date_now);
            // insert values in table
            insert_table("user", $value);
            // navigation link
            $link[$page_index]['value'] = "login.php";
            header('Location: ' . navigation_link($link));
        }
    }
?>