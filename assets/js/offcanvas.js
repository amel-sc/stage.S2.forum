function toggleNav() {
  const sidenav = document.getElementById("mySidenav");
  const main = document.getElementById("main");
  const width = window.innerWidth;

  if (sidenav.style.width === "250px") {
    sidenav.style.width = "0";
    main.style.marginLeft = "0";
  } else {
    sidenav.style.width = "250px";
    if (width < 768) {
        main.style.marginLeft = "0";
    }
    else {
        main.style.marginLeft = "250px";
    }
  }
}