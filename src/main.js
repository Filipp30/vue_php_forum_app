import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import '@/assets/style/app.scss';
import '@/assets/style/navi.scss';
import '@/assets/style/normalize.css';




createApp(App).use(router).mount('#app')



