const openDrop = document.querySelector(".login__block");
const openItem = document.querySelector(".create");
const menu = document.querySelector(".profile__menu");

openDrop.addEventListener("click", (e) => {
    const target = e.target.classList;
    if (openDrop.classList.contains("open")) {
        openDrop.classList.remove("open");
        menu.classList.remove("active");
    } else {
        openDrop.classList.add("open");
        menu.classList.add("active");
    }

    openItem.addEventListener("click", () => {
        openItem.classList.toggle("active");
    });
});
