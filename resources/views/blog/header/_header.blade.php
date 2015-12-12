<div class="container-fluid blog-header-background" id="blog-header">
    <div class="row">
        <div class="logo-box pull-left">
            <a href="/">
                <img src="/images/logowhite.png" alt="" class="home-logo"/>
            </a>
        </div>
        <div class="breadcrum-flex pull-right">
            <a href="/blog">Blog</a>
            @if (isset($post->title))
                <div class="breadcrum-spacer">></div>
                <a href="">{{$post->title}}</a>
            @endif
        </div>
    </div>
</div>
