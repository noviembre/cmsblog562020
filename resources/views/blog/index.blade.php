@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                @if (! $posts->count())
                    <div class="alert alert-warning">
                        <p>No Category Found</p>
                    </div>
                @else

                    @if (isset($categoryName))
                        <div class="alert alert-info">
                            <p>Category: <strong>{{ $categoryName }}</strong></p>
                        </div>
                    @endif

                        @if (isset($authorName))
                            <div class="alert alert-info">
                                <p>Author: <strong>{{ $authorName }}</strong></p>
                            </div>
                        @endif

                @foreach($posts as $post)
                    <article class="post-item">
                        @if ($post->image_url)
                        <div class="post-item-image">
                            <a href="{{ route('blogfront.show', $post->slug) }}">
                                <img src="{{ $post->image_url }}" alt="">
                            </a>
                        </div>
                        @endif
                        <div class="post-item-body">
                            <div class="padding-10">
                                <h2><a href="{{ route('blogfront.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                <p>{{ $post->excerpt }}</p>
                            </div>

                            <div class="post-meta padding-10 clearfix">
                                <div class="pull-left">
                                    <ul class="post-meta-group">
                                         <li><i class="fa fa-user"></i>
                                             <a href="{{ route('author', $post->author->slug) }}">
                                                 {{ $post->author->name }}
                                             </a></li>
                                        <li><i class="fa fa-clock-o"></i><time> {{ $post->date }}</time></li>
                                        <li><i class="fa fa-folder"></i>
                                            <a href="{{ route('category', $post->category->slug ) }}">
                                                {{ $post->category->title }}
                                            </a>
                                        </li>
                                        <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('blogfront.show', $post->slug) }}">Continue Reading &raquo;</a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
                @endif


                <nav class="text-center">
                    {{ $posts->links() }}
                </nav>
            </div>

            @include('layouts.sidebar')

        </div>
    </div>
@endsection