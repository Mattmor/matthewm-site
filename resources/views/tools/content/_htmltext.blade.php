<div class="container-fluid htmltext-content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <?php echo Form::open(array('action' => 'ToolsController@showHtmlToText', 'method' => 'post', 'id' => 'htmltotext_form')); ?>
                <div class="form-group">
                    <?php
                        echo Form::label('html', 'HTML: ');
                        echo Form::textarea('html', null, ['class' => 'form-control', 'placeholder' => 'Put your HTML here', 'rows' => '3']);
                    ?>
                </div>
                <div class="form-group" >
                    <?php
                        echo Form::submit('Convert!', ['class' => 'btn btn-primary form-control']);
                    ?>
                </div>
            <?php echo Form::close(); ?>
        </div>
    </div>
    <div class="row gray-background padding-bottom">
        <div class="col-md-8 col-md-offset-2">
            @if (!empty($text))
                {!!$text!!}
            @endif
        </div>
    </div>
    @include('htmldoc.flash._basicflash')
</div>
