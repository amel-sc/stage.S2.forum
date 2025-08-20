// js for dropdown
let dropdown_button = document.getElementById("dropdown-show-button")

window.addEventListener('click', function(event) {
    if (event.target.id == "dropdown-show-button")
    {
        dropdown_active(1);
    }
    else
    {
        dropdown_active(0);
    }
});

function dropdown_active(statut) {
    let dropdown_classes = dropdown_button.classList;

    if (statut == 1) 
    {
        if (dropdown_classes.contains("show"))
        {
            dropdown_classes.add("active-dropdown-button");
        }
        else 
        {
            dropdown_classes.remove("active-dropdown-button");
        }
    }
    else 
    {
        dropdown_classes.remove("active-dropdown-button");
    }
}

// js for link in a link
function as_link(navigation) {
    window.location.href=navigation;
}

    

