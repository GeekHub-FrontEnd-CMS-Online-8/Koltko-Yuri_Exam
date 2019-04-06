$(document).ready(function() {
    var menuBtn = $('.top-nav-btn');
       var menu = $('.menu2');
       menuBtn.on('click', function(event){
           event.preventDefault();
           menu.toggleClass('menu__activ');
       });
   
   });