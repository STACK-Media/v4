$(function() {

    //Cache some variables
    var links = $('.navigation').find('li');
    slide = $('.slide');
    mywindow = $(window);
    htmlbody = $('html,body');

    //Click event to navigate to section
    $(".navigation li a").bind("click",function(event){
      event.preventDefault();
      var target = $(this).attr("href");
        htmlbody.stop().animate({
          scrollTop: $(target).offset().top + 10
      }, 2000, 'easeInOutExpo');
    });

    //Home navigation
    $("#home a").bind("click",function(event){
      event.preventDefault();
      var target = $(this).attr("href");
        htmlbody.stop().animate({
          scrollTop: $(target).offset().top + 10
      }, 2000, 'easeInOutExpo');
    });

    //Click event to show nav
    $('.nav_container').hover(function() {
        clearTimeout($(this).data('timeout'));
        $('.navigation').slideDown('fast');
        $('.hamburger').addClass('hover');
    }, function() {
        var t = setTimeout(function() {
            $('.navigation').slideUp('fast');
            $('.hamburger').removeClass('hover');
        }, 1000);
        $(this).data('timeout', t);
    });

    //Add active class

    var $sH2 = $('#skrollr-body h2'),  // Store all the h2 (with backgrounds)
        yPos = [],                        // Will store all the y coord
        $window = $(window);              // Reference to the window
    
    // Store all the y coords
    $sH2.each (function (i)
    {
        yPos[i] = $(this).offset ().top;
    });
    
    $window.scroll(function() 
    {    
        var isActive;
        
        $sH2.each (function (i) 
        {
            
            if (($window.scrollTop () + 60) >= yPos[i])
                isActive = i;
            
            if (isActive != null)
            {
                 $(".navigation li a").removeClass("selected");
                 $('.navigation li a').eq (isActive).addClass ('selected');
            }
             if (($window.scrollTop ()) < 50)
             {
                $(".navigation li a").removeClass("selected");
                $('.navigation li a.topslide').eq (0).addClass ('selected');
            }
            if($(window).scrollTop() + $(window).height() == $(document).height()) {
               $(".navigation li a").removeClass("selected");
               $('.navigation li a.bottomslide').eq (0).addClass ('selected');
           }
        });
        
    });  

    function adjustStyle(width) {
        width = parseInt(width);
        console.log(width);
        if (width < 1000) {
            $("#size-stylesheet").attr("href", "css/about_small.css");
        }
        else {
           $("#size-stylesheet").attr("href", "css/about.css"); 
        }
    }

    $(function() {
        adjustStyle($(this).width());
        $(window).resize(function() {
            adjustStyle($(this).width());
        });
    });      

});
