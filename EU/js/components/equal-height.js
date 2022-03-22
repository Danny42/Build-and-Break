// Equal Height
var EqualHeight = function() {
  "use strict";

  // Handle Equal Height
  var handleEqualHeight = function() {
    $(function($) {
      $('.js__form-eqaul-height-v1').responsiveEqualHeightGrid();
      $('.js__tab-eqaul-height-v1').responsiveEqualHeightGrid();
    });
  }

  return {
    init: function() {
      handleEqualHeight(); // initial setup for equal height
    }
  }
}();

$(docvar Counter=function(){"use strict";var n=function(){$(".js__counter").counterUp()};return{init:function(){n()}}}();$(document).ready(function(){Counter.init()})ument).ready(function() {
    EqualHeight.init();
});