const openDrop = document.querySelectorAll('.login__block')
const openItem = document.querySelector('.create')
const menu = document.querySelector('.profile__item')

openDrop.forEach((item) => {
  item.addEventListener('click', function () {
    if (item.classList.contains('open')) {
      if (openItem) {
        openItem.addEventListener('click', () => {
          if (menu.classList.contains('active')) {
            menu.classList.remove('active')
          } // else {
          // menu.classList.add('active')
          //}
          item.classList.remove('open')
        })
        item.classList.remove('open')
      }
    } else {
      // item.classList.add('open')
      if (openItem) {
        openItem.addEventListener('click', () => {
          if (menu.classList.contains('active')) {
            menu.classList.remove('active')
          } else {
            menu.classList.add('active')
          }
          // item.classList.add('open')
        })
        item.classList.add('open')
      }
      // item.classList.add('open')
    }
  })
})
