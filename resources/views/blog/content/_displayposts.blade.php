<div class="container-fluid blog-background">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 text-center blog-title">
            <div class="blog-avitar-big">
                <img src="/images/avitar.jpg" alt="" class="avitar"/>
            </div>
            <h1>Matt Morgan</h1>
            <h5>It's better to have a short life that is full of what you like doing, than a long life spent in a miserable way.</h5>
        </div>
    </div>
    <div class="blog-divider">
    </div>
    <div class="row">
        <?php $arrayLength = count($posts); $i = 0; ?>
        @foreach ($posts as $post)
        <div class="col-md-6 col-sm-6 col-sm-offset-3 col-md-offset-3 blog-post">
            <div class="blog-post-600">
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
                <a href="{{ action('PostsController@show', [$post->slug]) }}">
                    @if ($post->uploaded_image != '')
                    <div class="post-image-small pull-left" style="background: url(<?php echo $post->uploaded_image ?>) no-repeat scroll center center / cover;">
                    </div>
                    @endif
                    <article class="pull-left">
                        <h2>{{ $post->title }}</h2>

                        <div class="post-excerpt">
                            {!! $post->excerpt !!}
                        </div>
                    </article>
                </a>
                @if ($i !== $arrayLength -1)
                <div class="blog-divider-post pull-left"></div>
                @endif

            </div>
        </div>
        <?php $i++; ?>
        @endforeach
    </div>
    <div class="blog-divider">
    </div>
</div>
