var HeaderSticky=function(){'use strict';var handleHeaderSticky=function(){if($('.js__header-sticky').offset().top>15){$('.js__header-sticky').addClass('s-header__shrink')}
$(window).on('scroll',function(){if($('.js__header-sticky').offset().top>15){$('.js__header-sticky').addClass('s-header__shrink')}else{$('.js__header-sticky').removeClass('s-header__shrink')}})}
return{init:function(){handleHeaderSticky()}}}();$(document).ready(function(){HeaderSticky.init()})