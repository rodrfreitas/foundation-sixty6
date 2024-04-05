export function scrollRevCalls() {

    const sr = ScrollReveal ({
        origin: 'top',
        distance: '60px',
        duration: 2500,
        delay: 200,
    })

    sr.reveal(`#hero-img-large, #video-player, #contact-form, #about-hero-logo`, {origin: 'right'})
    sr.reveal(`#hero-heading-large, #video-headline, #contact-card, #hero-content, #about-hero-content`, {origin: 'left'})

    sr.reveal(`.small_sphere, .services-card, .goals-details .proj-sshot`, {interval: 100})
    sr.reveal(`.goals-details, .event-card, .event-card-mini, .blog-post-preview, .blog-post-preview-list, .founders-card`, {interval: 10})

}