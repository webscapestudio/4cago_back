const openDrop = document.querySelector(".login__block");
const openItem = document.querySelector(".create");
const menu = document.querySelector(".profile__item");

openDrop.addEventListener("click", (e) => {
    console.log(e.target.value);
    if (openDrop.classList.contains("open")) {
        openDrop.classList.remove("open");
    } else {
        openDrop.classList.add("open");
    }
});
