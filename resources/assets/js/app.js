
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
$(document).ready(function()
{
  //Header Logout
  $(this).on('click', '#logoutButton', function() {
    event.preventDefault()
    $('#logoutForm').trigger('submit')
  })

  //Image Slider Next Button
  $(this).on('click', 'span.next', function() {
    $current = $(this).siblings('img.active')
    $next = $current.next('img')
    if($next.length != 0) {
      $current.removeClass('active')
      $next.addClass('active')
    } else {
      $next = $('img:first-of-type')
      $current.removeClass('active')
      $next.addClass('active')
    }
  })

  // Image Slider Prev Button
  $(this).on('click','span.prev', function() {
    $current = $(this).siblings('img.active')
    $prev = $current.prev('img')
    if($prev.length != 0) {
      $current.removeClass('active')
      $prev.addClass('active')
    } else {
      $prev = $('img:last-of-type')
      $current.removeClass('active')
      $prev.addClass('active')
    }
  })

  //Image Modal

  // $(this).on('click','[class$="-img"]', function() {
  //   $img_src = $(this).children().attr('src')
  //   $('.modal.image > img').attr('src', $img_src)
  //   $('.modal.image').css('display', 'block')
  // })

  // $('.modal.image > span').on('click', function() {
  //   $('.modal.image').css('display', 'none')
  // })

  //Material Design Input
  $('.inp').on('click', function() {
    $(this).children().find('input').trigger('focus')
    $('.alert').css('display', 'none')
  })

  //Custom Image Upload

  $image = $('input[type=file][accept="image/*"]').addClass('image-upload-hidden')
  $('.btn.img').on('click', function() {
    $image.trigger('focus').trigger('click')
    // $image.change(function() {
    //   let filename = $file.val().split('\\').pop()
    //   $('.image-upload-input').val(filename).attr('title', filename).trigger('focus')
    // })
  })

  $file = $('input[type=file]').addClass('file-upload-hidden')
  $('.btn.file').on('click', function() {
    $file.trigger('focus').trigger('click')
    $file.change(function() {
        let filename = $file.val().split('\\').pop()
        $('.file-upload-input').val(filename).attr('title', filename).trigger('focus')
    })
  })

  let contentHeight = $('.card-body > .content').outerHeight(true)
  let barHeight = $('.card-body > .action-bar').outerHeight(true)
  $('.card-body.wrapped-height').height(contentHeight + barHeight)

  let footerHeight = document.getElementById('footer').clientHeight
  let viewportHeight = window.innerHeight
  let containerHeight = document.body.clientHeight + footerHeight

  if(viewportHeight >= containerHeight) {
    let footer = document.getElementById('footer')
    footer.style.position = 'absolute'
    footer.style.bottom = '0'
    footer.style.width = '100%'
  }

  $addParagraphButton = $('#addParagraph')
  $addParagraphButton.on('click', function() {
    $actionBar = $(this).parent('.action-bar')
    $content = $actionBar.siblings('.content')
    $label = $content.children('.inp:has(textarea)').last()
    $label.after(`
    <label class="inp">
      <textarea rows="4" cols="50" name="description" placeholder="&nbsp;"></textarea>
      <span class="label">Paragraph</span>
      <span class="border"></span>
    </label>
    `)
    $actionBarHeight = $actionBar.outerHeight(true)
    $contentHeight = $content.outerHeight(true)
    $card = $actionBar.parent('.card-body')
    $card.outerHeight($contentHeight + $actionBarHeight)
    // console.log($contents)
    // $textarea = $actionBar.children('.inp')
    // console.log($textarea)
    // $label = $content.children(
    //   $('.inp:has(textarea[name=description])')
    //   )
  })


  //Textarea autoexpand
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
})