require( './bootstrap' );

import AppStartingComponent from "./components/AppStartingComponent.vue";
import {createApp} from "vue";

const app = createApp(AppStartingComponent);


app.mount('#app');
