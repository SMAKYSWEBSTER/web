
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

//  Code
$(document).ready(function()
{
  //Header Logout
  $('#logoutButton').on('click', function() {
    event.preventDefault();
    $('#logoutForm').submit();
  });

  //Image Slider Prev Button
  $('.image-slider > span.next').on('click', function() {
    $current = $(this).siblings('img.active');
    $next = $current.next('img');
    if($next.length != 0) {
      $current.removeClass('active');
      $next.addClass('active');
    } else {
      $next = $('img:first-of-type');
      $current.removeClass('active');
      $next.addClass('active');
    }
  });

  // Image Slider Next Button
  $('.image-slider > span.prev').on('click', function() {
    $current = $(this).siblings('img.active');
    $prev = $current.prev('img');
    if($prev.length != 0) {
      $current.removeClass('active');
      $prev.addClass('active');
    } else {
      $prev = $('img:last-of-type');
      $current.removeClass('active');
      $prev.addClass('active');
    }
  });

  //Image Modal

  $(this).on('click','[class$="-img"]', function() {
    $img_src = $(this).children().attr('src');
    $('.modal.image > img').attr('src', $img_src);
    $('.modal.image').css('display', 'block');
  });

  $('.modal.image > span').on('click', function() {
    $('.modal.image').css('display', 'none');
  });

  //Material Design Input
  $('.inp').on('click', function() {
    $(this).children().find('input').trigger('focus');
    $('.alert').css('display', 'none');
  });

  //Custom Image Upload

  $file = $('input[type=file][accept="image/*"]').addClass('image-upload-hidden');
  $('.btn.img').on('click', function() {
    $file.trigger('focus').trigger('click');
    $file.change(function() {
      let filename = $file.val().split('\\').pop();
      $('.image-upload-input').val(filename).attr('title', filename).trigger('focus');
    });
  });

  //Textarea autoexpand
  // $('textarea').one('focus', function() {
  //   let savedValue = this.value;
  //   this.value = '';
  //   this.baseScrollHeight = this.scrollHeight;
  //   this.value = savedValue;
  // }).on('input', function() {
  //   this.rows = 3;
  //   rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
  //   this.rows = rows + 3;
  // });

  //Image Upload Preview
  // $('input.get-preview').on('change', function() {
  //   $value = $(this).val();
  //   $('.img-preview > img').attr('src', $value);
  // });
});