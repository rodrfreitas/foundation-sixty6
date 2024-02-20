(() => {

    const sr = ScrollReveal ({
        origin: 'top',
        distance: '60px',
        duration: 2500,
        delay: 400,
    })

    sr.reveal(`#hero-img-large, #video-player, #contact-form`, {origin: 'right'})
    sr.reveal(`#hero-heading-large, #video-headline, #contact-card`, {origin: 'left'})

    sr.reveal(`.small_sphere, .services-card, .goals-details .proj-sshot`, {interval: 100})
    sr.reveal(`.goals-details, .event-card, .blog-post-preview`, {interval: 10})

})();