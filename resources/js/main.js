import burger from './modules/burger.js'
import openCloseItem from './modules/openCloseItem.js'
import meatballs from './modules/meatballs.js'
import dropdownFilter from './modules/dropdownFilter.js'
import notifications from './modules/notifications.js'
import loginDrop from './modules/loginDrop.js'
import MicroModal from 'micromodal'
import { tab } from './modules/tab.js'
import SlimSelect from 'slim-select'
import tags from './modules/tags'

try {
  new SlimSelect({
    select: '#slim-select',
    showContent: 'down',
  })

  new SlimSelect({
    select: '#slim-select-job',
    showContent: 'down',
  })
} catch (e) {
  console.log('error')
}

MicroModal.init({
  disableScroll: true, // [6]
})

tab(
  '.category__tabs_wrap',
  '.tabs-btn',
  '.category__tabs',
  '.category__tabs_content'
)
