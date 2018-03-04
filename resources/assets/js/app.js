
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
// window.VueResource = require('vue-resource');
// Vue.use(VueResource);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('my-vuetable', require('./components/MyVuetable.vue'));
// Vue.component('vuetable-pagination', require('vuetable-2/src/components/VuetablePagination.vue'));
// Vue.component('vuetable-pagination-dropdown', require('vuetable-2/src/components/VuetablePaginationDropdown.vue'));
// Vue.component('vuetable', require('vuetable-2/src/components/Vuetable.vue'));
// Vue.component('vuetable-pagination-info', require('vuetable-2/src/components/VuetablePaginationInfo.vue'));

import Vue from 'vue'
import Vuetable from 'vuetable-2/src/components/Vuetable.vue'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination.vue'
import VuetablePaginationDropdown from 'vuetable-2/src/components/VuetablePaginationDropdown.vue'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo.vue'
import axios from 'axios'
import VuetablePaginationMixin from 'vuetable-2/src/components/VuetablePaginationMixin.vue'
// import Promise from 'promise-polyfill' 

if (!window.Promise) {
	window.Promise = Promise
}

function install(Vue){
  Vue.component("vuetable", Vuetable);
  Vue.component("vuetable-pagination", VuetablePagination);
  Vue.component("vuetable-pagination-dropdown", VuetablePaginationDropDown);
  Vue.component("vuetable-pagination-info", VuetablePaginationInfo);
}
export {
  Vuetable,
  VuetablePagination,
  VuetablePaginationDropDown,
  VuetablePaginationInfo,
  VuetablePaginationMixin,
  VuetablePaginationInfoMixin,
  install
};

export default Vuetable;
