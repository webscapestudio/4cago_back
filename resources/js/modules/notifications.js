const openNotif = document.querySelector('.notifications__block')
document.addEventListener('click', (e) => {
  if (!openNotif.contains(e.target)) {
    openNotif.classList.remove('open')
  } else {
    openNotif.classList.add('open')
  }
})

// const openNotif = document.querySelectorAll('.notifications__block')
// openNotif.forEach((item) => {
//   item.addEventListener('click', function () {
//     if (item.classList.contains('open')) {
//       item.classList.remove('open')
//     } else {
//       item.classList.add('open')
//     }
//   })
// })
