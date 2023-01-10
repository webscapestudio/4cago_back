const openNotif = document.querySelector(".notifications__block");

if (openNotif) {
    document.addEventListener("click", (e) => {
        if (!openNotif.contains(e.target)) {
            openNotif.classList.remove("open");
        } else {
            openNotif.classList.add("open");
        }
    });
}
