<div class="tab-pane fade" id="ltn_tab_1_2">
    <div class="ltn__myaccount-tab-content-inner">
        <x-jet-form-section submit="updateProfileInformation">
            <x-slot name="title">
                {{ __('Profile Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your account\'s profile information and email address.') }}
            </x-slot>

            <x-slot name="form">

                <div class="ltn-author-introducing clearfix" x-data="{photoName: null, photoPreview: null}">
                    <div class="author-img">
                        <!-- Profile Photo File Input -->
                        <input type="file" hidden
                               wire:model="photo"
                               x-ref="photo"
                               x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "/>

                        <!-- Current Profile Photo -->
                        <div class="mt-2" x-show="! photoPreview">
                            <img src="{{ $this->user->profile_photo_url }}" width="200px" height="200px"
                                 alt="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
                        </div>

                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" x-show="photoPreview">
                            <img x-bind:src="photoPreview" width="200px" height="200px"
                                 alt="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="author-info">
                        <h6>Agent of Property</h6>
                        <h2>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h2>
                        <div class="footer-address">
                            <ul>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-placeholder"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>{{ \Illuminate\Support\Facades\Auth::user()->address }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-call"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>
                                            <a href="tel:{{ \Illuminate\Support\Facades\Auth::user()->phone }}">{{ \Illuminate\Support\Facades\Auth::user()->phone }}</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>
                                            <a href="mailto:{{ \Illuminate\Support\Facades\Auth::user()->email }}">{{ \Illuminate\Support\Facades\Auth::user()->email }}</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="mt-2">
                            <x-jet-secondary-button class="mt-2 me-2" type="button"
                                                    x-on:click.prevent="$refs.photo.click()">
                                {{ __('Select A New Photo') }}
                            </x-jet-secondary-button>

                            @if ($this->user->profile_photo_path)
                                <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                                    <div wire:loading wire:target="deleteProfilePhoto"
                                         class="spinner-border spinner-border-sm" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>

                                    {{ __('Remove Photo') }}
                                </x-jet-secondary-button>
                            @endif

                            <x-jet-input-error for="photo" class="mt-2"/>
                        </div>
                    @endif
                </div>

                <div class="w-md-75">
                    <!-- Name -->
                    <div class="mb-3">
                        <x-jet-label for="name" value="{{ __('Name') }}"/>
                        <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                                     wire:model.defer="state.name" autocomplete="name"/>
                        <x-jet-input-error for="name"/>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <x-jet-label for="email" value="{{ __('Email') }}"/>
                        <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                                     wire:model.defer="state.email"/>
                        <x-jet-input-error for="email"/>
                    </div>
                </div>
            </x-slot>

            <x-slot name="actions">
                <div class="d-flex align-items-baseline">
                    <x-jet-button>
                        <div wire:loading class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>

                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </x-slot>
        </x-jet-form-section>
    </div>
</div>
