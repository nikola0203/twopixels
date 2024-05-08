// import 'swiper/css/bundle'
// swiper core styles
import "swiper/css"
// modules styles
import "swiper/css/pagination"
import "swiper/css/navigation"

import Swiper from "swiper"
import { Pagination, Navigation } from "swiper/modules"

class SwiperSubCategories {
  constructor() {
    this.popularPosts()
  }

  popularPosts = () => {
    const slides = document.querySelectorAll(".sub-categories")

    slides.forEach((slider, index) => {
      slider.classList.add("sub-categories-" + index)
      slider
        .parentElement.parentElement.getElementsByClassName("swiper-pagination")[0]
        .classList.add("swiper-pagination-" + index)
      slider.parentElement
        .getElementsByClassName("swiper-button-next-sub-categories")[0]
        .classList.add("swiper-button-next-sub-categories-" + index)
      slider.parentElement
        .getElementsByClassName("swiper-button-prev-sub-categories")[0]
        .classList.add("swiper-button-prev-sub-categories-" + index)

      // console.log(slider.getElementsByClassName('swiper-pagination')[0])

      new Swiper(".sub-categories-" + index, {
        modules: [Pagination, Navigation],
        // autoHeight: true,
        // slidesPerView: "auto",
        slidesPerView: 1,
        // freeMode: true,
        // centeredSlides: true,
        // height: 600,
        // loop: true,
        speed: 400,
        spaceBetween: 24,
        pagination: {
          el: ".swiper-pagination-" + index,
          clickable: true
        },
        navigation: {
          nextEl: ".swiper-button-next-sub-categories-" + index,
          prevEl: ".swiper-button-prev-sub-categories-" + index
        },
        // Responsive breakpoints
        breakpoints: {
          992: {
            slidesPerView: 4
          },
          1200: {
            slidesPerView: 6,
            //   spaceBetween: 150
          },
        },
      })
    })
  }
}

export default SwiperSubCategories