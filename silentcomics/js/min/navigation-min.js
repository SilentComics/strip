!function(){var e,n,s;if(e=document.getElementById("site-navigation"),e&&(n=e.getElementsByTagName("h1")[0],"undefined"!=typeof n)){if(s=e.getElementsByTagName("ul")[0],"undefined"==typeof s)return void(n.style.display="none");-1===s.className.indexOf("nav-menu")&&(s.className+=" nav-menu"),n.onclick=function(){-1!==e.className.indexOf("toggled")?e.className=e.className.replace(" toggled",""):e.className+=" toggled"}}}(),function($){$(".main-navigation").find("a").on("focus.silentcomics blur.silentcomics",function(){$(this).parents(".menu-item, .page_item").toggleClass("focus")}),"ontouchstart"in window&&$("body").on("touchstart.silentcomics",".menu-item-has-children > a, .page_item_has_children > a",function(e){var n=$(this).parent("li");n.hasClass("focus")||(e.preventDefault(),n.toggleClass("focus"),n.siblings(".focus").removeClass("focus"))})}(jQuery);