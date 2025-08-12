// function to get file name of an input file
function input_file_name(user_id)
{
    input = document.getElementById(user_id + "_image");
    image_name = document.getElementById(user_id + "_image_name");

    if (input.files.length > 0)
    {
        image_name.innerText = input.files[0].name;
    }
    else 
    {
        image_name.innerText = 'No file chosen'; 
    }
}

// function to reset form on close
function reset_form(user_id)
{
    // reset all input 
    form = document.getElementById(user_id + "_edit_form");
    form.reset();

    // reset span image_name
    image_name = document.getElementById(user_id + "_image_name");
    image_name.innerText = 'No file chosen';
}

// function to click button by a label (for...) 
function click_button_label(user_id, prefixe, event) {
    button = document.getElementById(user_id + prefixe);

    if (event.key === 'Enter')
    {
        event.preventDefault();
        button.click();
    }
}