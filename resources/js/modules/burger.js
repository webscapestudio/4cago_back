const burgerBtn = document.querySelector(".burger");
const menu = document.querySelector(".sidebar");

burgerBtn.addEventListener("click", (e) => {
    console.log(e.target);
    if (burgerBtn.classList.contains("active")) {
        burgerBtn.classList.remove("active");
        menu.classList.remove("active");
        document.body.classList.remove("overflow-hidden");
    } else {
        burgerBtn.classList.add("active");
        menu.classList.add("active");
        document.body.classList.add("overflow-hidden");
    }
    console.log(13123);
});
