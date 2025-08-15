function password_visibility() {
    $password = document.getElementById("password");
    $password_button = document.getElementById("password_button");

    if ($password.type == "text")
    {
        $password.type = "password";
        $password_button.src = "../assets/images/show.png";
        $password_button.alt = "show password";

    }
    else if ($password.type == "password")
    {
        $password.type = "text";
        $password_button.src = "../assets/images/hide.png";
        $password_button.alt = "hide password";
    }
}

document.getElementById("password_button").addEventListener("click", password_visibility);

// for password who need user id
function password_visibility_id(user_id, mdp_id, mdp_button) {
    $password = document.getElementById(user_id + mdp_id);
    $password_button = document.getElementById(user_id + mdp_button);

    if ($password.type == "text")
    {
        $password.type = "password";
        $password_button.src = "../assets/images/show.png";
        $password_button.alt = "show password";

    }
    else if ($password.type == "password")
    {
        $password.type = "text";
        $password_button.src = "../assets/images/hide.png";
        $password_button.alt = "hide password";
    }
}