
$(document).ready(function(){
    $('#btn-join').click(function(){
        $('.wrap-login').css("display","block")
        $('#form-login').css("display","block")
    })
    
    $('.wrap-login').click(function(){
        $(this).css("display","none")
        $('#form-login').css("display","none")
    })
    
    
});