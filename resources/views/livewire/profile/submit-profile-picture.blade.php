<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

new class extends Component
{
    use WithFileUploads;

    public $profile_picture;

    public function updateProfilePicture(): void
    {
        try {
            $validated = $this->validate([
                'profile_picture' => ['required', 'image', 'max:1024'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('profile_picture');

            throw $e;
        }

        $user = Auth::user();
        $path = $validated['profile_picture']->store('public/img/users/profile-pictures');

        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->update([
            'profile_picture' => $path,
        ]);

        $this->reset('profile_picture');

        $this->dispatch('profile-picture-updated');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Upload a new profile picture to keep your profile updated.') }}
        </p>
    </header>

    <form wire:submit="updateProfilePicture" class="mt-6 space-y-6" novalidate>
        <div>
            <x-input-label for="update_profile_picture" :value="__('Profile Picture')" />
            <input wire:model="profile_picture" id="update_profile_picture" name="profile_picture" type="file" class="block w-full mt-1" accept="image/*" />
            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-picture-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>