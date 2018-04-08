import authComponents from '../../../../Modules/Auth/Resources/assets/js'
import settingsComponents from '../../../../Modules/Settings/Resources/assets/js'
import FlashMessage from './Flash'

window.Vue.component('FlashMessage', FlashMessage);

authComponents.forEach(({name, component}) => {
    window.Vue.component(name, component)
})

settingsComponents.forEach(({name, component}) => {
    window.Vue.component(name, component)
})

