!function($){var t=$("#strip-color-scheme-css"),i=wp.customize;t.length||(t=$("head").append('<style type="text/css" id="strip-color-scheme-css" />').find("#strip-color-scheme-css")),i("blogname",function(t){t.bind(function(t){$(".site-title a").text(t)})}),i("blogdescription",function(t){t.bind(function(t){$(".site-description").text(t)})}),i("header_textcolor",function(t){t.bind(function(t){"blank"===t?$(".site-title, .site-description").css({clip:"rect(1px, 1px, 1px, 1px)",position:"absolute"}):$(".site-title, .site-description").css({clip:"auto",color:t,position:"relative"})})}),i("background_image",function(t){t.bind(function(t){$("body").toggleClass("custom-background-image",""!==t)})}),i.bind("preview-ready",function(){i.preview.bind("update-color-scheme-css",function(i){t.html(i)})})}(jQuery);