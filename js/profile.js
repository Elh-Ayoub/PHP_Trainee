$(".tab-btn-settings").click(function(){
    $(this).addClass('active')
    $('#settings').addClass('active')
    $('#password').removeClass('active')
    $(".tab-btn-password").removeClass('active')
})
$(".tab-btn-password").click(function(){
    $(this).addClass('active')
    $('#password').addClass('active')
    $('#settings').removeClass('active')
    $(".tab-btn-settings").removeClass('active')
})
$('#SubmitInfoForm').click(function(){
    $('#infoForm').submit()
})
$('#choosefile').change(function(e){
    if(e.target.files.length > 0){
        $(".selectfile").css('background', '#292D47')
        $(".selectfile").css('color', 'white')
        $(".selectfile").html('Picture selected')
    }else{
        $(".selectfile").css('background', 'white')
        $(".selectfile").css('color', 'black')
        $(".selectfile").html('select picture')
    }
    
})
function readImage(input) {
if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#profile-pic').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#choosefile").change(function(){
    readImage(this);
});