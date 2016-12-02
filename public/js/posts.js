var postId = 0;
var postBodyElement = null;

$('.post').find('.interaction').find('.edit').on('click', function(event){
    event.preventDefault();

    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    console.log(postBodyElement.textContent)
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

$('#modal-save').on('click', function(){
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: { body: $('#post-body').val(), postId: postId, _token: token }
    })
    .done(function (msg){
        $(postBodyElement).text(msg['new_body']);
        $('#edit-modal').modal('hide');
    });
});

$('.like').on('click', function(event){
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: { isLike: isLike, postId: postId, _token: token }
    })
    .done(function(){
        var $target = $(event.target);
        if ( $target.hasClass('btn-success') ) {
            if($('#like').hasClass("fa-check-circle")){
                $('#like').removeClass("fa-check-circle");
                $('#like').addClass("fa-thumbs-o-up");
            }else{
                $('#like').removeClass("fa-thumbs-o-up");
                $('#like').addClass("fa-check-circle");
            }

            if($('#dislike').hasClass("fa-check-circle")){
                $('#dislike').removeClass("fa-check-circle");
                $('#dislike').addClass("fa-thumbs-o-down");
            }
        } else {
            if($('#dislike').hasClass("fa-check-circle")){
                $('#dislike').removeClass("fa-check-circle");
                $('#dislike').addClass("fa-thumbs-o-down");
            }else{
                $('#dislike').removeClass("fa-thumbs-o-down");
                $('#dislike').addClass("fa-check-circle");
            }

            if($('#like').hasClass("fa-check-circle")){
                $('#like').removeClass("fa-check-circle");
                $('#like').addClass("fa-thumbs-o-up");
            }
        }
    });
});
