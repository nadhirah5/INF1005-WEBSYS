/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */


$(document).ready(function() {
    
    let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('header .flex .navbar');

menu.onclick = () =>{
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

let section = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header .navbar a');

window.onscroll = () =>{

  menu.classList.remove('fa-times');
  navbar.classList.remove('active');

  section.forEach(sec =>{

    let top = window.scrollY;
    let height = sec.offsetHeight;
    let offset = sec.offsetTop - 150;
    let id = sec.getAttribute('id');

    if(top >= offset && top < offset + height){
      navLinks.forEach(links =>{
        links.classList.remove('active');
        document.querySelector('header .navbar a[href*='+id+']').classList.add('active');
      });
    };

  });

}

document.querySelector('#search-icon').onclick = () =>{
  document.querySelector('#search-form').classList.toggle('active');
}

document.querySelector('#close').onclick = () =>{
  document.querySelector('#search-form').classList.remove('active');
}

var swiper = new Swiper(".home-slider", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop:true,
});

var swiper = new Swiper(".review-slider", {
  spaceBetween: 20,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop:true,
  breakpoints: {
    0: {
        slidesPerView: 1,
    },
    640: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

function loader(){
  document.querySelector('.loader-container').classList.add('fade-out');
}

function fadeOut(){
  setInterval(loader, 3000);
}

window.onload = fadeOut;
  
});

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Ally's ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

$(document).ready(function () {
    console.log("document loaded");
    // Event setup using a convenience method
    $(".img-thumbnail").click(myfunction);
});



function myfunction(pop) {

    //create nodelist to check if the class exists
    // if class exists, remove the previewimg
    if (document.getElementsByClassName('img-popup').length <= 0)
    {
        //creates image element as variable previewimg
        previewimg = document.createElement("img");

        //set the src to the same as target
        previewimg.src = pop.target.src;

        //replace the "small" in the src with "large"
        previewimg.src = previewimg.src.replace("small", "large");

        //add into the html class="img-popup" for our created img
        //CSS will latch onto the class and apply effects
        previewimg.setAttribute("class", "img-popup");

        //insert our new element after the clicked image.
        pop.target.insertAdjacentElement("afterend", previewimg);
    }

    // if class already exist, remove the previewimg variable
    else {
        previewimg.remove();
    }
}
;

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Form popup start ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* This part of the code is after you click on button, the customize FOOD form popup will show */

function openFormFood() {
    document.getElementById("myFormFood").style.display = "block";
}

function closeFormFood() {
    document.getElementById("myFormFood").style.display = "none";
}

/* This part of the code is after you click on button, the customize DRINKS form popup will show */
function openForm() {
    document.getElementById("myFormDrink").style.display = "block";
}

function closeForm() {
    document.getElementById("myFormDrink").style.display = "none";
}



/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Form popup end ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */


/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Plus Minus Button ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

// Get the elements
const quantityInput = document.querySelector(".quantity-input");
const plusButton = document.querySelector(".quantity-plus");
const minusButton = document.querySelector(".quantity-minus");

// Add event listeners
plusButton.addEventListener("click", () => {
    quantityInput.value = parseInt(quantityInput.value) + 1;
});

minusButton.addEventListener("click", () => {
    if (quantityInput.value > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
});
