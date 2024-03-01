export function gallery() {

const slider = document.querySelector('.gallery-slider');
const btnPrev = document.querySelector('#btn-prev');
const btnNext = document.querySelector('#btn-next');
let slideWidth = slider.clientWidth;
let currentSlide = 0;

function showSlide(index) {
    const newTransformValue = -index * slideWidth + 'px';
    //console.log(newTransformValue);
    slider.style.transform = `translateX(${newTransformValue})`;
}

function nextSlide() {
    currentSlide++;
    if(currentSlide >= slider.children.length) {
        currentSlide = 0;
    }
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide--;
    if(currentSlide < 0) {
        currentSlide = slider.children.length-1;
    }
    showSlide(currentSlide);
}

//resets the slide width variable if the user changes the scale of the window
function updateSlideWidth() {
    slideWidth = slider.clientWidth;
    showSlide(currentSlide);
}

btnPrev.addEventListener('click', prevSlide);
btnNext.addEventListener('click', nextSlide);

window.addEventListener('resize', updateSlideWidth);

updateSlideWidth();

}