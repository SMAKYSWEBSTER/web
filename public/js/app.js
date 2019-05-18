/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require('./bootstrap')
// window.Vue = require('vue')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.component('example-component', require('./components/ExampleComponent.vue'))
// const app = new Vue({
//     el: '#app'
// })
//  Code
$(document).ready(function () {
  //Header Logout
  $(this).on('click', '#logoutButton', function () {
    event.preventDefault();
    $('#logoutForm').trigger('submit');
  }); //Image Slider Next Button

  $(this).on('click', 'span.next', function () {
    $current = $(this).siblings('img.active');
    $next = $current.next('img');

    if ($next.length != 0) {
      $current.removeClass('active');
      $next.addClass('active');
    } else {
      $next = $('img:first-of-type');
      $current.removeClass('active');
      $next.addClass('active');
    }
  }); // Image Slider Prev Button

  $(this).on('click', 'span.prev', function () {
    $current = $(this).siblings('img.active');
    $prev = $current.prev('img');

    if ($prev.length != 0) {
      $current.removeClass('active');
      $prev.addClass('active');
    } else {
      $prev = $('img:last-of-type');
      $current.removeClass('active');
      $prev.addClass('active');
    }
  }); //Image Modal
  // $(this).on('click','[class$="-img"]', function() {
  //   $img_src = $(this).children().attr('src')
  //   $('.modal.image > img').attr('src', $img_src)
  //   $('.modal.image').css('display', 'block')
  // })
  // $('.modal.image > span').on('click', function() {
  //   $('.modal.image').css('display', 'none')
  // })
  //Material Design Input

  $('.inp').on('click', function () {
    $(this).children().find('input').trigger('focus');
    $('.alert').css('display', 'none');
  }); //Custom Image Upload

  $image = $('input[type=file][accept="image/*"]').addClass('image-upload-hidden');
  $('.btn.img').on('click', function () {
    $image.trigger('focus').trigger('click'); // $image.change(function() {
    //   let filename = $file.val().split('\\').pop()
    //   $('.image-upload-input').val(filename).attr('title', filename).trigger('focus')
    // })
  });
  $file = $('input[type=file]').addClass('file-upload-hidden');
  $('.btn.file').on('click', function () {
    $file.trigger('focus').trigger('click');
    $file.change(function () {
      var filename = $file.val().split('\\').pop();
      $('.file-upload-input').val(filename).attr('title', filename).trigger('focus');
    });
  });
  var contentHeight = $('.card-body > .content').outerHeight(true);
  var barHeight = $('.card-body > .action-bar').outerHeight(true);
  $('.card-body.wrapped-height').height(contentHeight + barHeight);
  var footerHeight = document.getElementById('footer').clientHeight;
  var viewportHeight = window.innerHeight;
  var containerHeight = document.body.clientHeight + footerHeight;

  if (viewportHeight >= containerHeight) {
    var footer = document.getElementById('footer');
    footer.style.position = 'absolute';
    footer.style.bottom = '0';
    footer.style.width = '100%';
  }

  $addParagraphButton = $('#addParagraph');
  $addParagraphButton.on('click', function () {
    $actionBar = $(this).parent('.action-bar');
    $content = $actionBar.siblings('.content');
    $label = $content.children('.inp:has(textarea)').last();
    $label.after("\n    <label class=\"inp\">\n      <textarea rows=\"4\" cols=\"50\" name=\"description\" placeholder=\"&nbsp;\"></textarea>\n      <span class=\"label\">Paragraph</span>\n      <span class=\"border\"></span>\n    </label>\n    ");
    $actionBarHeight = $actionBar.outerHeight(true);
    $contentHeight = $content.outerHeight(true);
    $card = $actionBar.parent('.card-body');
    $card.outerHeight($contentHeight + $actionBarHeight); // console.log($contents)
    // $textarea = $actionBar.children('.inp')
    // console.log($textarea)
    // $label = $content.children(
    //   $('.inp:has(textarea[name=description])')
    //   )
  }); //Textarea autoexpand
  // $('textarea').one('focus', function() {
  //   let savedValue = this.value
  //   this.value = ''
  //   this.baseScrollHeight = this.scrollHeight
  //   this.value = savedValue
  // }).on('input', function() {
  //   this.rows = 3
  //   rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16)
  //   this.rows = rows + 3
  // })
  //Image Upload Preview
  // $('input.get-preview').on('change', function() {
  //   $value = $(this).val()
  //   $('.img-preview > img').attr('src', $value)
  // })
});

/***/ }),

/***/ "./resources/assets/sass/app.scss":
/*!****************************************!*\
  !*** ./resources/assets/sass/app.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************************!*\
  !*** multi ./resources/assets/js/app.js ./resources/assets/sass/app.scss ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\web\smakys\resources\assets\js\app.js */"./resources/assets/js/app.js");
module.exports = __webpack_require__(/*! D:\web\smakys\resources\assets\sass\app.scss */"./resources/assets/sass/app.scss");


/***/ })

/******/ });