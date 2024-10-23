class NavMenu {
  constructor() {
    this.primaryNavMenuMobile()
    this.primaryNavMenuDesktop()
    this.subMenuArrows()

    // this.fixTopMenu()
  }

  slideUp = (target, duration = 300) => {
    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.boxSizing = 'border-box';
    target.style.height = target.offsetHeight + 'px';
    target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    window.setTimeout(() => {
      target.style.display = 'none';
      target.style.removeProperty('height');
      target.style.removeProperty('padding-top');
      target.style.removeProperty('padding-bottom');
      target.style.removeProperty('margin-top');
      target.style.removeProperty('margin-bottom');
      target.style.removeProperty('overflow');
      target.style.removeProperty('transition-duration');
      target.style.removeProperty('transition-property');
    }, duration);
  }

  slideDown = (target, duration = 300) => {
    target.style.removeProperty('display');
    let display = window.getComputedStyle(target).display;

    if (display === 'none')
      display = 'block';

    target.style.display = display;
    let height = target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.offsetHeight;
    target.style.boxSizing = 'border-box';
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = duration + 'ms';
    target.style.height = height + 'px';
    target.style.removeProperty('padding-top');
    target.style.removeProperty('padding-bottom');
    target.style.removeProperty('margin-top');
    target.style.removeProperty('margin-bottom');
    window.setTimeout(() => {
      target.style.removeProperty('height');
      target.style.removeProperty('overflow');
      target.style.removeProperty('transition-duration');
      target.style.removeProperty('transition-property');
    }, duration);
  }

  slideToggle = (target, duration = 300) => {
    const { slideDown, slideUp } = this

    if (window.getComputedStyle(target).display === 'none') {
      return slideDown(target, duration);
    } else {
      return slideUp(target, duration);
    }
  }

  primaryNavMenuMobile = () => {
    const { slideToggle } = this

    if (window.innerWidth < 1201) {
      const navtoggle = document.querySelectorAll('.navtoggle'),
        menu_item_has_children_link = document.querySelectorAll('.menu-item-has-children > a .icon-menu-arrow')

      navtoggle.forEach((item) => {
        let old_timestamp = null

        item.addEventListener('click', (e) => {
          e.preventDefault()

          // Prevent double click before animation ends
          if (old_timestamp == null || old_timestamp + (300 + 1) < e.timeStamp) {
            const menu_container = document.getElementById('primary-menu-container')
            item.classList.toggle('navtoggle--active')
            slideToggle(menu_container, 300)
            old_timestamp = e.timeStamp;
          }
        })
      })

      menu_item_has_children_link.forEach((item) => {
        let old_timestamp = null

        item.addEventListener('click', (e) => {
          e.preventDefault()

          // Prevent double click before animation ends
          if (old_timestamp == null || old_timestamp + (300 + 1) < e.timeStamp) {
            item.parentElement.classList.toggle('active')
            slideToggle(item.parentElement.nextElementSibling, 300)
            old_timestamp = e.timeStamp;
          }
        })
      })
    }
  }

  primaryNavMenuDesktop = () => {
    if (window.innerWidth > 1200) {
      const menu_item_has_children = document.querySelectorAll('.menu-item-has-children')

      menu_item_has_children.forEach((item, index) => {
        let link = item.querySelector('a'),
          sub_menu = item.querySelector('.sub-menu')

        item.addEventListener('mouseenter', () => {
          link.classList.add('active')
          // sub_menu.style.display = 'grid'
        })
        item.addEventListener('mouseleave', () => {
          link.classList.remove('active')
          // sub_menu.style.display = 'none'
        })
      })
    }
  }

  subMenuArrows = () => {
    const icon_sub_menu_arrow = document.querySelectorAll('.icon-sub-menu-arrow')

    icon_sub_menu_arrow.forEach((item, index) => {
      item.addEventListener('click', (e) => {
        console.log(item.parentElement.nextElementSibling)
        console.log(item.parentElement)
        e.preventDefault()
        item.classList.toggle('active')

        this.slideToggle(item.parentElement.nextElementSibling, 400)
      })
    })
  }

  fixTopMenu = () => {
    const nav_menu = document.getElementById('masthead')
    let class_names_to_add = "fixed-top bg-primary py-xl-1 shadow scroll-active"

    if (document.body.classList.contains('page-template-template-landing')) {
      class_names_to_add = "fixed-top bg-gray-100 py-xl-1 shadow scroll-active"
    }

    window.addEventListener('scroll', () => {
      if (window.innerWidth > 1200) {
        if (document.documentElement.scrollTop > 40) {
          nav_menu.className = class_names_to_add
        } else {
          nav_menu.className = ""
        }
      }
    })
  }
}

export default NavMenu
