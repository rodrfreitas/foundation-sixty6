(() => {

    const sr = ScrollReveal ({
        origin: 'top',
        distance: '60px',
        duration: 2500,
        delay: 400,
    })

    sr.reveal(`#hero-img-large, #demo-reel, #contact-form`, {origin: 'right'})
    sr.reveal(`#hero-heading-large, #demo-reel-card, #contact-card`, {origin: 'left'})

    sr.reveal(`.small_sphere, .services-card, .skill-tag, .proj-sshot`, {interval: 100})
    sr.reveal(`.skill-tag, .project-card`, {interval: 10})

})();