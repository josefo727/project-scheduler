require('./bootstrap');

window.Vue = require('vue');

// bootstrap-vueapp.js
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
/* Import Axios y Vue-Axios*/
import axios from 'axios'
import VueAxios from 'vue-axios'

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
/* Use Axios y Vue-Axios*/
Vue.use(VueAxios, axios)

Vue.component('index-component', require('./components/Scheduler/IndexComponent.vue').default);
Vue.component('scheduler-component', require('./components/Scheduler/SchedulerComponent.vue').default);
Vue.component('day-component', require('./components/Scheduler/DayComponent.vue').default);
Vue.component('week-component', require('./components/Scheduler/WeekComponent.vue').default);
Vue.component('month-component', require('./components/Scheduler/MonthComponent.vue').default);

const app = new Vue({
    el: '#app',
});
