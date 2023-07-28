//src/main.js
import Vue, { createApp } from "vue";
import App from "./App.vue";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "./assets/main.css";

// Import Bootstrap and BootstrapVue CSS files (order is important)
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue);

// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);
createApp(App).mount("#app");