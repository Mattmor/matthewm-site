<div class="container">
    <div class="row">
        <h1> Posts: </h1>
        <hr>
        @foreach ($posts as $post)
        <a href="{{ action('PostsController@show', [$post->slug]) }}">
            <article class="">
                <h2>{{ $post->title }}</h2>

                <div class="body">
                    {{ $post->excerpt }}...
                </div>
            </article>
            </a>
        @endforeach
    </div>
</div>
