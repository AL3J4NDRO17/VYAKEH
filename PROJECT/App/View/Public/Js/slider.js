
//SLIDER
const slider = document.querySelector("#slider");
let sliderSections = document.querySelectorAll(".slider__section");
let sliderSectionLast = sliderSections[sliderSections.length - 1];

const btnLeft = document.querySelector("#btn-left");
const btnRight = document.querySelector("#btn-right");

slider.insertAdjacentElement('afterbegin', sliderSectionLast);

function next() {
  let sliderSectionFirst = document.querySelector(".slider__section:first-child");
  slider.style.marginLeft = "-200%";
  slider.style.transition = "all 0.5s";
  setTimeout(function() {
    slider.style.transition = "none";
    slider.insertAdjacentElement('beforeend', sliderSectionFirst);
    slider.style.marginLeft = "-100%";
  }, 500);
}

btnRight.addEventListener("click", next);

function prev() {
  let sliderSectionLast = document.querySelector(".slider__section:last-child");
  slider.style.marginLeft = "0";
  slider.style.transition = "all 0.5s";
  setTimeout(function() {
    slider.style.transition = "none";
    slider.insertAdjacentElement('afterbegin', sliderSectionLast);
    slider.style.marginLeft = "-100%";
  }, 500);
}

btnLeft.addEventListener("click", prev);

function autoSlide() {
  setInterval(next, 5000); // Cambiar de slide cada 5 segundos
}

autoSlide();



