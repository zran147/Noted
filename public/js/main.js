const hamburger = document.querySelectorAll(".hamburger");
const sidebar = document.querySelector(".sidebar");
const whiteBar = document.querySelectorAll(".white-bar");
const additionalAmount = document.querySelectorAll("#additionalAmount");
const list = document.querySelectorAll(".list");

hamburger.forEach((e) => {
    e.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-active");
    })
})

whiteBar.forEach((e) => {
    if (e.querySelector(".btn-danger")) {
        e.addEventListener("mouseover", () => {
            e.children[0][2].classList.remove("hidden");
        })
        e.addEventListener("mouseout", () => {
            e.children[0][2].classList.add("hidden");
        })
    }
    if (e.querySelector(".btn-info")) {
        e.addEventListener("click", () => {
            for (let i = 0; i < e.children.length; ++i) {
                e.children[i].classList.toggle("hidden");
            }
        })
    }
    if (e.querySelector(".btn-outline-primary")) {
        e.addEventListener("click", () => {
            for (let i = 0; i < list.length; ++i) {
                list.forEach((element) => {
                    element.classList.add("hidden");
                    element.previousElementSibling.classList.add("hidden");
                })
            }
            for (let i = 0; i < list.length; ++i) {
                if (list[i]["id"] === e["id"]) {
                    list[i].classList.remove("hidden");
                    list[i].previousElementSibling.classList.remove("hidden");
                }
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