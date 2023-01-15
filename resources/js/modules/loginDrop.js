const menu = document.querySelector(".profile__menu");
if (menu) {
    const openDrop = document.querySelector(".login__block");
    openDrop.addEventListener("click", (e) => {
        const openItem = document.querySelector(".create");
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
}
