const app = Vue.createApp({
    data() {
        return {
            event: {}
        };
    },
    created() {
        // Extract the id parameter from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const eventId = urlParams.get('id');
        console.log(eventId);

        if (eventId) {
            // Fetch Event content based on the id
            fetch(`http://localhost/foundation-sixty6/foundation_sixty6/public/events/${eventId}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Event info:", data); // Debug
                    this.event = data;
                })
                .catch(error => {
                    console.error(error);
                    // Handle error
                });
        } else {
            // Handle missing id parameter
            console.error('Event id not found in URL');
        }
    }
});

app.mount('.event-info');
