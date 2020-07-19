
import PerfectScrollbar from 'vue2-perfect-scrollbar'

require('./bootstrap');

window.Vue = require('vue');
Vue.use(PerfectScrollbar)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
  el: '#app',
  data: {
    loading: true,
    toggle: false,
    mobile: false,
    windowWidth: window.innerWidth,
  },
  methods: {
    close(e) {
      if (e.target.id == 'app-overlay' && this.toggle) {
        this.toggle = false
      }
    },
  },
  watch: {
    windowWidth() {
      this.mobile = this.windowWidth < 1260
    }
  },
  mounted() {
    window.addEventListener('click', this.close)
    window.addEventListener('touchstart', this.close)

    window.onresize = () => {
      this.windowWidth = window.innerWidth
    }

    if (window.innerWidth < 1260) {
      this.mobile = true
      this.toggle = false
    }
  }
});
