function input_file_name(input_id, image_name) {
    input = document.getElementById(input_id);
    image_name = document.getElementById(image_name);

    if (input.files.length > 0) 
    {
        image_name.innerText = input.files[0].name    
    }
    else 
    {
        image_name.innerText = 'No file chosen';
    }
}