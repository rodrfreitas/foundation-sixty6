import { gallery } from "./modules/gallery.js";
import { hambrMenu } from "./modules/hambr-menu.js";
import { plyrIni } from "./modules/plyr-ini.js";
import { scrollRevCalls } from "./modules/scrollrevcalls.js";
import { scrollToTop } from "./modules/scrolltop.js";

//Functions called on all pages

hambrMenu(); //hamburger menu
scrollRevCalls(); //scrollreveal handling
scrollToTop(); //scroll to top button

if(document.body.dataset.page === 'home') {
	plyrIni();
	gallery();
} 