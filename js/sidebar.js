$(document).ready(function(){
    $('.menu-btn').click(function() {
        if($('#sidebar').is(":visible")){
            $('#sidebar').fadeOut();
            
        }else{
            $('#sidebar').fadeIn();
        }
    });
    $('#close-icon-cont').mouseenter(function(){
        $('#close-icon').removeClass('fa-bars')
        $('#close-icon').addClass('fa-times')
        $('#close-icon').hide().fadeIn(1000);
    })
    $('#close-icon-cont').mouseleave(function(){
        $('#close-icon').removeClass('fa-times')
        $('#close-icon').addClass('fa-bars')
    })
});
