class NavMenu {
  constructor() {
    this.primaryNavMenuMobile()
    this.primaryNavMenuDesktop()
    this.menuProfile()
    // this.fixTopMenu()
  }

  primaryNavMenuMobile = () => {
    if (window.innerWidth < 1201) {
      const navtoggle = document.querySelectorAll('.navtoggle'),
        menu_item_has_children_link = document.querySelectorAll('.menu-item-has-children > a i')


      navtoggle.forEach(function (item, index) {
        item.addEventListener('click', function (e) {
          e.preventDefault()
          $(this).toggleClass('navtoggle--active')
          $('#primary-menu-container').stop(true, true).slideToggle(300)
        })
      })

      menu_item_has_children_link.forEach(function (item, index) {
        // $(".menu-item-has-children > a i").each(function(index, element){
        $(item).on('click', function (e) {
          e.preventDefault()
          $(item).parent().stop(true, true).toggleClass('active')
          $(item).parent().next('.sub-menu').stop(true, true).slideToggle(200)
        })
      })
    }
  }

  primaryNavMenuDesktop = () => {
    if (window.innerWidth > 1200) {
      const menu_item_has_children = document.querySelectorAll('.menu-item-has-children')

      menu_item_has_children.forEach(function (item, index) {
        $(item).hover(function () {
          $(item).find('> a').stop(true, true).addClass('active')
          $(item).find('> .sub-menu').stop(true, true).css("display", "grid")
        }, function () {
          $(item).find('> a').stop(true, true).removeClass('active')
          $(item).find('> .sub-menu').stop(true, true).css("display", "none")
        })
      })
    }
  }

  fixTopMenu = () => {
    const nav_menu = document.getElementById('masthead')

    window.addEventListener('scroll', function () {
      if (window.innerWidth > 1200) {
        if (document.documentElement.scrollTop > 110) {
          nav_menu.className = "fixed-top bg-secondary shadow scroll-active";
        } else {
          nav_menu.className = "fixed-top";
        }
      }
    })
  }

  menuProfile = () => {
    const btn_menu = document.querySelector('.header-menu-profile-button')

    if (btn_menu) {
      btn_menu.addEventListener('click', () => {
        const menu = btn_menu.nextElementSibling
        console.log(btn_menu.nextElementSibling)
        menu.classList.toggle('active')
      })
    }
  }
}

export default NavMenu
