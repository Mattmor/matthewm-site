@if (Session::has('flash_message'))
    <div class="container">
        <div class="row">
            <div class="alert alert alert-dismissible flash-bottom" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
            </div>
        </div>
    </div>
@elseif(Session::has('flash_message_danger'))
    <div class="container">
        <div class="row">
            <div class="alert alert-danger alert-dismissible flash-bottom" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message_danger') }}
            </div>
        </div>
    </div>
@endif
