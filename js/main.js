import { gallery } from "./modules/gallery.js";
import { hambrMenu } from "./modules/hambr-menu.js";
import { plyrIni } from "./modules/plyr-ini.js";
import { scrollRevCalls } from "./modules/scrollrevcalls.js";

//Functions called on all pages

hambrMenu(); //hamburger menu
scrollRevCalls(); //scrollreveal handling
//scrollToTop(); //scroll to top button

if(document.body.dataset.page === 'home') {
	plyrIni();
	gallery();
}

//////////////////////////////////////// VueJS Stuff //////////////////////////////////////

////////////////////////////////// Blog Latest Posts //////////////////////////////////////
const blogLatest = Vue.createApp({
    created() {
        this.fetchLatestBlogPosts();
    },
    data() {
        return {
            message: 'Latest blog posts component online',
            blogData: [],
            thumbnail: "",
            title: "",
            publishedDate: "",
            authorName: "",
            error: null
        };
    },
    methods: {
        fetchLatestBlogPosts() {
            fetch('http://localhost/foundation-sixty6/foundation_sixty6/public/blogs')
            .then(res => res.json())
            .then(data => {
                console.log("Latest blog posts info:", data); // Debug
                this.blogData = data;
            })
            .catch(error => {
                console.error(error);
                this.error = "No blogs found - Error: " + error;
            });
        },
        showBlogPost(blogId) {
            window.location.href = 'blog-post.html?id=' + blogId;
        }
    },
    mounted() {
        console.log(this.message); // Log the message to the console
    }
});

////////////////////////////////// Events Latest //////////////////////////////////////
const eventsLatest = Vue.createApp({
    created() {
        this.fetchLatestBlogPosts();
    },
    data() {
        return {
            message: 'Latest events component online',
            eventsData: [],
            thumbnail: "",
            title: "",
            error: null
        };
    },
    methods: {
        fetchLatestBlogPosts() {
            fetch('http://localhost/foundation-sixty6/foundation_sixty6/public/events')
            .then(res => res.json())
            .then(data => {
                console.log("Latest evets info:", data); // Debug
                this.eventsData = data;
            })
            .catch(error => {
                console.error(error);
                this.error = "No events found - Error: " + error;
            });
        },
    },
    mounted() {
        console.log(this.message); // Log the message to the console
    }
});

// Mount Vue instances
blogLatest.mount('.blog-list');
eventsLatest.mount('#events');