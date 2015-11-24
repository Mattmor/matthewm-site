<div class="form-group">
    <?php   echo Form::label('title', 'Post title:');
            echo Form::text('title', null, ['class' => 'form-control']);
    ?>
</div>
<div class="form-group">
    <?php
            echo Form::label('body', 'Body:');
            echo Form::textarea('body', null, ['class' => 'form-control'])
     ?>
 </div>
 <div class="form-group">
     <?php
             echo Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']);
      ?>
  </div>
