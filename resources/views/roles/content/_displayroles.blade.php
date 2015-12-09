<div class="container">
    <div class="row">
        <h1> Roles: </h1>
        <hr>
    </div>
    <div class="row role-table-head">
        <div class="col-md-1 ">
            ID
        </div>
        <div class="col-md-1">
            Level
        </div>
        <div class="col-md-2">
            Name
        </div>
        <div class="col-md-2">
            Slug
        </div>
        <div class="col-md-4">
            Description
        </div>
        <div class="col-md-1">
            Edit
        </div>
        <div class="col-md-1">
            Delete
        </div>
    </div>
    @foreach ($roles as $role)
    <div class="row role-table-body">
        <a href="{{ action('RolesController@show', [$role->slug]) }}">
            <div class="col-md-1 role-table-body-cell">
                {{ $role->id }}
            </div>
            <div class="col-md-1 role-table-body-cell">
                {{ $role->level }}
            </div>
            <div class="col-md-2 role-table-body-cell">
                {{ $role->name }}
            </div>
            <div class="col-md-2 role-table-body-cell">
                {{ $role->slug }}
            </div>
            <div class="col-md-4 role-table-body-cell">
                {{ $role->description }}
            </div>
        </a>
            <div class="col-md-1 role-table-body-cell">
                <a href="{{ action('RolesController@edit', [$role->slug]) }}">
                    <button type="button" name="button" class="btn btn-warning">Edit</button>
                </a>
            </div>
            <div class="col-md-1 role-table-body-cell">
                <?php echo Form::open(array('action' => ['RolesController@destroy', $role->slug], 'method' => 'delete')); ?>
                <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>
                <?php echo Form::close(); ?>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="end-of-table">

        </div>
    </div>
    <div class="row create-button">
        <div class="col-md-6">
            <a href="{{ action('RolesController@create') }}">
                <button type="button" name="button" class="btn btn-primary form-control">Create new role</button>
            </a>
        </div>
    </div>
</div>
