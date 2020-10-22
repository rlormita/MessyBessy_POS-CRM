$(document).ready(function(){
    if(window.location.href === "127.0.0.1:8000/transactions") {
         $(".messy-fp").addClass("tech");
     }
});


$(document).ready(function(){
    var current = location.pathname;
    $('.nav-link').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('router-link-exact-active');
        }
    })
  	$('.toast').toast({delay: 5000}).toast('show');
})