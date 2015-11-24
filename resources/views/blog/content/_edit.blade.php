<div class="container">
    <div class="row">
        <h1>Edit {!! $post->title !!}</h1>
        <?php echo Form::model($post, array('action' => ['PostsController@update', $post->slug], 'method' => 'patch')); ?>
        @include('blog.forms._submitchange', ['submitButtonText' => 'Update Post'])
         <?php echo Form::close(); ?>
    @include('errors.list')
    </div>
</div>
