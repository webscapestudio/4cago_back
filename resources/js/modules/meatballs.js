const openMeat = document.querySelectorAll(".post__drop");
openMeat.forEach((item) => {
    const menuBtn = item.querySelector(".meatballs");
    const menu = item.querySelector(".dropdown");

    item.addEventListener("click", function () {
        if (
            menuBtn.classList.contains("active") &&
            menu.classList.contains("active")
        ) {
            menuBtn.classList.remove("active");
            menu.classList.remove("active");
        } else {
            menuBtn.classList.add("active");
            menu.classList.add("active");
        }
    });
});
