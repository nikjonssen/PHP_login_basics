document.addEventListener("click", myFunction);

function myFunction(e) {
  //   e.preventDefault();
  let targetClass = e.target.lastChild.data;
  let links = document.querySelectorAll(".navlink");
  links.forEach((x) => {
    if (x.innerHTML == targetClass) {
      x.classList.add("active");
    } else {
      x.classList.remove("active");
    }
  });
}

// with defult + storage (invalid)
document.addEventListener("click", myFunction);

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
  let link = sessionStorage.getItem("active-link");
  if (link && link !== null && link !== "") {
    linkCheck(link);
  }
  console.log(window.location);
  console.log(document.title);
}

function myFunction(e) {
  let target = e.target.lastChild.data;
  if (target || target === null || target === "") {
    sessionStorage.setItem("active-link", target);
  }
}

initCheck();
