// import 'swiper/css/bundle'
// swiper core styles
import "swiper/css"
// modules styles
import "swiper/css/pagination"
import "swiper/css/navigation"

import Swiper from "swiper"
import { Pagination, Navigation } from "swiper/modules"

class SwiperRecentPosts {
  constructor() {
    this.popularPosts()
  }

  popularPosts = () => {
    const slides = document.querySelectorAll(".recent-posts")

    slides.forEach((slider, index) => {
      slider.classList.add("recent-posts-" + index)
      slider
        .parentElement.parentElement.getElementsByClassName("swiper-pagination")[0]
        .classList.add("swiper-pagination-" + index)
      slider.parentElement
        .getElementsByClassName("swiper-button-next-recent-posts")[0]
        .classList.add("swiper-button-next-recent-posts-" + index)
      slider.parentElement
        .getElementsByClassName("swiper-button-prev-recent-posts")[0]
        .classList.add("swiper-button-prev-recent-posts-" + index)

      // console.log(slider.getElementsByClassName('swiper-pagination')[0])

      new Swiper(".recent-posts-" + index, {
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
          nextEl: ".swiper-button-next-recent-posts-" + index,
          prevEl: ".swiper-button-prev-recent-posts-" + index
        },
        // Responsive breakpoints
        breakpoints: {
          992: {
            slidesPerView: 2
          },
          1400: {
            slidesPerView: 3,
            //   spaceBetween: 150
          },
        },
      })
    })
  }
}

export default SwiperRecentPosts