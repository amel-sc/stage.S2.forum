<?php
    require('../inc/function.php');
    session_start();
    // naviagation link
    $link = array();
    $link[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($link, "page");
    // lastest user statut
    $user_statut = $_SESSION['user_statut'];
    // lastest page (in pagination)
    $index_pagination = $_SESSION['index_pagination'];
    // current user
    $current_user = $_SESSION['current_user'];
    // latest search
    $search = $_SESSION['search_user_management'];

    if(isset($_POST['user_id']))
    {
        $user_id = $_POST['user_id'];
        // old information
        $old_info = get_user_by_id($user_id);
        // values posted
        $last_name = check_input_value($_POST['last_name'], $old_info, "u_last_name", "text");
        $first_name = check_input_value($_POST['first_name'], $old_info, "u_first_name", "text");
        $birth_date = check_input_value($_POST['birth_date'], $old_info, "u_birth_date", "text");
        $gender = check_input_value($_POST['gender'], $old_info, "u_gender", "text");
        $statut = check_input_value($_POST['statut'], $old_info, "u_statut", "text");
        $email = check_input_value($_POST['email'], $old_info, "u_email", "text");
        $mdp = check_input_value($_POST['mdp'], $old_info, "u_mdp", "text");
        $image = check_input_value($_FILES['image'], $old_info, "u_image", "file");
        
        // update values
        $column = array();
        $column[] = array('key' => 'u_last_name', 'value' => $last_name);
        $column[] = array('key' => 'u_first_name', 'value' => $first_name);
        $column[] = array('key' => 'u_birth_date', 'value' => $birth_date);
        $column[] = array('key' => 'u_gender', 'value' => $gender);
        $column[] = array('key' => 'u_statut', 'value' => $statut);
        $column[] = array('key' => 'u_email', 'value' => $email);
        $column[] = array('key' => 'u_mdp', 'value' => $mdp);
        $column[] = array('key' => 'u_image', 'value' => $image);
        // update condition
        $condition = array();
        $condition[] = array('key' => 'user_id', 'value' => $user_id);
        // update to table user
        $update_user = update_table('user', $column, $condition);

        // redirect to user_management page
        $link[] = array('key' => 'user_statut', 'value' => $user_statut);
        $link[] = array('key' => 'index_pagination', 'value' => $index_pagination);
        $link[] = array('key' => 'search', 'value' => $search);
        $link[$page_index]['value'] = 'user_management.php';
        header('Location: ' . navigation_link($link));
    }

    else 
    {
        // old information
        $old_info = get_user_by_id($current_user['user_id']);
        // condition if general information or security is to update 
        if (isset($_POST['common_user']))
        {
            $common_user = $_POST['common_user'];
            if ($common_user == "gen_info")
            {  
                // values posted
                $last_name = check_input_value($_POST['last_name'], $old_info, "u_last_name", "text");
                $first_name = check_input_value($_POST['first_name'], $old_info, "u_first_name", "text");
                $birth_date = check_input_value($_POST['birth_date'], $old_info, "u_birth_date", "text");
                $gender = check_input_value($_POST['gender'], $old_info, "u_gender", "text");

                // update values
                $column = array();
                $column[] = array('key' => 'u_last_name', 'value' => $last_name);
                $column[] = array('key' => 'u_first_name', 'value' => $first_name);
                $column[] = array('key' => 'u_birth_date', 'value' => $birth_date);
                $column[] = array('key' => 'u_gender', 'value' => $gender);
            }

            else if ($common_user == "security")
            {
                // values posted
                $email = check_input_value($_POST['email'], $old_info, "u_email", "text");
                $mdp = check_input_value($_POST['mdp'], $old_info, "u_mdp", "text");
                
                // update values
                $column[] = array('key' => 'u_email', 'value' => $email);
                $column[] = array('key' => 'u_mdp', 'value' => $mdp);
            }

            // update condition
            $condition = array();
            $condition[] = array('key' => 'user_id', 'value' => $current_user['user_id']);
            // update to table user
            $update_user = update_table('user', $column, $condition);
    
            // redirect to user_management page
            $link[$page_index]['value'] = 'profile.php';
            header('Location: ' . navigation_link($link));
        }
    }
?>