const hamburger = document.querySelectorAll(".hamburger");
const sidebar = document.querySelector(".sidebar");
const whiteBar = document.querySelectorAll(".white-bar");

hamburger.forEach((e) => {
    e.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-active");
    })
})

whiteBar.forEach((e) => {
    if (e.querySelector(".btn-danger")) {
        e.addEventListener("mouseover", () => {
            e.children[0][2].classList.toggle("hidden");
        })
        e.addEventListener("mouseout", () => {
            e.children[0][2].classList.toggle("hidden");
        })
    }
})