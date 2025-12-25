<x-layouts.app 
    title="Edit Article - {{ $article->title }}"
    description="Edit your blog article"
>
    <div class="form-page">
        <div class="form-container">
            <div class="form-card">
                <!-- Header Section -->
                <div class="form-header">
                    <div class="form-header-icon">
                        <i class="fas fa-edit text-white text-xl"></i>
                    </div>
                    <h2 class="form-title form-title-large">Edit Article</h2>
                    <p class="form-subtitle">Update your blog article</p>
                </div>

                <div class="form-body">
                    <!-- Error Alert -->
                    @if($errors->any())
                        <div class="form-alert form-alert-error">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="form-alert form-alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="form-group">
                            <label for="title" class="form-label">Article Title</label>
                            <div class="form-input-container">
                                <i class="fas fa-heading form-input-icon"></i>
                                <input 
                                    id="title" 
                                    name="title" 
                                    type="text" 
                                    value="{{ old('title', $article->title) }}" 
                                    required 
                                    autofocus 
                                    class="form-field-input"
                                    placeholder="Enter article title"
                                >
                            </div>
                            @if($errors->has('title'))
                                <div class="form-error-message">{{ $errors->first('title') }}</div>
                            @endif
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="category" class="form-label">Category</label>
                            <div class="form-input-container">
                                <i class="fas fa-tag form-input-icon"></i>
                                <select id="category" name="category" class="form-field-input">
                                    <option value="">Select Category</option>
                                    <option value="Technology" {{ old('category', $article->category) == 'Technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="Web Development" {{ old('category', $article->category) == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                    <option value="Design" {{ old('category', $article->category) == 'Design' ? 'selected' : '' }}>Design</option>
                                    <option value="Business" {{ old('category', $article->category) == 'Business' ? 'selected' : '' }}>Business</option>
                                    <option value="Lifestyle" {{ old('category', $article->category) == 'Lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                                    <option value="Other" {{ old('category', $article->category) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="form-group">
                            <label for="content" class="form-label">Content</label>
                            <div class="form-input-container">
                                <i class="fas fa-file-alt form-input-icon"></i>
                                <textarea 
                                    id="content" 
                                    name="content" 
                                    rows="10" 
                                    required 
                                    class="form-field-input"
                                    placeholder="Write your article content here..."
                                >{{ old('content', $article->content) }}</textarea>
                            </div>
                            @if($errors->has('content'))
                                <div class="form-error-message">{{ $errors->first('content') }}</div>
                            @endif
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <label for="image" class="form-label">Featured Image</label>
                            <div class="form-input-container">
                                <i class="fas fa-image form-input-icon"></i>
                                <input 
                                    id="image" 
                                    name="image" 
                                    type="file" 
                                    accept="image/*"
                                    class="form-field-input"
                                >
                            </div>
                            <small class="form-text-muted">Max size: 2MB. Recommended: 800x400px</small>
                            @if($article->image)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600">Current Image:</p>
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="Current image" class="mt-1 rounded-lg" style="max-width: 200px;">
                                </div>
                            @endif
                        </div>

                        <!-- Read Time -->
                        <div class="form-group">
                            <label for="read_time" class="form-label">Read Time (minutes)</label>
                            <div class="form-input-container">
                                <i class="fas fa-clock form-input-icon"></i>
                                <input 
                                    id="read_time" 
                                    name="read_time" 
                                    type="number" 
                                    value="{{ old('read_time', $article->read_time ?? 5) }}" 
                                    min="1"
                                    class="form-field-input"
                                    placeholder="Estimated read time"
                                >
                            </div>
                        </div>

                        <!-- Publish Option -->
                        <div class="form-checkbox-container">
                            <input 
                                id="is_published" 
                                type="checkbox" 
                                name="is_published"
                                value="1"
                                {{ $article->is_published ? 'checked' : '' }}
                                class="form-checkbox"
                            >
                            <label for="is_published" class="form-checkbox-label">
                                Publish article
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex gap-2">
                            <button type="submit" class="form-btn-primary form-btn-full">
                                <i class="fas fa-save form-btn-icon"></i> Update Article
                            </button>
                            
                            <!-- Delete Button -->
                            <button type="button" 
                                    onclick="if(confirm('Are you sure you want to delete this article?')) { document.getElementById('delete-form').submit(); }"
                                    class="form-btn-danger">
                                <i class="fas fa-trash form-btn-icon"></i> Delete
                            </button>
                        </div>
                    </form>

                    <!-- Delete Form -->
                    <form id="delete-form" action="{{ route('articles.destroy', $article) }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>

                    <!-- Back Link -->
                    <div class="form-signup-link">
                        <a href="{{ route('articles.show', $article->slug) }}" class="form-link">
                            <i class="fas fa-arrow-left"></i> Back to Article
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>