<template>
    <div>
      <h1>{{ blog.title }}</h1>
      <p>{{ blog.content }}</p>
      <!-- Other blog details -->
    </div>
  </template>
  
  <script>
  export default {
    props: ['id'],
    data() {
      return {
        blog: {}
      };
    },
    created() {
      // Fetch blog details using the id from props
      this.fetchBlogDetails(this.id);
    },
    methods: {
      fetchBlogDetails(id) {
        // Make a fetch request to get the blog details
        fetch(`http://localhost/foundation-sixty6/foundation_sixty6/public/blogs/${id}`)
          .then(res => res.json())
          .then(data => {
            this.blog = data;
          })
          .catch(error => {
            console.error(error);
            // Handle error
          });
      }
    }
  };
  </script>
  