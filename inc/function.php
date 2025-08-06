<?php
    require('connexion.php');
    require("gen_function.php");
    
    // navigation link functions
    // function to create links with model
    function navigation_link($value)
    {
        $link = 'model.php?';
        for ($i = 0; $i < count($value); $i++)
        {
            if ($i > 0) {
                $link = $link . '&';
            }
    
            $link = $link . $value[$i]['key'] . '=' . $value[$i]['value'];
        }
    
        return $link;
    }
    // function to create link without model
    function custom_navigation_link($value)
    {
        $page_index = get_index($value, 'page');
        $link = $value[$page_index]['value'] . '?';

        // count for '&'
        $count = 0;
        for ($i = 0; $i < count($value); $i++)
        {
            if ($value[$i]['key'] != 'page')
            {
                if ($count > 0) {
                    $link = $link . '&';
                }
        
                $link = $link . $value[$i]['key'] . '=' . $value[$i]['value'];
                $count++;
            }
        }
    
        return $link;
    }
    // function to get the index of one motif in value
    function get_index($value, $key)
    {
        $index = null;
        for ($i = 0; $i < count($value); $i++)
        {
            if ($value[$i]['key'] == $key)
            {
                $index = $i;
            }
        }

        return $index;
    }   


    // function to get comment by forum_subject
    function get_comment_by_subject($subject_id)
    {
        $sql = "SELECT *  FROM comment WHERE subject_id = %s";
        $sql = sprintf($sql, $subject_id);
        $result = array_query($sql); 

        return $result;
    }

    // function to get the current date
    function get_current_date()
    {
        $sql = "SELECT NOW() as date_now";
        $result = one_query($sql);

        return $result;
    }

    // function to get user by id
    function get_user_by_id($user_id)
    {
        $sql = "SELECT * FROM user WHERE user_id = %s";
        $sql = sprintf($sql, $user_id);
        $result = one_query($sql);

        return $result;
    }

    // function uplaod image for profil
    function upload_image($file)
    {
        $upload_dir = dirname(__DIR__).'/assets/uploads/';
        $max_size = 500 * 1024 * 1024;
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Erreur lors de l’upload : ' . $file['error']);
        }

        // Vérifie la taille
        if ($file['size'] > $max_size) {
            die('Le fichier est trop volumineux.');
        }

        // Vérifie le type MIME avec `finfo`
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mime, $allowedMimeTypes)) {
            die('Type de fichier non autorisé : ' . $mime);
        }

        // renommer le fichier
        $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        $newName = $originalName . '_' . uniqid() . '.' . $extension;

        // Déplace le fichier
        move_uploaded_file($file['tmp_name'], $upload_dir . $newName);

        //add post in BDD
        $file_path = '../assets/uploads/' . $newName;
        return $file_path;
    }


    // function to upload image and video for post
    function upload_image_video($file)
    {
        $upload_dir = dirname(__DIR__).'/assets/uploads/';
        $max_size = 500 * 1024 * 1024;
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'video/mp4'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Erreur lors de l’upload : ' . $file['error']);
        }

        // Vérifie la taille
        if ($file['size'] > $max_size) {
            die('Le fichier est trop volumineux.');
        }

        // Vérifie le type MIME avec `finfo`
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mime, $allowedMimeTypes)) {
            die('Type de fichier non autorisé : ' . $mime);
        }

        // renommer le fichier
        $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        $newName = $originalName . '_' . uniqid() . '.' . $extension;

        // Déplace le fichier
        move_uploaded_file($file['tmp_name'], $upload_dir . $newName);

        //add post in BDD
        $file_path = '../assets/uploads/' . $newName;
        return $file_path;
    }


    // post duration
    function duration($datetime) {
        $timestamp = strtotime($datetime);
        $now = strtotime(get_current_date()['date_now']);
        $diff = $now - $timestamp;

        if ($diff < 60) {
            return $diff . ' sec.' . " ago";
        } elseif ($diff < 3600) {
            $minutes = floor($diff / 60);
            return $minutes . ' min.' . " ago";
        } elseif ($diff < 86400) {
            $hours = floor($diff / 3600);
            return $hours . ' hr.' . " ago";
        } elseif ($diff < 604800) {
            $days = floor($diff / 86400);
            return $days . ' day' . ($days > 1 ? 's' : '') . " ago";
        } elseif ($diff < 2419200) {
            $weeks = floor($diff / 604800);
            return $weeks . ' week' . ($weeks > 1 ? 's' : '') . " ago";
        } elseif ($diff < 29030400) {
            $months = floor($diff / 2419200);
            return $months . ' month' . ($months > 1 ? 's' : '') . " ago";
        } else {
            $years = floor($diff / 29030400);
            return $years . ' year' . ($years > 1 ? 's' : '') . " ago";
        }
    }

    // mdp to dot
    function mdp_to_dot($mdp)
    {
        $dot_mdp = "";
        for ($i = 0; $i < strlen($mdp); $i++)
        {
            $dot_mdp = $dot_mdp . "&#x2022;";
        }

        return $dot_mdp;
    }

    // gender return
    function gender_name($gender)
    {
        $gender_name = null;
        if ($gender == "M")
        {
            $gender_name = "Male";
        }
        else if ($gender == "F")
        {
            $gender_name = "Female";
        }

        return $gender_name;
    }

    // order return
    function order_name($order)
    {
        $order_name = null;
        if ($order == "DESC")
        {
            $order_name = "New";
        }
        else if ($order == "ASC")
        {
            $order_name = "Old";
        }

        return $order_name;
    }

    //user_statut name
    function statut_name($statut)
    {
        $statut_name = null;
        if ($statut == "1")
        {
            $statut_name = "Admin";
        }
        else if ($statut == "0")
        {
            $statut_name = "Common user";
        }

        return $statut_name;
    }


?>