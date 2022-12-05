export const tab = (
  container = '.tabs',
  tab__btn = '.tab__btn',
  tab__content = '.tab',
  tab__content__wrap = '.tabs__content'
) => {
  if (container) {
    const tabContainer = document.querySelectorAll(container)

    tabContainer.forEach((tabItem) => {
      const tabBtn = document.querySelectorAll(tab__btn)
      const tabContentWrap = tabItem.querySelector(tab__content__wrap)
      const tabContent = tabContentWrap.querySelectorAll(tab__content)

      tabBtn.forEach((btn, idx) => {
        btn.addEventListener('click', () => {
          hideTabsBtns()
          hideTabs(idx)

          if (btn.classList.contains('active')) {
            btn.classList.remove('active')
          } else {
            btn.classList.add('active')
          }
        })
      })

      function hideTabs(idx) {
        tabContent.forEach((item, i) => {
          if (i === idx) {
            item.classList.add('active')
          } else {
            item.classList.remove('active')
          }
        })
      }

      function hideTabsBtns() {
        tabBtn.forEach((item) => {
          item.classList.remove('active')
        })
      }
    })
  }
}
