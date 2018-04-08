import store from './store'

require('./bootstrap');
require('./components')

new Vue({
    el: '#app',
    store,
});

require('../coreui/js/app')