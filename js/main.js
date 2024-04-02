import { gallery } from "./modules/gallery.js";
import { hambrMenu } from "./modules/hambr-menu.js";
import { plyrIni } from "./modules/plyr-ini.js";
import { scrollRevCalls } from "./modules/scrollrevcalls.js";
//import { scrollToTop } from "./modules/scrolltop.js";

//Functions called on all pages

hambrMenu(); //hamburger menu
scrollRevCalls(); //scrollreveal handling
//scrollToTop(); //scroll to top button

if(document.body.dataset.page === 'home') {
	plyrIni();
	gallery();
}

//VueJS Stuff

const app = Vue.createApp({
    data() {
        return {
            message: 'Hello Vue.js!'
        };
    },
    mounted() {
        console.log(this.message); // Log the message to the console
    }
});

// Mount Vue instance on elements with the class 'blog-latest'
app.mount('.blog-latest');
