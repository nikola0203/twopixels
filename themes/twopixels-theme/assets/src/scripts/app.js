/**
 * Manage global libraries from the package.json file
 */

/**
 * Import libraries
 */
// Lazy load library
// import 'lazysizes';
import "lazysizes/plugins/parent-fit/ls.parent-fit";
import "lazysizes/plugins/bgset/ls.bgset";
import "lazysizes/plugins/respimg/ls.respimg";
// import 'lazysizes/plugins/unveilhooks/ls.unveilhooks';

// Import custom modules
import App from './modules/app.js';
import NavMenu from './modules/nav-menu';
// import Slider from './modules/slider.js';

const app = new App();
// const slider = new Slider();
new NavMenu();

import SwiperSubCategories from './modules/SwiperSubCategories'

new SwiperSubCategories()

import SwiperRecentPosts from './modules/SwiperRecentPosts'

new SwiperRecentPosts()

function getQueryParam(param) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(param);
}

const comment_replay_links = document.querySelectorAll('.comment-reply-link')
console.log(comment_replay_links)

function addOrUpdateQueryParam(urlString, param, value) {
  const url = new URL(urlString);
  url.searchParams.set(param, value); // Dodaje ili ažurira parametar
  return url.toString();
}

// if (comment_replay_links.length > 0) {
//   for (let index = 0; index < comment_replay_links.length; index++) {
//     const comment_replay_link = comment_replay_links[index];

//     comment_replay_link.addEventListener('click', (e) => {
//       e.preventDefault();

//       // 1. uzmes url iz buttona
//       // console.log(comment_replay_link.href)
//       // 2. dodas query parametar u trenutni url na stranici
//       // Query parametar "?replytocom=16#respond"
//       // http://twopixels.local/uspon-na-vrh-ples-iz-sela-ostrovice-svrljiske-planine/?replytocom=16#respond

//       // http://twopixels.local/uspon-na-vrh-ples-iz-sela-ostrovice-svrljiske-planine/?replytocom=16#respond

//       const get_current_url = comment_replay_link.href
//       const urlObjekat = new URL(get_current_url);
//       const urlParams = new URLSearchParams(urlObjekat.search);
//       // const replay_query_param = getQueryParam('replytocom');


//       // addOrUpdateQueryParam(get_current_url, 'replytocom', urlParams.get('replytocom') + '#respond');

//       const url = new URL(window.location);
//       url.searchParams.set('replytocom', urlParams.get('replytocom') + '#respond');
//       window.history.replaceState({}, '', url); // Ažurira URL bez reloadovanja stranice

//       const element_to_scroll = document.getElementById("respond")
//       const elementPosition = element_to_scroll.getBoundingClientRect().top + window.scrollY;
//       window.scrollTo({
//         top: elementPosition - 50,
//         behavior: 'smooth'
//       });
//     })
//   }
// }
