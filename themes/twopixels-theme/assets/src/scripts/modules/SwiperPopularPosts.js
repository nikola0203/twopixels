// import 'swiper/css/bundle'
// swiper core styles
import "swiper/css"
// modules styles
import "swiper/css/pagination"
import "swiper/css/navigation"

import Swiper from "swiper"
import { Pagination, Navigation } from "swiper/modules"

class SwiperPopularPosts {
  constructor() {
    this.popularPosts()
  }

  popularPosts = () => {
    const slides = document.querySelectorAll(".popular-services")

    slides.forEach((slider, index) => {
      slider.classList.add("popular-services-" + index)
      slider
        .parentElement.parentElement.getElementsByClassName("swiper-pagination")[0]
        .classList.add("swiper-pagination-" + index)
      slider.parentElement
        .getElementsByClassName("swiper-button-next-popular-services")[0]
        .classList.add("swiper-button-next-popular-services-" + index)
      slider.parentElement
        .getElementsByClassName("swiper-button-prev-popular-services")[0]
        .classList.add("swiper-button-prev-popular-services-" + index)

      // console.log(slider.getElementsByClassName('swiper-pagination')[0])

      new Swiper(".popular-services-" + index, {
        modules: [Pagination, Navigation],
        // autoHeight: true,
        // slidesPerView: "auto",
        slidesPerView: 1,
        // freeMode: true,
        // centeredSlides: true,
        // loop: true,
        spaceBetween: 24,
        pagination: {
          el: ".swiper-pagination-" + index,
          clickable: true
        },
        navigation: {
          nextEl: ".swiper-button-next-popular-services-" + index,
          prevEl: ".swiper-button-prev-popular-services-" + index
        },
        // Responsive breakpoints
        breakpoints: {
          992: {
            slidesPerView: 4
          },
          // 1400: {
          //   slidesPerView: 3,
          //   spaceBetween: 150
          // },
        }
      })
    })
  }
}

export default SwiperPopularPosts