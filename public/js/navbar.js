/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/navbar.js ***!
  \********************************/
var children_hover = function children_hover(id) {
  var children = document.getElementById(id);
  if (!children) return;
  if (children.style.display === 'block') {
    children.style.display = 'none';
    return;
  }
  children.style.display = 'block';
};
var toggle_mobile_nav = function toggle_mobile_nav() {
  var mobile_nav = document.getElementById('mobile-nav');
  if (!mobile_nav.style.maxHeight || mobile_nav.style.maxHeight === '0px') {
    mobile_nav.style.maxHeight = '1000px';
    return;
  }
  mobile_nav.style.maxHeight = '0px';
  // mobile_nav.style.backgroundColor = 'blue'
};
window.children_hover = children_hover;
window.toggle_mobile_nav = toggle_mobile_nav;
/******/ })()
;