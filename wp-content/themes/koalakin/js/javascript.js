$(function () {
    'use strict';

    // JS starts here.

}());
$(document).ready(function() {
  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 185) {
      $('#primary-navigation').addClass('fixed');
      $('#socialShare').addClass('fixed');
    }
    if ($(window).scrollTop() < 185) {
      $('#primary-navigation').removeClass('fixed');
      $('#socialShare').removeClass('fixed');
    }
    
  });
});