@if(count($errors) > 0)
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="message alert alert-danger">
        <ul style="list-style: none; padding: 0;">
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
      <div class="message alert alert-success">
        <li>{{ Session::get('message') }}</li>
      </div>
    </div>
  </div>
@endif﻿
