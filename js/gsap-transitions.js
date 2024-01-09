(() => {

gsap.registerPlugin(ScrollTrigger);

gsap.from("#problem-img", {
    scrollTrigger: {
        trigger: "#problem-img",
        start: "top bottom", 
        end: "bottom 5%",
        scrub: true, // Smooth
    },
    opacity: 0, // Fade in 
    scale: 1.2,
    ease: "power2.out", // Easing
});

})();