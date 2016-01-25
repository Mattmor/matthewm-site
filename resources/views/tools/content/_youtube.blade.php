<div class="container-fluid youtube-content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <?php echo Form::open(array('action' => 'ToolsController@downloadYoutube', 'method' => 'post', 'id' => 'ytdl_form')); ?>
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
                    <input type="hidden" id="download_token_value_id"/>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group" >
                    <?php
                            echo Form::submit('Download!', ['class' => 'btn btn-primary form-control', 'onclick' => 'showLoader']);
                    ?>
                </div>
            </div>
            <?php echo Form::close(); ?>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12 loading-container hidden" id="loader">
                <div class="leftEye"></div>
                <div class="rightEye"></div>
                <div class="mouth"></div>
            </div>
        </div>
    @include('errors.list')
</div>
