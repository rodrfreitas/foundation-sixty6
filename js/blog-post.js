const app = Vue.createApp({
    data() {
        return {
            blog: {}
        };
    },
    created() {
        // Extract the id parameter from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const blogId = urlParams.get('id');
        console.log(blogId);

        if (blogId) {
            // Fetch blog content based on the id
            fetch(`http://localhost/foundation-sixty6/foundation_sixty6/public/blogs/${blogId}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Blog post info:", data); // Debug
                    this.blog = data;
                })
                .catch(error => {
                    console.error(error);
                    // Handle error
                });
        } else {
            // Handle missing id parameter
            console.error('Blog id not found in URL');
        }
    }
});

app.mount('#blog-post-content');
