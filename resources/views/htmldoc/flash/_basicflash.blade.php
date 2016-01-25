@if (Session::has('flash_message'))
    <div class="row">
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_message') }}
        </div>
    </div>
@elseif(Session::has('flash_message_danger'))
    <div class="row">
        <div class="col-md-10 col-md-offset-1 alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_message_danger') }}
        </div>
    </div>
@endif
