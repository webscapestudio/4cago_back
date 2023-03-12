const burgerBtn = document.querySelector(".burger");
const menu = document.querySelector(".sidebar");
const html = document.querySelector("html");
burgerBtn.addEventListener("click", (e) => {
    const target = e.target.classList;
    if (target.contains("burger") && target.contains("active")) {
        console.log(1);
        burgerBtn.classList.remove("active");
        menu.classList.remove("active");
        document.documentElement.style.overflow = "";
    } else {
        console.log(html);

        burgerBtn.classList.add("active");
        menu.classList.add("active");
        document.documentElement.style.overflow = "hidden";
    }
});
