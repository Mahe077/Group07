var swiper1 = new Swiper(".brand-slider", {
  spaceBetween: 20,
  loop:true,
  autoplay: {
      delay: 2500,
      disableOnInteraction: false,
  },
  breakpoints: {
      300: {
        slidesPerView: 2,
      },
      600: {
        slidesPerView: 3,
      },
      800: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 5,
      },
    },
});

const swiper2 = new Swiper('.swiper', {
  loop: true,
  autoplay: {
      delay: 4000,
      disableOnInteraction: false,
  },
 
  // spaceBetween: 30,
  // If we need pagination
  pagination: {
      el: '.swiper-pagination',
      dynamicBullets: true,
  },

  // Navigation arrows
  navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  // scrollbar: {
  //   el: '.swiper-scrollbar',
  // },
});

const swiper3 = new Swiper(".review-slider", {
spaceBetween: 20,
  loop:true,
  autoplay: {
      delay: 2500,
      disableOnInteraction: false,
  },
  breakpoints: {
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
  },
});