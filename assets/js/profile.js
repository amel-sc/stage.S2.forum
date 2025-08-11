function password_visibility() {
    $password = document.getElementById("password");
    $password_button = document.getElementById("password_button");

    if ($password.type == "text")
    {
        $password.type = "password";
        $password_button.src = "../assets/images/show.png";

    }
    else if ($password.type == "password")
    {
        $password.type = "text";
        $password_button.src = "../assets/images/hide.png";
    }
}

document.getElementById("password_button").addEventListener("click", password_visibility);