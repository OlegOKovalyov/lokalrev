$(document).ready(function(){
    /* Top Toggle Menu Animation */
    jQuery(document).ready(function(){
        jQuery('.toggle-menu').click(function(){
            jQuery('header').toggleClass('open');
            jQuery('body').toggleClass('menu-open');
        });
    });


}); // ready()