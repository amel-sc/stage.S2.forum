
// roll function
function roll() {
    getElement("d").style = "width: 50px; height: 50px;"
}

getElement("roll").addEventListener("click", roll);

// function to get element by id 
function getElement(id_element) {
    var element = document.getElementById(id_element);

    return element;
}