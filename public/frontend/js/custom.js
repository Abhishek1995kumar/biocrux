window.onload = function() {
  AOS.init({
    disable:'mobile',
        easing: 'ease',
         duration: 1000,
      }); 

    // breadcum parallax and sectioon parallax 

    var width=$(window).width();
    if (width > 767) {
      $('.breadcum').parallax_content(); 
      $('.parallax').parallax(); 
    }
  }

$(document).ready(function(argument) {
//active menu navigation
var loc = window.location.pathname;
var page = location.pathname.split('/').pop();
$('.mobile-navbar ul.navbar-active li  a[href*="'+page+'"]').addClass('active');
$('.mobile-navbar ul.navbar-nav li  a.project-active[href*="'+page+'"]').addClass('active');

var loc = window.location.pathname;
var page = location.pathname.split('/').pop();
if(page=='') {
  page = 'index.php';
}

if($('a[href*="'+page+'"]').parent().parent().hasClass('dropdown-menu')) {
  $('a[href*="'+page+'"]').parents('.dropdown').find('a:first').addClass('active');
}
else {
  $('a[href*="'+page+'"]').addClass('active');
}
});


// //cross icon header navigation 

$('#mobile-menu-action').click(function() {
  if($('.mobile-navbar').hasClass('open')) {
    $('.mobile-navbar').removeClass('open');
    $(this).removeClass('active');
  }
  else {
    $('.mobile-navbar').addClass('open');
    $(this).addClass('active');
  }
});

$(document).on('click','.mobile-navbar',function() {
      $('#mobile-menu-action').trigger('click');
    });

// // header shrink js


(function(window, document, undefined) {
  'use strict';
  // Extend function
  function extend(a, b) {
      for (var key in b) {
          if (b.hasOwnProperty(key)) {
              a[key] = b[key];
          }
      }
      return a;
  }
  // Throttle function (https://bit.ly/1eJxOqL)
  function throttle(fn, threshhold, scope) {
      threshhold || (threshhold = 250);
      var previous, deferTimer;
      return function() {
          var context = scope || this,
              current = Date.now(),
              args = arguments;
          if (previous && current < previous + threshhold) {
              clearTimeout(deferTimer);
              deferTimer = setTimeout(function() {
                  previous = current;
                  fn.apply(context, args);
              }, threshhold);
          } else {
              previous = current;
              fn.apply(context, args);
          }
      };
  }
  // Class management functions
  function classReg(className) {
      return new RegExp('(^|\\s+)' + className + '(\\s+|$)');
  }
  function hasClass(el, cl) {
      return classReg(cl).test(el.className);
  }
  function addClass(el, cl) {
      if (!hasClass(el, cl)) {
          el.className = el.className + ' ' + cl;
      }
  }
  function removeClass(el, cl) {
      el.className = el.className.replace(classReg(cl), ' ');
  }
  // Main function definition
  function headsUp(selector, options) {
      this.selector = document.querySelector(selector);
      this.options = extend(this.defaults, options);
      this.init();
  }
  // Overridable defaults
  headsUp.prototype = {
      defaults: {
          delay: 100,
          sensitivity: 20
      },
      // Init function
      init: function(selector) {
          var self = this,
              options = self.options,
              selector = self.selector,
              oldScrollY = 0,
              winHeight;
          // Resize handler function
          function resizeHandler() {
              winHeight = window.innerHeight;
              return winHeight;
          }
          // Scroll handler function
          function scrollHandler() {
              // Scoped variables
              var newScrollY = window.pageYOffset,
                  docHeight = document.body.scrollHeight,
                  pastDelay = newScrollY > options.delay,
                  goingDown = newScrollY > oldScrollY,
                  fastEnough = newScrollY < oldScrollY - options.sensitivity,
                  rockBottom = newScrollY < 0 || newScrollY + winHeight >= docHeight;
              // Where the magic happens
              if (pastDelay && goingDown) {
                  addClass(selector, 'heads-up');
                  removeClass(selector, 'shrink');
              } else if (!goingDown && fastEnough && !rockBottom || !pastDelay) {
                  removeClass(selector, 'heads-up');
                  addClass(selector, 'shrink');
              }
              if (newScrollY < 50) {
                  removeClass(selector, 'shrink');
              }
              // Keep on keeping on
              oldScrollY = newScrollY;
          }
          // Attach listeners
          if (selector) {
              // Trigger initial resize
              resizeHandler();
              // Resize function listener
              window.addEventListener('resize', throttle(resizeHandler), false);
              // Scroll function listener
              window.addEventListener('scroll', throttle(scrollHandler, 100), false);
          }
      }
  };
  window.headsUp = headsUp;
})(window, document);
$(document).ready(function() {
  // Instantiate HeadsUp
  new headsUp('header');
});
   
// });
 // AOS.init();
// <--------------- top arrow --------------------->

    $(document).on("scroll", function() {

        if ($(document).scrollTop() > 800) {
            $(".top-arrow").show();
        } else {
            $(".top-arrow").hide();
        }
    });

    $(document).on('click','.top-arrow', function() {
    $("html, body").animate({ scrollTop: 0 }, 1000);
    });


// smooth scroll hash click
   var hash=window.location.hash;
    var ele=$('.nav-tabs a[href="'+hash+'"][data-toggle="tab"]');
    var ele_top=$('.tab-content');
    if(ele.length > 0) {
      $(ele).trigger('click');
      $("html, body").animate({ scrollTop: $(ele_top).offset().top - ($('.breadcum').height() - 100) }, 1000);
    }
    
       var hash = window.location.hash;
            if (hash!='') {
                $('html, body').animate({
                    scrollTop:$(hash).offset().top - ($('header').height() - 20)}, 1000);
            }


             // home-slider



// counter js animation script start 

   function formatter (value) {
return value.toFixed(0).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }

            var a = 0;
            $(window).scroll(function() {
              if($('.counter').length > 0) {
                var oTop = $('.counter').offset().top - window.innerHeight;
                if (a == 0 && $(window).scrollTop() > oTop) {
                  $('.counter-value').each(function() {
                    var $this = $(this),
                    countTo = $this.attr('data-count');
                    $({
                      countNum: $this.text()
                    }).animate({
                      countNum: countTo
                    },
                    {
                      duration: 2000,
                      easing: 'swing',
                      step: function() {
                        $this.text(formatter(Math.floor(this.countNum)));
                      },
                      complete: function() {
                        $this.text(formatter(this.countNum));
                      }
                    });
                  });
                  a = 1;
                }
              }


              
            });




 // Close the dropdown if the body (or any area outside dropdown) is clicked
 $(document).click(function(event) {
  // If the click target is outside the dropdown, hide the dropdown content
  if (!$(event.target).closest('.dropdown').length) {
    $('.dropdown-content').hide();
  }
});



//preview upload document
document.querySelectorAll('.file-upload').forEach(function(inputElement) {
  inputElement.addEventListener('change', function(event) {
    const files = event.target.files;
    const previewContainer = event.target.closest('.upload-wrapper').querySelector('.previewContainer');
    const inputLogoWrapper = event.target.closest('.upload-wrapper').querySelector('.input-logo-wrapper');

    // Clear previous previews
    previewContainer.innerHTML = '';

    // Check if any valid file is selected
    let validFilesSelected = false;

    // Loop through selected files and create previews
    for (let i = 0; i < files.length; i++) {
      const file = files[i];

      // Validate file size (must be less than 5 MB)
      const maxFileSize = 5 * 1024 * 1024; // 5 MB in bytes
      if (file.size > maxFileSize) {
        alert('File size must be less than 5 MB.');
        // Do not hide the input-logo-wrapper if the file exceeds the size limit
        inputLogoWrapper.style.display = 'block';
        return; // Exit the function if the file size is too large
      }

      // Validate file type (PDF or Image)
      if (file.type !== 'application/pdf' && !file.type.startsWith('image/')) {
        alert('Invalid file type. Please upload a PDF or an image file.');
        // Do not hide the input-logo-wrapper if an invalid file is selected
        inputLogoWrapper.style.display = 'block';
        return; // Exit the function if invalid file type is found
      }

      validFilesSelected = true;

      const filePreview = document.createElement('div');
      filePreview.classList.add('file-preview');

      // Check if file is a PDF or image
      if (file.type === 'application/pdf') {
        // Create a PDF icon preview
        const pdfIcon = document.createElement('img');
        pdfIcon.src = 'https://vhd.mcgm.gov.in/images/google-docs.png'; // Example PDF icon URL
        filePreview.appendChild(pdfIcon);
      } else if (file.type.startsWith('image/')) {
        // If the file is an image, create an image preview
        const imagePreview = document.createElement('img');
        const reader = new FileReader();

        reader.onload = function(e) {
          imagePreview.src = e.target.result;
          filePreview.appendChild(imagePreview);
        };

        reader.readAsDataURL(file); // Read the file as a data URL
      }

      // File name display
      const fileName = document.createElement('p');
      fileName.textContent = file.name; // Set file name
      filePreview.appendChild(fileName);

      // Cancel button
      const cancelButton = document.createElement('button');
      cancelButton.textContent = 'X';
      cancelButton.classList.add('cancel-button');

      // Add event listener to cancel button to remove the preview
      cancelButton.addEventListener('click', function() {
        filePreview.remove();

        // If all previews are removed, show the input-logo-wrapper again
        if (previewContainer.children.length === 0) {
          inputLogoWrapper.style.display = 'block';
        }
      });

      // Append the cancel button to the preview container
      filePreview.appendChild(cancelButton);

      // Append the file preview (icon, name, and cancel button) to the preview container
      previewContainer.appendChild(filePreview);
    }

    // Hide input-logo-wrapper only if valid files are selected
    if (validFilesSelected) {
      inputLogoWrapper.style.display = 'none';
    } else {
      inputLogoWrapper.style.display = 'block'; // Keep it visible if no valid files are selected
    }

    // Reset the input field to allow re-upload of the same file
    event.target.value = '';  // This will allow the same file to be selected again
  });
});


  


 


