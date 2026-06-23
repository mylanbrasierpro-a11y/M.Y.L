(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js"
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_navbar_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./js/navbar.js */ "./assets/js/navbar.js");
/* harmony import */ var _js_navbar_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_js_navbar_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");
/* harmony import */ var _js_dark_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./js/dark.js */ "./assets/js/dark.js");
/* harmony import */ var _js_dark_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_js_dark_js__WEBPACK_IMPORTED_MODULE_2__);
// import './stimulus_bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */



console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

/***/ },

/***/ "./assets/js/dark.js"
/*!***************************!*\
  !*** ./assets/js/dark.js ***!
  \***************************/
() {

var btn = document.querySelector('.btn');

// Vérifie le thème enregistré au chargement
if (localStorage.getItem('theme') === 'dark') {
  document.body.classList.add('dark');
}
btn === null || btn === void 0 ? void 0 : btn.addEventListener('click', function () {
  document.body.classList.toggle('dark');
  if (document.body.classList.contains('dark')) {
    localStorage.setItem('theme', 'dark');
  } else {
    localStorage.setItem('theme', 'light');
  }
});

/***/ },

/***/ "./assets/js/navbar.js"
/*!*****************************!*\
  !*** ./assets/js/navbar.js ***!
  \*****************************/
() {

window.onload = function () {
  var navButton = document.querySelector("#main-navbar .nav-button");

  // Si on clique sur le bouton on ouvre le menu
  navButton.addEventListener("click", function (event) {
    // On stoppe la propagation
    event.stopPropagation();

    // On ajoute la classe show ou on l'enlève
    this.nextElementSibling.classList.toggle("show");
  });

  // Si on clique n'importe où, on ferme le menu
  document.addEventListener("click", function () {
    navButton.nextElementSibling.classList.remove("show");
  });
};

/***/ },

/***/ "./assets/styles/app.scss"
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./assets/app.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ3dCO0FBQ0c7QUFDTjtBQUVyQkEsT0FBTyxDQUFDQyxHQUFHLENBQUMsZ0VBQWdFLENBQUMsQzs7Ozs7Ozs7OztBQ1g3RSxJQUFNQyxHQUFHLEdBQUdDLFFBQVEsQ0FBQ0MsYUFBYSxDQUFDLE1BQU0sQ0FBQzs7QUFFMUM7QUFDQSxJQUFJQyxZQUFZLENBQUNDLE9BQU8sQ0FBQyxPQUFPLENBQUMsS0FBSyxNQUFNLEVBQUU7RUFDMUNILFFBQVEsQ0FBQ0ksSUFBSSxDQUFDQyxTQUFTLENBQUNDLEdBQUcsQ0FBQyxNQUFNLENBQUM7QUFDdkM7QUFFQVAsR0FBRyxhQUFIQSxHQUFHLHVCQUFIQSxHQUFHLENBQUVRLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxZQUFNO0VBQ2pDUCxRQUFRLENBQUNJLElBQUksQ0FBQ0MsU0FBUyxDQUFDRyxNQUFNLENBQUMsTUFBTSxDQUFDO0VBRXRDLElBQUlSLFFBQVEsQ0FBQ0ksSUFBSSxDQUFDQyxTQUFTLENBQUNJLFFBQVEsQ0FBQyxNQUFNLENBQUMsRUFBRTtJQUMxQ1AsWUFBWSxDQUFDUSxPQUFPLENBQUMsT0FBTyxFQUFFLE1BQU0sQ0FBQztFQUN6QyxDQUFDLE1BQU07SUFDSFIsWUFBWSxDQUFDUSxPQUFPLENBQUMsT0FBTyxFQUFFLE9BQU8sQ0FBQztFQUMxQztBQUNKLENBQUMsQ0FBQyxDOzs7Ozs7Ozs7O0FDZkZDLE1BQU0sQ0FBQ0MsTUFBTSxHQUFHLFlBQU07RUFDbEIsSUFBTUMsU0FBUyxHQUFHYixRQUFRLENBQUNDLGFBQWEsQ0FBQywwQkFBMEIsQ0FBQzs7RUFFcEU7RUFDQVksU0FBUyxDQUFDTixnQkFBZ0IsQ0FBQyxPQUFPLEVBQUUsVUFBU08sS0FBSyxFQUFDO0lBQy9DO0lBQ0FBLEtBQUssQ0FBQ0MsZUFBZSxDQUFDLENBQUM7O0lBRXZCO0lBQ0EsSUFBSSxDQUFDQyxrQkFBa0IsQ0FBQ1gsU0FBUyxDQUFDRyxNQUFNLENBQUMsTUFBTSxDQUFDO0VBQ3BELENBQUMsQ0FBQzs7RUFFRjtFQUNBUixRQUFRLENBQUNPLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxZQUFVO0lBQ3pDTSxTQUFTLENBQUNHLGtCQUFrQixDQUFDWCxTQUFTLENBQUNZLE1BQU0sQ0FBQyxNQUFNLENBQUM7RUFDekQsQ0FBQyxDQUFDO0FBQ04sQ0FBQyxDOzs7Ozs7Ozs7Ozs7QUNoQkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9kYXJrLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9uYXZiYXIuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3N0eWxlcy9hcHAuc2Nzcz84ZjU5Il0sInNvdXJjZXNDb250ZW50IjpbIi8vIGltcG9ydCAnLi9zdGltdWx1c19ib290c3RyYXAuanMnO1xyXG4vKlxyXG4gKiBXZWxjb21lIHRvIHlvdXIgYXBwJ3MgbWFpbiBKYXZhU2NyaXB0IGZpbGUhXHJcbiAqXHJcbiAqIFRoaXMgZmlsZSB3aWxsIGJlIGluY2x1ZGVkIG9udG8gdGhlIHBhZ2UgdmlhIHRoZSBpbXBvcnRtYXAoKSBUd2lnIGZ1bmN0aW9uLFxyXG4gKiB3aGljaCBzaG91bGQgYWxyZWFkeSBiZSBpbiB5b3VyIGJhc2UuaHRtbC50d2lnLlxyXG4gKi9cclxuaW1wb3J0ICcuL2pzL25hdmJhci5qcyc7XHJcbmltcG9ydCAnLi9zdHlsZXMvYXBwLnNjc3MnO1xyXG5pbXBvcnQgJy4vanMvZGFyay5qcydcclxuXHJcbmNvbnNvbGUubG9nKCdUaGlzIGxvZyBjb21lcyBmcm9tIGFzc2V0cy9hcHAuanMgLSB3ZWxjb21lIHRvIEFzc2V0TWFwcGVyISDwn46JJyk7XHJcbiIsImNvbnN0IGJ0biA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5idG4nKTtcclxuXHJcbi8vIFbDqXJpZmllIGxlIHRow6htZSBlbnJlZ2lzdHLDqSBhdSBjaGFyZ2VtZW50XHJcbmlmIChsb2NhbFN0b3JhZ2UuZ2V0SXRlbSgndGhlbWUnKSA9PT0gJ2RhcmsnKSB7XHJcbiAgICBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5hZGQoJ2RhcmsnKTtcclxufVxyXG5cclxuYnRuPy5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IHtcclxuICAgIGRvY3VtZW50LmJvZHkuY2xhc3NMaXN0LnRvZ2dsZSgnZGFyaycpO1xyXG5cclxuICAgIGlmIChkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5jb250YWlucygnZGFyaycpKSB7XHJcbiAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oJ3RoZW1lJywgJ2RhcmsnKTtcclxuICAgIH0gZWxzZSB7XHJcbiAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oJ3RoZW1lJywgJ2xpZ2h0Jyk7XHJcbiAgICB9XHJcbn0pOyIsIndpbmRvdy5vbmxvYWQgPSAoKSA9PiB7XHJcbiAgICBjb25zdCBuYXZCdXR0b24gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiI21haW4tbmF2YmFyIC5uYXYtYnV0dG9uXCIpO1xyXG5cclxuICAgIC8vIFNpIG9uIGNsaXF1ZSBzdXIgbGUgYm91dG9uIG9uIG91dnJlIGxlIG1lbnVcclxuICAgIG5hdkJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24oZXZlbnQpe1xyXG4gICAgICAgIC8vIE9uIHN0b3BwZSBsYSBwcm9wYWdhdGlvblxyXG4gICAgICAgIGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xyXG5cclxuICAgICAgICAvLyBPbiBham91dGUgbGEgY2xhc3NlIHNob3cgb3Ugb24gbCdlbmzDqHZlXHJcbiAgICAgICAgdGhpcy5uZXh0RWxlbWVudFNpYmxpbmcuY2xhc3NMaXN0LnRvZ2dsZShcInNob3dcIik7XHJcbiAgICB9KTtcclxuXHJcbiAgICAvLyBTaSBvbiBjbGlxdWUgbidpbXBvcnRlIG/DuSwgb24gZmVybWUgbGUgbWVudVxyXG4gICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgbmF2QnV0dG9uLm5leHRFbGVtZW50U2libGluZy5jbGFzc0xpc3QucmVtb3ZlKFwic2hvd1wiKTtcclxuICAgIH0pXHJcbn0iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsiY29uc29sZSIsImxvZyIsImJ0biIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsImxvY2FsU3RvcmFnZSIsImdldEl0ZW0iLCJib2R5IiwiY2xhc3NMaXN0IiwiYWRkIiwiYWRkRXZlbnRMaXN0ZW5lciIsInRvZ2dsZSIsImNvbnRhaW5zIiwic2V0SXRlbSIsIndpbmRvdyIsIm9ubG9hZCIsIm5hdkJ1dHRvbiIsImV2ZW50Iiwic3RvcFByb3BhZ2F0aW9uIiwibmV4dEVsZW1lbnRTaWJsaW5nIiwicmVtb3ZlIl0sInNvdXJjZVJvb3QiOiIifQ==