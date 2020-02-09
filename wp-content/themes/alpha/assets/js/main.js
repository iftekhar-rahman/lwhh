;(function($){
    $(document).ready(function(){
        $(".popup").each(function(){
            var image = $(this).find("img").attr("src");
            $(this).attr("href",image)
        });


        // tiny slider
        var slider = tns({
            container: '.slider',
            speed:300,
            autoplayTimeout:3000,
            items: 1,
            autoplay: true,
            autoHeight:true,
            controls:false,
            nav:false,
            autoplayButtonOutput:false,
            mouseDrag: true,
        });
        // tiny slider
        // var testimonials = tns({
        //     container: '.testimonials',
        //     speed:300,
        //     autoplayTimeout:3000,
        //     items: 1,
        //     autoplay: true,
        //     autoHeight:true,
        //     controls:false,
        //     nav:false,
        //     autoplayButtonOutput:false,
        //     mouseDrag: true,
        // });
    });
})(jQuery);