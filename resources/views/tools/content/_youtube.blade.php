<div class="container-fluid youtube-content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <?php echo Form::open(array('action' => 'ToolsController@downloadYoutube', 'method' => 'post')); ?>
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <?php
                        echo Form::label('yturl', 'Youtube URL:');
                        echo Form::text('yturl', null, ['class' => 'form-control']);
                    ?>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group youtube-radio">
                    <?php
                        echo Form::label('type', 'Audio (mp3):', ['class' => 'youtube-radio-label']);
                        echo Form::radio('type', 'Audio', true);
                        echo Form::label('type', 'Video (mp4):', ['class' => 'youtube-radio-label']);
                        echo Form::radio('type', 'Video');
                    ?>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <?php
                            echo Form::submit('Download!', ['class' => 'btn btn-primary form-control']);
                    ?>
                </div>
            </div>
            <?php echo Form::close(); ?>
        </div>
    </div>
    @include('errors.list')
</div>
