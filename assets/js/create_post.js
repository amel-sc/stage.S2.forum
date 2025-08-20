// function to count letter number of textarea
function input_counter(id, result_id) {
    let textearea = document.getElementById(id);
    let result = document.getElementById(result_id);

    result.innerText = textearea.value.length + "/" + textearea.maxLength;
}