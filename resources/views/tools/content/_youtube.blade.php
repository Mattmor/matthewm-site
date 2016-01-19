<div class="container">
    <div class="row">
        <h1>Youtube URL and output type: </h1>
        <hr>
        <?php echo Form::open(array('action' => 'ToolsController@downloadYoutube', 'method' => 'post')); ?>
        <div class="form-group">
            <?php
                    echo Form::label('yturl', 'Youtube URL:');
                    echo Form::text('yturl', null, ['class' => 'form-control']);
            ?>
        </div>
        <div class="form-group">
            <div class="radio">
            <?php
                    echo Form::label('type', 'Audio');
                    echo Form::radio('type', 'Audio', true);
                    echo '</div> <div class="radio">';
                    echo Form::label('type', 'Video');
                    echo Form::radio('type', 'Video');
             ?>
            </div>
         </div>
         <div class="form-group">
             <?php
                     echo Form::submit('Download!', ['class' => 'btn btn-primary form-control']);
              ?>
          </div>

         <?php echo Form::close(); ?>
    </div>
    @include('errors.list')
</div>
