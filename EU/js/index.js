var Global=function(){"use strict";var t=function(){$(".carousel").carousel({interval:5e3,pause:"hover"}),$(".tooltips").tooltip(),$(".tooltips-show").tooltip("show"),$(".tooltips-hide").tooltip("hide"),$(".tooltips-toggle").tooltip("toggle"),$(".tooltips-destroy").tooltip("destroy"),$(".popovers").popover(),$(".popovers-show").popover("show"),$(".popovers-hide").popover("hide"),$(".popovers-toggle").popover("toggle"),$(".popovers-destroy").popover("destroy")},e=function(){$(function(){$("a[href*=#js__scroll-to-]:not([href=#js__scroll-to-])").on("click",function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=$(this.hash);if(t=t.length?t:$("[name="+this.hash.slice(1)+"]"),t.length)return $("html,body").animate({scrollTop:t.offset().top-90},1e3),!1}})})},o=function(){$(".js__fullwidth-img").each(function(){$(this).css("background-image","url("+$(this).children("img").attr("src")+")"),$(this).children("img").hide()})},i=function(){var t=$(".js__bg-overlay"),e=$(".js__header-$('.tabgroup > div').hide();
$('.tabgroup > div:first-of-type').show();
$('.tabs a').click(function(e){
  e.preventDefault();
    var $this = $(this),
        tabgroup = '#'+$this.parents('.tabs').data('tabgroup'),
        others = $this.closest('li').siblings().children('a'),
        target = $this.attr('href');
    others.removeClass('active');
    $this.addClass('active');
    $(tabgroup).children('div').hide();
    $(target).show();
  
})overlay"),o=$(".js__trigger");o.on("click",function(){t.toggleClass("-is-open"),e.toggleClass("-is-open"),o.toggleClass("-is-active")})},s=function(){$(".js__ver-center-aligned").each(function(){$(this).css("padding-top",$(this).parent().height()/2-$(this).height()/2)}),$(window).resize(function(){$(".js__ver-center-aligned").each(function(){$(this).css("padding-top",$(this).parent().height()/2-$(this).height()/2)})})},h=function(){$("[data-auto-height]").each(function(){var t=$(this),e=$("[data-height]",t),o=0,i=t.attr("data-mode"),s=parseInt(t.attr("data-offset")?t.attr("data-offset"):0);e.each(function(){"height"==$(this).attr("data-height")?$(this).css("height",""):$(this).css("min-height","");var t="base-height"==i?$(this).outerHeight():$(this).outerHeight(!0);t>o&&(o=t)}),o+=s,e.each(function(){"height"==$(this).attr("data-height")?$(this).css("height",o):$(this).css("min-height",o)}),t.attr("data-related")&&$(t.attr("data-related")).css("height",t.height())})};return{init:function(){t(),e(),o(),i(),s(),h()}}}();$(document).ready(function(){Global.init()})