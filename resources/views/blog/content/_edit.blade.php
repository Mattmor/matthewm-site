<div class="container">
    <div class="row">
        <div class="col-md-8">

            <h1>Edit {!! $post->title !!}</h1>
            <?php echo Form::model($post, array('action' => ['PostsController@update', $post->slug], 'method' => 'patch', 'files' => true)); ?>
            @include('blog.forms._submitchange', ['submitButtonText' => 'Update Post'])
             <?php echo Form::close(); ?>


             @include('errors.list')
        </div>
        <div class="col-md-4">
            <div class="">
                <?php echo Form::open(array('action' => ['PostsController@destroy', $post->slug], 'method' => 'delete')); ?>
                <?php echo Form::submit('Delete', ['class' => 'btn btn-danger form-control']); ?>
                <?php echo Form::close(); ?>
            </div>
        </div>
    </div>
</div>
