$( document ).ready(function() {
	$('.portfolio__photo').isotope({
        itemSelector : '.box1',
	layoutMode: 'masonry',
		masonry: {
      columnWidth: 259,
       gutter: 1
    }
      });
});

$(document).ready(function() {
$('.portfolio__photo').isotope({
  itemSelector: '.box1',
});
$('.portfolio__menu ul li').click(function(){
$('.portfolio__menu ul li').removeClass('active');
$(this).addClass('active');
var selector = $(this).attr('data-filter');
$('.portfolio__photo').isotope({
  filter:selector
});
return false;
});
});

$(document).ready(function() {
 var menuBtn = $('.top-nav-btn');
    var menu = $('.menu');
    menuBtn.on('click', function(event){
        event.preventDefault();
        menu.toggleClass('menu__activ');
    });

});