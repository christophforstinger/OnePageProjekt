function jsLoaded() {
    const htmlTag = document.querySelector("html");
    htmlTag.classList.remove("no-js");
    htmlTag.classList.add("js")
}

function showToTop() {
    const toTopButton = document.getElementById("to-top");
    if (window.scrollY > 200) {
        toTopButton.classList.add("show")
    } else {
        toTopButton.classList.remove("show")
    }
}

document.getElementById("to-top").addEventListener("click", function () {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0
});

function elementAddAnimate() {
    let elements = document.querySelectorAll("h1, h2, p, .project, .post");
    for (let i = 0; i < elements.length; i++) {
        elements[i].classList.add("animate")
    }
}

function elementInViewport() {
    let elements = document.querySelectorAll(".animate");
    let elementClass = "animated";
    let windowHeight = window.innerHeight || document.documentElement.clientHeight;
    let windowTopPosition = window.scrollY;
    let windowBottomPosition = windowHeight + windowTopPosition;
    for (let i = 0; i < elements.length; i++) {
        let elementTopPosition = elements[i].getBoundingClientRect().top + windowTopPosition;
        let elementBottomPosition = elements[i].getBoundingClientRect().bottom + windowTopPosition;
        if (windowBottomPosition > elementTopPosition && windowTopPosition < elementBottomPosition) {
            elements[i].classList.add(elementClass)
        } else {
        }
    }
}

document.addEventListener("DOMContentLoaded", function () {
    jsLoaded();
    elementAddAnimate();
    elementInViewport()
}, false);
document.addEventListener("scroll", function () {
    showToTop();
    elementInViewport()
});
window.addEventListener("resize", function () {
    elementInViewport()
});