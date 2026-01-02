<div class="bg-white rounded-lg shadow-md p-8 max-md:p-4">
    <div class="flex gap-2">
        <img src="{{ asset('build/assets/icons/SecurityIcon.svg') }}" alt="password icon" class="w-6 h-6">
        <h2 class="text-xl font-bold text-text-primary mb-6">Password & Security</h2>
    </div>

    <div class="space-y-4">
        <form method="POST" action="{{ route('user.settings.updatePassword') }}">
            @csrf
            @method('PATCH')

            <div>
                <label class="input-label-small">
                    Current Password
                    @error('current_password')
                        <span class="text-red-500 text-xs ml-2 font-normal">* {{ $message }}</span>
                    @enderror
                </label>
                <div class="relative">
                    <input id="current_password" name="current_password" type="password"
                        class="input-field-small pr-10 @error('current_password') border-red-500 @enderror"
                        required>
                </div>
            </div>

            <div>
                <label class="input-label-small">
                    New Password
                    @error('password')
                        <span class="text-red-500 text-xs ml-2 font-normal">* {{ $message }}</span>
                    @enderror
                </label>
                <div class="relative">
                    <input id="new_password" name="password" type="password"
                        class="input-field-small pr-10 @error('password') border-red-500 @enderror"
                        required>
                </div>
            </div>

            <div>
                <label class="input-label-small">
                    Confirm New Password
                    @error('password_confirmation')
                        <span class="text-red-500 text-xs ml-2 font-normal">* {{ $message }}</span>
                    @enderror
                </label>
                <div class="relative">
                    <input id="confirm_password" name="password_confirmation" type="password"
                        class="input-field-small pr-10 @error('password_confirmation') border-red-500 @enderror"
                        required>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <input id="toggle_show_password" type="checkbox" class="h-4 w-4">
                <label for="toggle_show_password" class="text-sm">Show passwords</label>
            </div>

            <p class="flex items-center gap-2 bg-[#FEF9C2] p-3 mt-4 rounded-xl text-pending-text max-md:text-[12px]">
                <img src='{{asset('build/assets/icons/pendingIcon.svg')}}'>
                Password must be at least 8 characters with uppercase, lowercase, and numbers
            </p>

            <div class="justify-end flex mt-6">
                <div>
                    <button type="submit" class="normal-btn"> Update Password </button>
                </div>
            </div>
        </form>
    </div>
</div>
