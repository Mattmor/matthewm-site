<div class="container">
    <div class="row">
        <h1>Edit {!! $role->title !!}</h1>
        <?php echo Form::model($role, array('action' => ['RolesController@update', $role->slug], 'method' => 'patch')); ?>
        @include('roles.forms._submitchange', ['submitButtonText' => 'Update Role'])
         <?php echo Form::close(); ?>
    @include('errors.list')
    </div>
</div>
