<div class="tab-pane fade" id="ltn_tab_1_9">
    <div class="ltn__myaccount-tab-content-inner">
        <div class="account-login-inner">
            <x-jet-form-section submit="updatePassword">
                <x-slot name="title">
                    {{ __('Change Password') }}
                </x-slot>
                <x-slot name="description">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </x-slot>
                <x-slot name="form" class="ltn__form-box contact-form-box">
                    <div class="w-md-75">
                        <div class="mb-3">
                            <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
                            <x-jet-input id="current_password" type="password" class="{{ $errors->has('current_password') ? 'is-invalid' : '' }}"
                                         wire:model.defer="state.current_password" autocomplete="current-password" />
                            <x-jet-input-error for="current_password" />
                        </div>

                        <div class="mb-3">
                            <x-jet-label for="password" value="{{ __('New Password') }}" />
                            <x-jet-input id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                                         wire:model.defer="state.password" autocomplete="new-password" />
                            <x-jet-input-error for="password" />
                        </div>

                        <div class="mb-3">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" type="password" class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                         wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                            <x-jet-input-error for="password_confirmation" />
                        </div>
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-jet-button class="theme-btn-1 btn btn-block">
                        <div wire:loading class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>

                        {{ __('Save') }}
                    </x-jet-button>
                </x-slot>
            </x-jet-form-section>
        </div>
    </div>
</div>
