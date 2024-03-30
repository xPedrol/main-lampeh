/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
var init_interval = function init_interval() {
  return setInterval(function () {
    i++;
    i_cycle();
    img_carousel.src = "/carousel/m/c".concat(i, ".jpeg");
  }, 5000);
};
var i_cycle = function i_cycle() {
  if (i > 7) i = 1;
  if (i < 1) i = 7;
};
var i = 0;
img_carousel = document.getElementById('img-carousel');
var img_interval = init_interval();
var change_image = function change_image(prev) {
  clearInterval(img_interval);
  img_interval = null;
  if (i === 0) i = 1;
  if (prev) {
    i--;
  } else {
    i++;
  }
  i_cycle();
  img_carousel.src = "/carousel/m/c".concat(i, ".jpeg");
  img_interval = init_interval();
};
window.change_image = change_image;
/******/ })()
;