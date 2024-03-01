export function scrollToTop() {
    console.log("Scroll to top script running")

    const scrollTop = () => {
        const scrollTop = document.getElementById('scroll-top')
        //show the scroll to top button

        // if (window.scrollY >= 350) {
        //     scrollTop.classList.add('show-btn');
        // } else {
        //     scrollTop.classList.remove('show-btn');
        // }

        //Refactored if else above using a ternary statement
        window.scrollY >= 350 ? scrollTop.classList.add('show-btn') : scrollTop.classList.remove('show-btn')
    }
    window.addEventListener('scroll', scrollTop)
}