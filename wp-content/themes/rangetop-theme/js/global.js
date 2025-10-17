// Frequently Asked Questions (FAQs)_js
const accordionCards = document.querySelectorAll(".accordion_card");
accordionCards.forEach((card) => {
  card.addEventListener("click", () => {
    //  Check if the clicked card is already active
    if (card.classList.contains("active")) {
      // If it is, remove the 'active' class
      card.classList.remove("active");
    } else {
      // Otherwise, remove 'active' class from all cards
      accordionCards.forEach((otherCard) => {
        otherCard.classList.remove("active");
      });

      // Add 'active' class to the clicked card
      card.classList.add("active");
    }
  });
});


// menu_off_canvas_js
const menu_off_canvas = document.querySelector(".menu_off_canvas");
const close_btn = document.querySelectorAll(".close_btn");
const hamburger_btn = document.querySelectorAll(".hamburger_btn");
const overlay = document.querySelector(".overlay");


//menu_off_canvas_js
hamburger_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    menu_off_canvas.classList.add("open");
    overlay_add()
  });
});

close_btn.forEach((cls_btn) => {
  cls_btn.addEventListener("click", () => {
    menu_off_canvas.classList.remove("open");
    overlay_remove();
  });
});

// functions_overlay
function overlay_add() {
  overlay.classList.add("open_overlay");
  overlay.addEventListener("click", overlay_remove);
  // document.body.style.overflow = "hidden";
}

function overlay_remove() {
  overlay.classList.remove("open_overlay");
  overlay.removeEventListener("click", overlay_remove);
  // document.body.style.overflow = "";
}
overlay.addEventListener("click", () => {
  menu_off_canvas.classList.remove("open");
  overlay_remove();
});





jQuery(document).ready(function($) {
  // Open menu
  $('.hamburger_btn').click(function() {
      $('.menu_off_canvas').addClass('active');
  });

  // Close menu
  $('.close_btn').click(function() {
      $('.menu_off_canvas').removeClass('active');
  });
});









