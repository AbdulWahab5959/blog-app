<x-layouts.app
    title="{{ $article->title }}"
    description="{{ Str::limit(strip_tags($article->content), 160) }}">
    <!-- Article Header -->
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Back Button -->


                <!-- Article Header -->
                <div class="article-header mb-5">
                    <div class="article-category mb-3">
                        <span class="badge-category">{{ $article->category ?? 'General' }}</span>
                        <span class="article-meta">
                            <i class="far fa-clock"></i> {{ $article->read_time ?? 5 }} min read
                        </span>
                    </div>
                    <h1 class="article-title">{{ $article->title }}</h1>
                    <div class="article-meta-info">
                        <div class="author-info">
                            <i class="fas fa-user-circle"></i>
                            <div>
                                <div class="author-name">{{ $article->user->name ?? 'Anonymous' }}</div>
                                <div class="article-date">
                                    Published {{ $article->created_at->format('F d, Y') }}
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->

                        <div class="article-actions">
                            <a href="{{ route('blog') }}" class="btn-back mb-4">
                                <i class="fas fa-arrow-left"></i> Back to Blog
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                {{-- In your article show/edit views --}}
                @if($article->image)
                @if(filter_var($article->image, FILTER_VALIDATE_URL))
                {{-- External URL --}}
                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="img-fluid">
                @else
                {{-- Local file --}}
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid">
                @endif
                @else
                {{-- Default image --}}
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                    alt="{{ $article->title }}" class="img-fluid">
                @endif

                <!-- Article Content -->
                <div class="article-content">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <!-- Article Footer -->
                <div class="article-footer mt-5 pt-4 border-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tags-section">
                                <h6>Tags:</h6>
                                <div class="tags">
                                    <span class="tag">{{ $article->category ?? 'General' }}</span>
                                    <span class="tag">Blog</span>
                                    <span class="tag">Article</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="share-section">
                                <h6>Share:</h6>
                                <div class="share-buttons">
                                    <a href="#" class="share-btn">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="#" class="share-btn">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="share-btn">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="share-btn">
                                        <i class="fas fa-link"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Articles (Optional) -->
                <div class="related-articles mt-5">
                    <h3 class="section-title">You Might Also Like</h3>
                    <div class="row">
                        @php
                        $related = \App\Models\Article::where('category', $article->category)
                        ->where('id', '!=', $article->id)
                        ->where('is_published', true)
                        ->limit(3)
                        ->get();
                        @endphp

                        @foreach($related as $relatedArticle)
                        <div class="col-md-4">
                            <div class="related-card">
                                @if($relatedArticle->image)
                                <img src="{{ asset('storage/' . $relatedArticle->image) }}"
                                    alt="{{ $relatedArticle->title }}"
                                    class="related-image">
                                @endif
                                <div class="related-content">
                                    <h5 class="related-title">
                                        <a href="{{ route('articles.show', $relatedArticle->slug) }}">
                                            {{ Str::limit($relatedArticle->title, 50) }}
                                        </a>
                                    </h5>
                                    <div class="related-meta">
                                        <span class="related-author">{{ $relatedArticle->user->name ?? 'Anonymous' }}</span>
                                        <span class="related-date">{{ $relatedArticle->created_at->format('M d') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>