window.onscroll = function () {
    myFunction();
};

let navbar = document.getElementById("navbar");
let topNumber = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= topNumber) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
}

// COMMENT
