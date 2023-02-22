function linkCheck(prop) {
  let links = document.querySelectorAll(".navlink");
  links.forEach((x) => {
    if (x.innerHTML == prop) {
      x.classList.add("active");
    } else {
      x.classList.remove("active");
    }
  });
}

function initCheck() {
  let title = document.title;
  linkCheck(title);
}

initCheck();
