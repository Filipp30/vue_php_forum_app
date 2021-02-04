import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import '@/assets/style/main.scss';
import '@/assets/style/navi.scss';
import '@/assets/style/contact.scss';
import '@/assets/style/footer.scss';



createApp(App).use(router).mount('#app')



