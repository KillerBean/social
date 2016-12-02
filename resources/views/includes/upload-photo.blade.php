<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Post</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
              <section class="splash">
                    <div class="splash-instructions">
                      <div class="splash-image">
                      <div class="image-regular"></div>
                      <div class="image-shine"></div>
                      </div>
                      <p>
                        <span class="copyandpaste">Copy &amp; Paste</span> or <span class="draganddrop">Drag &amp; Drop</span> <br>
                        <span class="sub-text">the image you want to upload.</span>
                      </p>
                    </div>
                    <!-- <div class="not-supported">
                      <p>
                        This browser is not supported because of missing HTML5 features.
                      </p>
                    </div> -->
              </section>

                <div class="form-group">
                  <label for="image">Image ( jpg | png | svg | gif )</label>
                  <input type="file" name="image" class="form-control" id="image">
              </div>
              <button type="submit" class="btn btn-primary">Save new photo</button>
              {{ csrf_field() }}
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
