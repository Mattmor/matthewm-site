@if (Session::has('flash_message'))
    <div class="container">
        <div class="row">
            <div class="col-md-8 alert alert-info alert-dismissible flash-bottom" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
            </div>
        </div>
    </div>
@elseif(Session::has('flash_message_danger'))
    <div class="container">
        <div class="row">
            <div class="col-md-8 alert alert-danger alert-dismissible flash-bottom" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message_danger') }}
            </div>
        </div>
    </div>
@endif
