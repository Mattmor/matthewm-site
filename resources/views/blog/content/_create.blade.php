<div class="container">
    <div class="row">
        <h1>Write a new blog post</h1>
        <hr>
        <?php echo Form::open(array('action' => 'PostsController@store', 'method' => 'post')); ?>
        @include('blog.forms._submitchange', ['submitButtonText' => 'Create Post'])
         <?php echo Form::close(); ?>
    </div>
    @include('errors.list')
</div>
