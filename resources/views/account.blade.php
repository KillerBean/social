@extends('layouts.app')

@section('title')
    Account
@endsection

@section('heading')
<link rel="stylesheet" href="{{ URL::To('/bower_components/blueimp-file-upload/css/jquery.fileupload.css') }}">
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading"><header><h3>Your Account</h3></header></div>
                    <div class="panel-body">
                        <div class="show-edit-image col-sm-12 col-md-12 col-lg-12">
                            <img src="{{ URL::To(Auth::User()->avatar)}}" class="edit-photo img-responsive img-circle" height="150px" width="150px">
                        </div>
                            @include('includes.message-block')
                            <form action="{{ route('account.save') }}" id="update-account" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="{{ Auth::User()->name }}" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Change Your Password" id="password">
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Password Confirm</label>
                                    <input type="password" name="password-confirm" class="form-control" placeholder="Confirm Your Password" id="password-confirm">
                                </div>
                                @include('includes.upload-photo')
                                <button type="submit" class="btn btn-primary">Save Account</button>
                                {{ csrf_field() }}
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ URL::To('/js/pasteimage.js') }}"></script>
<script src="{{ URL::To('/bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::To('/bower_components/blueimp-file-upload/js/jquery.fileupload.js') }}"></script>
<script src="{{ URL::To('/bower_components/blueimp-load-image/js/load-image.all.min.js') }}"></script>
<script src="{{ URL::To('/bower_components/blueimp-file-upload/js/jquery.fileupload-process.js') }}"></script>
<script src="{{ URL::To('/bower_components/blueimp-file-upload/js/jquery.fileupload-image.js') }}"></script>
<script src="{{ URL::To('/bower_components/blueimp-file-upload/js/jquery.fileupload-validate.js') }}"></script>

<script type="text/javascript">
    ;(function ($) {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var urlAccountSave = '{{route("account.save")}}',
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
                });
            });
        var $fileupload = $('#fileupload');
        $fileupload.fileupload({
            url: urlAccountSave,
            dataType: 'json',
            autoUpload: false,
            _token: $fileupload.data('token'),
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
                    .text('Change Photo')
                    .prop('disabled', !!data.files.error);
            }
        });
})(window.jQuery);
</script>
@endsection
