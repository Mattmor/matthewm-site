<div class="form-group">
    <?php   echo Form::label('name', 'Role name:');
            echo Form::text('name', null, ['class' => 'form-control']);
    ?>
</div>
<div class="form-group">
    <?php
            echo Form::label('slug', 'Slug:');
            echo Form::text('slug', null, ['class' => 'form-control'])
     ?>
 </div>
 <div class="form-group">
     <?php
             echo Form::label('description', 'Description:');
             echo Form::textarea('description', null, ['class' => 'form-control'])
      ?>
  </div>
  <div class="form-group">
      <?php
              echo Form::label('level', 'Level:');
              echo Form::number('level', null, ['class' => 'form-control'])
       ?>
   </div>
 <div class="form-group">
     <?php
             echo Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']);
      ?>
  </div>
