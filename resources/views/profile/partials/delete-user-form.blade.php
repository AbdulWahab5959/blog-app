{{-- File: resources/views/profile/partials/delete-user-form.blade.php --}}
<div class="space-y-6">
    <div class="p-6 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-xl">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <div>
                <h3 class="font-semibold text-red-800 text-lg">{{ __('Danger Zone') }}</h3>
                <p class="mt-1 text-red-700">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </p>
            </div>
        </div>
    </div>

    <button x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="premium-btn premium-btn-danger">
        <span class="btn-icon">🗑️</span>
        {{ __('Delete Account') }}
    </button>

    <!-- Premium Modal Structure -->
    <div x-data="{ open: false }" 
         x-on:open-modal.window="open = true"
         x-on:close.window="open = false"
         x-show="open"
         class="premium-modal-overlay"
         style="display: none;">
        <div class="premium-modal">
            
            
            <h2 class="premium-modal-title">{{ __('Delete Your Account?') }}</h2>
            <p class="premium-modal-description">
                {{ __('This action is permanent and cannot be undone. All your data, posts, comments, and preferences will be permanently removed from our servers.') }}
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6">
                @csrf
                @method('delete')

                <div class="premium-form-group">
                    <label for="password" class="premium-label">{{ __('Confirm Password') }}</label>
                    <input id="password" name="password" type="password" 
                           class="premium-input {{ $errors->userDeletion->get('password') ? 'input-error-premium' : '' }}"
                           placeholder="{{ __('Enter your password to confirm deletion') }}"
                           required>
                    @if($errors->userDeletion->get('password'))
                        <div class="error-message-premium">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $errors->userDeletion->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="btn-group-premium" style="display: flex; gap: 1rem;">
                    <button type="button" 
                            x-on:click="open = false"
                            class="premium-btn premium-btn-secondary flex-1">
                        {{ __('Cancel') }}
                    </button>
                    
                    <button type="submit" 
                            class="premium-btn premium-btn-danger flex-1 mt-2 sm:mt-0">
                        {{ __('Permanently Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>