@if(count($errors) > 0)
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="message alert alert-danger alert-dismissable" role="alert">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endif
@if(Session::has('message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="message alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ul><li>{{ Session::get('message') }}</li></ul>

            </div>
        </div>
    </div>
@endif﻿
