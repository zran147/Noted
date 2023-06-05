const hamburger = document.querySelectorAll(".hamburger");
const sidebar = document.querySelector(".sidebar");
const whiteBar = document.querySelectorAll(".white-bar");
const additionalAmount = document.querySelectorAll("#additionalAmount");

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
    if (e.querySelector(".btn-info")) {
        e.addEventListener("click", () => {
            for (let i = 0; i < e.children.length; ++i) {
                e.children[i].classList.toggle("hidden");
            }
        })
    }
})

additionalAmount.forEach((e) => {
    e.addEventListener("click", () => {
        for (let i = 0; i < e.parentElement.parentElement.children.length; ++i) {
            e.parentElement.parentElement.children[i].classList.toggle("hidden");
        }
    })
})