// value for comment page
const show_comment = document.getElementById('show-comment');
const hide_comment = document.getElementById('hide-comment');
const comment_input = document.getElementById("comment-input");

// add listener 
show_comment.addEventListener('click', show_comment_function);
hide_comment.addEventListener('click', hide_comment_function);

// functions
function show_comment_function() {
    // hide the show_comment and show the comment input
    show_comment.classList.add("d-none");
    comment_input.classList.remove("d-none");

    // focus on textearea
    let textarea = document.getElementById('autoResize');
    textarea.focus();
}


function hide_comment_function() {
    // show the show_comment and hide the comment input
    show_comment.classList.remove("d-none");
    comment_input.classList.add("d-none");
}
