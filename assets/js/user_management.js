// function to get file name of an input file
function input_file_name(user_id, input_id, image_id)
{
    input = document.getElementById(user_id + input_id);
    image_name = document.getElementById(user_id + image_id);

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
function reset_form(user_id, form_id, image_id)
{
    // reset all input 
    form = document.getElementById(user_id + form_id);
    form.reset();

    // reset span image_name
    if (image_id !== undefined)
    {
        image_name = document.getElementById(user_id + image_id);
        image_name.innerText = 'No file chosen';
    }
}

// function to click button by a label (for...) 
function click_button_label(user_id, suffixe, event) {
    button = document.getElementById(user_id + suffixe);

    if (event.key === 'Enter')
    {
        event.preventDefault();
        button.click();
    }
}