<div class="container">
    <div class="row">
        <h1>Write a new role</h1>
        <hr>
        <?php echo Form::open(array('action' => 'RolesController@store', 'method' => 'post')); ?>
        @include('roles.forms._submitchange', ['submitButtonText' => 'Create Role'])
         <?php echo Form::close(); ?>
    </div>
    @include('errors.list')
</div>
