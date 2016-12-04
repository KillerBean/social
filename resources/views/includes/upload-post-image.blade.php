<div class="modal fade" tabindex="-1" role="dialog" id="edit-photo-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add a image to your post</h4>
                <h5 class="modal-title">You can drag&drop, paste or click in the green button to choose your new photo</h5>
            </div>
            <div class="modal-body">


                <span class="btn btn-success fileinput-button">
                    <i class="fa fa-plus"></i>
                    <span>Choose you photo</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="image" data-url='{{route("post.image-upload")}}' data-token="{{csrf_token()}}" data-user-id="{{Auth::User()->id}}">
                </span>
                <br>
                <br>
                <!-- The container for the uploaded files -->
                <div id="files" class="files"></div>
                <br>
                <img class="target active" name='image_paste'>
                <button type="button" class="btn btn-primary" id="modal-photo-save">Change Photo</button>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
