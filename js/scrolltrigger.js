(() => {
  gsap.registerPlugin(ScrollTrigger);

  var startCount = 0,
    num = { var: startCount };

  gsap
    .timeline({
      scrollTrigger: {
        trigger: "#numbers",
        start: "top bottom",
        end: "+=3000",
        scrub: true,
        delay: 3,
      },
    })
    .to(num, { var: 4000, duration: 3, ease: "none", onUpdate: changeNumber })
    .to({}, { duration: 20 });

  function changeNumber() {
    numbers.innerHTML = num.var.toFixed();
  }

  gsap.fromTo(
    ".story-telling-card1",
    { opacity: 0, x: "100px" },
    {
      x: 0,
      // delay: 2,
      opacity: 1,
      duration: 2,
      scrollTrigger: {
        trigger: "#Ball_1",
        start: "top center",
        toggleActions: "play restart play restart",
      },
    }
  );
  gsap.fromTo(
    ".sad-teenager",
    { opacity: 0, x: "-100px" },
    {
      x: 0,
      delay: 1,
      opacity: 1,
      duration: 2,
      scrollTrigger: {
        trigger: ".story-telling-card1",
        start: "top center",
        toggleActions: "play restart play restart",
      },
    }
  );
  gsap.fromTo(
    ".story-telling-card2",
    { opacity: 0, x: "100px" },
    {
      x: 0,
      delay: 3,
      opacity: 1,
      duration: 2,
      scrollTrigger: {
        trigger: ".story-telling-card1",
        start: "top center",
        toggleActions: "play restart play restart",
      },
    }
  );
  gsap.fromTo(
    ".man-pic",
    { opacity: 0, x: "-100px" },
    {
      x: 0,
      delay: 4,
      opacity: 1,
      duration: 1,
      scrollTrigger: {
        trigger: ".story-telling-card1",
        start: "top center",
        toggleActions: "play restart play restart",
      },
    }
  );
  gsap.fromTo(
    ".woman-pic",
    { opacity: 0, x: "100px" },
    {
      x: 0,
      delay: 4,
      opacity: 1,
      duration: 1,
      scrollTrigger: {
        trigger: ".story-telling-card1",
        start: "top center",
        toggleActions: "play restart play restart",
      },
    }
  );
  gsap.fromTo(
    "#suicideChart",
    { opacity: 0, y: "100px" },
    {
      y: 0,
      delay: 4,
      opacity: 1,
      duration: 5,
      scrollTrigger: {
        trigger: ".woman-pic",
        start: "top center",
        toggleActions: "play play play play",
      },
    }
  );

  gsap.fromTo(
    "#ageGroupChart",
    { opacity: 0, x: "100px" },
    {
      x: 0,
      delay: 5,
      opacity: 1,
      duration: 5,
      scrollTrigger: {
        trigger: ".story-telling-card2",
        start: "top center",
        toggleActions: "play restart play none",
      },
    }
  );

  gsap.set("circle", {
    drawSVG: 0,
    rotation: -90,
    transformOrigin: "center center",
  });

  gsap
    .timeline({
      defaults: { duration: 1, ease: "sine.inOut" },
      repeat: 1,
      yoyo: true,
      repeatDelay: 2,
      once: true,
    })

    .to("#target1", { drawSVG: "0% 25%" })
    .to("#target2", { drawSVG: "25% 100%" }, 0);

  console.log("Numbers increasing working");

  gsap.registerPlugin(DrawSVGPlugin, ScrollTrigger);
  gsap.set(".cls-1", { visibility: "visible" });

  const timeline = gsap.timeline({
    scrollTrigger: {
      trigger: "#scrollElement",
      start: "0 100%",
      end: "+=300%",
      scrub: true,
      markers: false,
      once: true,
    },
  });

  timeline.fromTo(
    ".cls-1",
    { drawSVG: "0 0" },
    { drawSVG: "0 100%", duration: 5 }
  );
})();
