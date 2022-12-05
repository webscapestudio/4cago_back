const openFilter = document.querySelectorAll('.dropdown__filter')
openFilter.forEach((item) => {
  item.addEventListener('click', function () {
    if (item.classList.contains('active')) {
      item.classList.remove('active')
    } else {
      item.classList.add('active')
    }
  })
})
