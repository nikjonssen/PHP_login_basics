function linkCheck(prop) {
  let links = document.querySelectorAll(".navlink");
  links.forEach((x) => {
    if (x.getAttribute("href") == prop) {
      x.classList.add("active");
    } else {
      x.classList.remove("active");
    }
  });
}

function initCheck() {
  let title = window.location.pathname.split("/")[2];
  linkCheck(title);
}

initCheck();