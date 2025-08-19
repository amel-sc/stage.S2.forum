function checkbox_value(user_id) {
    let check = document.getElementById("check_" + user_id);
    let check_value = document.getElementById("check_value_" + user_id);
    let input_container = document.getElementById("input_container_" + user_id);

    if (check.checked)
    {
        check.value = check.value.split("-")[0] + "-1";
        check_value.innerText = check.value;
        // delete input hidden
        let hidden_input = document.getElementById("input_hidden_" + user_id)

        if(hidden_input)
        {
            input_container.removeChild(hidden_input);
        }
    }
    else 
    {
        check.value = check.value.split("-")[0] + "-0";
        check_value.innerText = check.value;

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