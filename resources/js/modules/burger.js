const burgerBtn = document.querySelector(".burger");
const menu = document.querySelector(".sidebar");

burgerBtn.addEventListener("click", (e) => {
    const target = e.target.classList;
    if (target.contains("burger") && target.contains("active")) {
        burgerBtn.classList.remove("active");
        menu.classList.remove("active");
        document.querySelector("html").style.overflow = "";
    } else {
        burgerBtn.classList.add("active");
        menu.classList.add("active");
        document.querySelector("html").style.overflow = "hidden";
    }
});
