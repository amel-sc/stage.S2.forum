<?php
    require('connexion.php');
    require("gen_function.php");
    
    // navigation link functions
    // function to create links
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
        $upload_dir = dirname(__DIR__).'/assets/images/';
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
        $file_path = '../assets/images/' . $newName;
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

?>