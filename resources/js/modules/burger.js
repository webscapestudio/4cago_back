const burgerBtn = document.querySelector(".burger");
const menu = document.querySelector(".sidebar");

window.addEventListener("click", (e) => {
    const target = e.target.classList;
    if (target.contains("burger") || target.contains("sidebar")) {
        burgerBtn.classList.add("active");
        menu.classList.add("active");
        document.body.classList.add("overflow-hidden");
    } else {
        burgerBtn.classList.remove("active");
        menu.classList.remove("active");
        document.body.classList.remove("overflow-hidden");
    }
});
