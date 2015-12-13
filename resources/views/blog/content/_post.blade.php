<div class="container-fluid post-background">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 post-top">
            <div class="post-meta">
                <div class="blog-avitar pull-left">
                    <img src="/images/avitar.jpg" alt="" class="avitar blog-avitar"/>
                </div>
                <div class="mmeta-text-wrapper pull-left">
                    <div class="user-name-title clear-right">
                        Matt Morgan
                    </div>
                    <div class="date-time-title clear-right">
                        {{ $post->created_at->format('F jS, Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($post->uploaded_image)
    <div class="row post-title-background" style="background: url(<?php echo $post->uploaded_image ?>) no-repeat scroll center center / cover;">
        <div class="darkfilrer">
        </div>
        <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 post-title-text">
            <h1> {{ $post->title }}</h1>
        </div>
    </div>
    @else
    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 post-title-text-noimage">
        <h1> {{ $post->title }}</h1>
    </div>
    @endif

    <div class="row">
        <div class="col-md-6 col-md-offset-3 post-text">
            <article class="">
                <h2>{{ $post->title }}</h2>
                {!! $post->body !!}
            </article>
        </div>
    </div>
    <div class="blog-divider-post">
    </div>
</div>
