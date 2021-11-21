$('.create-like').click(function(){
    var url = $(this).data('url')
    var post_id = $(this).data('id')
    var type = $(this).data('type')
    var auth = $(this).data('auth')
    var elemets = $(this)
    $.ajax({
        method: "POST",
        url: url,
        data: { post_id: post_id, type: type},
        dataType: "json",
        error: function(msg){
            console.log(JSON.stringify(msg));
            calcLikes(elemets, post_id, auth, url)
        },
    })
    
})

async function calcLikes(post, id, auth, url) {
    url = url + "/list"
    likes = []
    $.ajax({
        method: "POST",
        url: url,
        data: { post_id: id},
        dataType: "json",
        error: function(msg){
            console.log(JSON.stringify(msg));
        }
    }).done(function( msg ) {
        likes = msg;
        var countLikes = 0;
        var countDisikes = 0;
        var check4like = false
        var check4dislike = false
        likes.forEach(like => {
            if(like.type === 'like'){
                countLikes++
                if(parseInt(like.author) === auth){
                    check4like = true
                }
            }
            else{
                countDisikes++
                if(parseInt(like.author) === auth){
                    check4dislike = true
                }
            } 
        });
        var container = post.parent()
        $(container).find('.countLikes').html("(" + countLikes + ")")
        $(container).find('.countDislikes').html("(" + countDisikes + ")")
        if(check4like){
            $(container).find('.like-icon').removeClass('far')
            $(container).find('.like-icon').addClass('fas')

            $(container).find('.dislike-icon').removeClass('fas')
            $(container).find('.dislike-icon').addClass('far')
        }else{
            $(container).find('.like-icon').addClass('far')
            $(container).find('.like-icon').removeClass('fas')
        }
        if(check4dislike){
            $(container).find('.dislike-icon').removeClass('far')
            $(container).find('.dislike-icon').addClass('fas')

            $(container).find('.like-icon').removeClass('fas')
            $(container).find('.like-icon').addClass('far')
        }else{
            $(container).find('.dislike-icon').addClass('far')
            $(container).find('.dislike-icon').removeClass('fas')
        }
    });
}
