@extends('layouts.app')

@section('heading')
<link rel="stylesheet" href="{{ URL::To('/bower_components/blueimp-file-upload/css/jquery.fileupload.css') }}">
@endsection

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">

            <form action="{{ route('post.create') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">What do you have to say</h3>
                        </div>
                        <div class="panel-body">
                            <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your post"></textarea>
                            <div class="image-upload pull-left"><i class="fa fa-picture-o fa-2x"></i> <b>inserir imagem</b></div>
                            <input type="hidden" id="has_image" data-url='{{route("post.image-upload")}}' data-token="{{csrf_token()}}" name="has_image" value="0">
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" name="button">Create Post</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <header><h3>What you have sayed before:</h3></header>
            @include('includes.posts')
        </div>
    </section>

    @include('includes.upload-post-image')
    @include('includes.modal-edit')
    @section('scripts')
    <script src="{{ URL::To('/js/pasteimage.js') }}"></script>
    <script src="{{ URL::To('/bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::To('/bower_components/blueimp-file-upload/js/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::To('/bower_components/blueimp-load-image/js/load-image.all.min.js') }}"></script>
    <script src="{{ URL::To('/bower_components/blueimp-file-upload/js/jquery.fileupload-process.js') }}"></script>
    <script src="{{ URL::To('/bower_components/blueimp-file-upload/js/jquery.fileupload-image.js') }}"></script>
    <script src="{{ URL::To('/bower_components/blueimp-file-upload/js/jquery.fileupload-validate.js') }}"></script>
        <script type="text/javascript">
            $('.image-upload').on('click', function(event){
                event.preventDefault();
                $('#edit-photo-modal').modal();
            });
            ;(function ($) {
                'use strict';
                var has_image = $('#has_image');
                // Change this to the location of your server-side upload handler:
                var url = has_image.data('url'),
                    uploadButton = $('<button/>')
                        .addClass('btn btn-primary')
                        .prop('disabled', true)
                        .text('Processing...')
                        .on('click', function () {
                        var $this = $(this),
                            data = $this.data();
                        $this
                            .off('click')
                            .on('click', function () {
                                $this.remove();
                                data.abort();
                            });
                        data.submit().always(function () {
                            $this.remove();
                            $('#has_image').val(1);
                            console.log(token);
                            $('#edit-photo-modal').modal('hide');
                        });
                    });
                var $fileupload = $('#fileupload');
                $fileupload.fileupload({
                    url: has_image.data('url'),
                    dataType: 'json',
                    autoUpload: false,
                    formData: {_token: $fileupload.data('token')},
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                    maxFileSize: 999000,
                    // Enable image resizing, except for Android and Opera,
                    // which actually support image resizing, but fail to
                    // send Blob objects via XHR requests:
                    disableImageResize: /Android(?!.*Chrome)|Opera/
                        .test(window.navigator.userAgent),
                    previewMaxWidth: 100,
                    previewMaxHeight: 100,
                    previewCrop: true
                }).on('fileuploadadd', function (e, data) {
                    data.context = $('<div/>').appendTo('#files');
                    $.each(data.files, function (index, file) {
                        var node = $('<p/>')
                                .append($('<span/>').text(file.name));
                        if (!index) {
                            node
                                .append('<br>')
                                .append(uploadButton.clone(true).data(data));
                        }
                        node.appendTo(data.context);
                    });
                }).on('fileuploadprocessalways', function (e, data) {
                    var index = data.index,
                        file = data.files[index],
                        node = $(data.context.children()[index]);
                    if (file.preview) {
                        node
                            .prepend('<br>')
                            .prepend(file.preview);
                    }
                    if (file.error) {
                        node
                            .append('<br>')
                            .append($('<span class="text-danger"/>').text(file.error));
                    }
                    if (index + 1 === data.files.length) {
                        data.context.find('button')
                            .text('Upload')
                            .prop('disabled', !!data.files.error);
                    }
                });
        })(window.jQuery);
        </script>
    @endsection
@endsection
