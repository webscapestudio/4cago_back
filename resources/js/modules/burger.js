const burgerBtn = document.querySelector('.burger')
const menu = document.querySelector('.sidebar')
burgerBtn.addEventListener('click', () => {
  burgerBtn.classList.toggle('active')
  menu.classList.toggle('active')
})
