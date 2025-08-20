function checkbox_value(user_id) {
    let check = document.getElementById("check_" + user_id);
    let check_value = document.getElementById("check_value_" + user_id);
    let input_container = document.getElementById("input_container_" + user_id);

    let check_value_split = check.value.split("-");

    if (check.checked)
    {
        check.value = check_value_split[0] + "-1";
        check_value.innerText = permission_name("1");
        // delete input hidden
        let hidden_input = document.getElementById("input_hidden_" + user_id)

        if(hidden_input)
        {
            input_container.removeChild(hidden_input);
        }
    }
    else 
    {
        check.value = check_value_split[0] + "-0";
        check_value.innerText = permission_name("0");

        // create input hidden
        // create input element
        let hidden_input = document.createElement("input");

        // set input values
        hidden_input.type = "hidden";
        hidden_input.name = "user_id[]";
        hidden_input.id = "input_hidden_" + user_id;
        hidden_input.value = check.value;

        // add in input_container
        input_container.appendChild(hidden_input);
    }
}

// function for permission name
function permission_name(permission) {
    let result;
    if (permission == "0")
    {
        result = "Show";
    }
    else if (permission == "1")
    {
        result = "Hide";
    }

    return result;
}