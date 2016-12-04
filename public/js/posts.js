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

$('.edit-photo').on('click', function(event){
    event.preventDefault();
    $('#edit-photo-modal').modal();
});

$('#modal-photo-save').on('click', function(){
    var dataURL = $(".active").attr("src");
    var url = $("#fileupload").data('url');
    var token = $("#fileupload").data('token');

    $.ajax({
        method: 'POST',
        type: $(this).attr('method'),
        url: url,
        data: { image_paste: dataURL, _token: token }
    })
    .done(function (msg){
        window.location.reload(true);
    });
});

$('#modal-save').on('click', function(){
    var urlEdit = $('#modal-save').data("url");
    var token = $("#fileupload").data('token');
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



function nl2br (str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}


$('.like').on('click', function(event){
    event.preventDefault();
    var urlLike = $(this).data("url");
    var token = $("#fileupload").data('token');
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
