<?php
    require('../inc/function.php');
    session_start();
    // naviagation link
    $link = array();
    $link[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($link, "page");

    if(isset($_POST['user_id']))
    {
        $user_id = $_POST['user_id'];
        // 
        // old information
        $old_info = get_user_by_id($user_id);
        // values posted
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $statut = $_POST['statut'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        // password change or not
        if ($mdp == "")
        {
            $mdp = $old_info['u_mdp'];
        }
        
        // update values
        $column = array();
        $column[] = array('key' => 'u_last_name', 'value' => $last_name);
        $column[] = array('key' => 'u_first_name', 'value' => $first_name);
        $column[] = array('key' => 'u_birth_date', 'value' => $birth_date);
        $column[] = array('key' => 'u_gender', 'value' => $gender);
        $column[] = array('key' => 'u_statut', 'value' => $statut);
        $column[] = array('key' => 'u_email', 'value' => $email);
        $column[] = array('key' => 'u_mdp', 'value' => $mdp);
        // update condition
        $condition = array();
        $condition[] = array('key' => 'user_id', 'value' => $user_id);
        // update to table user
        $update_user = update_table('user', $column, $condition);

        // redirect to user_management page
        $link[] = array('key' => 'user_statut', 'value' => $statut);
        $link[$page_index]['value'] = 'user_management.php';
        header('Location: ' . navigation_link($link));
    }
?>