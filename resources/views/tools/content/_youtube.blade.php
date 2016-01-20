<div class="container-fluid youtube-content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <?php echo Form::open(array('action' => 'ToolsController@downloadYoutube', 'method' => 'post')); ?>
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <?php
                        echo Form::label('yturl', 'Youtube URL:');
                        echo Form::text('yturl', null, ['class' => 'form-control', 'placeholder' => 'Put the youtube URL here']);
                    ?>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group youtube-radio">
                    <input name="type" value="Audio" id="audio" type="radio">
                    <label for="audio">Audio (mp3)</label>
                    <input name="type" value="Video" id="video" type="radio">
                    <label for="video">Video (mp4)</label>
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
