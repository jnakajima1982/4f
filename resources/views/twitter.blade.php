<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>4f</title>

    <!-- Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    @if(app('env')=='local')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @else
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" />
    @endif
  </head>
  <body class="antialiased">
    <div class="container">
      <p class="title">
        {{ $keyword }}
        <a
          href="https://twitter.com/share"
          class="twitter-share-button"
          data-text="「{{ $keyword }}」のTwitterでのトレンド４コマ"
          data-url="{{ route('trend.index') }}"
          >Tweet</a
        >
      </p>
    </div>
    <div class="main">
      @foreach ($tweets as $tweet)
      <blockquote class="twitter-tweet" height="100px">
        <a
          href="https://twitter.com/{{$tweet->tweet_user}}/status/{{$tweet->tweet_id}}"
          data-height="1500px"
        ></a>
      </blockquote>
      @endforeach
    </div>
    <div class="right-arrow">
      <a
        id="prev"
        href="{{ route('trend.show', ['trend_id'=> $prev_id]) }}"
        class="btn-real"
      >
        >
      </a>
    </div>
    <div class="nav-bottom">
      <p><a href="{{ route('trend.index') }}"> 4f </a></p>
    </div>
    @isset($next_id)
    <div class="left-arrow">
      <a
        id="next"
        href="{{ route('trend.show', ['trend_id'=> $next_id]) }}"
        class="btn-real"
      >
        <
      </a>
    </div>
    @endisset
    <script
      async
      src="https://platform.twitter.com/widgets.js"
      charset="utf-8"
    ></script>

    @if(app('env')=='local')
    <script src="{{ asset('js/key.js') }}" charset="utf-8"></script>
    @else
    <script src="{{ secure_asset('js/key.js') }}" charset="utf-8"></script>
    @endif @if(app('env')=='local')
    <script src="{{ asset('js/swipe.js') }}" charset="utf-8"></script>
    @else
    <script src="{{ secure_asset('js/swipe.js') }}" charset="utf-8"></script>
    @endif
    <strong></strong>
    @if(app('env')=='local')
    <script src="{{ asset('js/tweet.js') }}" charset="utf-8"></script>
    @else
    <script src="{{ secure_asset('js/tweet.js') }}" charset="utf-8"></script>
    @endif
  </body>
</html>
