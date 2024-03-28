/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/projetos.js ***!
  \**********************************/
var extend = function extend(id) {
  if (!document.getElementById(id)) return;
  for (var i = 0; i < document.getElementById(id).children.length; i++) {
    var child = document.getElementById(id).children.item(i);
    if (child.children.length > 0) {
      var p = child.children.item(0);
      p.style.display = 'block';
    }
  }
};
var reduce = function reduce(id) {
  if (!document.getElementById(id)) return;
  for (var i = 0; i < document.getElementById(id).children.length; i++) {
    var child = document.getElementById(id).children.item(i);
    if (child.children.length > 0) {
      var p = child.children.item(0);
      p.style.display = '-webkit-box';
    }
  }
};
window.extend = extend;
window.reduce = reduce;
/******/ })()
;