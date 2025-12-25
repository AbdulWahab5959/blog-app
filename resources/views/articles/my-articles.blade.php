<x-layouts.app
    title="My Articles | Dashboard"
    description="Manage your blog articles">
    <!-- Page Header -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="page-title">My Articles</h1>
                        <p class="page-subtitle">Manage your published articles</p>
                    </div>
                    <a href="{{ route('articles.create') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus me-2"></i> Create New Article
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="row mb-5">
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-number">{{ $articles->total() }}</h3>
                        <p class="stat-label">Total Articles</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-number">{{ $publishedCount }}</h3>
                        <p class="stat-label">Published</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-number">{{ $draftCount }}</h3>
                        <p class="stat-label">Drafts</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Articles Table -->
        <div class="card">
            <div class="card-body">
                <!-- Filter Tabs -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="filter-tabs">
                        <a href="{{ route('articles.my') }}?status=all"
                            class="filter-tab {{ request('status') == 'all' || !request('status') ? 'active' : '' }}">
                            All ({{ $articles->total() }})
                        </a>
                        <a href="{{ route('articles.my') }}?status=published"
                            class="filter-tab {{ request('status') == 'published' ? 'active' : '' }}">
                            Published ({{ $publishedCount }})
                        </a>
                        <a href="{{ route('articles.my') }}?status=draft"
                            class="filter-tab {{ request('status') == 'draft' ? 'active' : '' }}">
                            Drafts ({{ $draftCount }})
                        </a>
                    </div>

                    <!-- Search -->
                    <div class="search-box">
                        <form method="GET" action="{{ route('articles.my') }}" class="search-form">
                            <div class="input-group">
                                <input type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Search articles..."
                                    value="{{ request('search') }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                @if($articles->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3>No Articles Found</h3>
                    <p>You haven't created any articles yet.</p>
                    <a href="{{ route('articles.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i> Create Your First Article
                    </a>
                </div>
                @else
                <!-- Articles Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Article</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                            <tr>
                                <td>
                                    <div class="article-info">
                                        @if($article->image)
                                        @if(filter_var($article->image, FILTER_VALIDATE_URL))
                                        {{-- External URL --}}
                                        <img src="{{ $article->image }}"
                                            alt="{{ $article->title }}"
                                            class="article-thumbnail">
                                        @else
                                        {{-- Local file in storage --}}
                                        <img src="{{ asset('storage/' . $article->image) }}"
                                            alt="{{ $article->title }}"
                                            class="article-thumbnail">
                                        @endif
                                        @else
                                        <div class="article-thumbnail no-image">
                                            <i class="fas fa-image"></i>
                                        </div>
                                        @endif
                                        <div class="article-details">
                                            <h6 class="article-title mb-1">
                                                <a href="{{ route('articles.show', $article->slug) }}"
                                                    class="text-decoration-none">
                                                    {{ $article->title }}
                                                </a>
                                            </h6>
                                            <div class="article-excerpt text-muted small">
                                                {{ Str::limit(strip_tags($article->content), 80) }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ $article->category ?? 'General' }}</span>
                                </td>
                                <td>
                                    @if($article->is_published)
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i> Published
                                    </span>
                                    @else
                                    <span class="badge bg-warning">
                                        <i class="fas fa-clock me-1"></i> Draft
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="date-info">
                                        <div class="date">{{ $article->created_at->format('M d, Y') }}</div>
                                        <div class="time text-muted small">{{ $article->created_at->format('h:i A') }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('articles.show', $article->slug) }}"
                                            class="btn btn-sm btn-outline-info"
                                            title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('articles.edit', $article) }}"
                                            class="btn btn-sm btn-outline-warning"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="confirmDelete({{ $article->id }})"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Quick Status Toggle -->
                                        <form action="{{ route('articles.toggle-status', $article) }}"
                                            method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn btn-sm btn-outline-{{ $article->is_published ? 'secondary' : 'success' }}"
                                                title="{{ $article->is_published ? 'Unpublish' : 'Publish' }}">
                                                @if($article->is_published)
                                                <i class="fas fa-eye-slash"></i>
                                                @else
                                                <i class="fas fa-eye"></i>
                                                @endif
                                            </button>
                                        </form>

                                        <!-- Delete Form -->
                                        <form id="delete-form-{{ $article->id }}"
                                            action="{{ route('articles.destroy', $article) }}"
                                            method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Showing {{ $articles->firstItem() }} to {{ $articles->lastItem() }} of {{ $articles->total() }} articles
                    </div>
                    <div>
                        {{ $articles->withQueryString()->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this article? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete Article</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let articleIdToDelete = null;

        function confirmDelete(id) {
            articleIdToDelete = id;
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            if (articleIdToDelete) {
                document.getElementById('delete-form-' + articleIdToDelete).submit();
            }
        });

        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
    @endpush
</x-layouts.app>