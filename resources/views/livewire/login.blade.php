{{-- In work, do what you enjoy. --}}
<div class="min-h-screen  flex flex-col">
    <div class="flex flex-1 items-center justify-center">

        <div class="rounded-lg sm:border-2 px-4 lg:px-24 py-16 lg:max-w-xl sm:max-w-md w-full text-center bg-white">

            <form id="form" wire:submit.prevent="login" class="text-center">
                <h1 class="font-bold tracking-wider text-3xl mb-8 w-full text-gray-600">
                    Todo App
                </h1>

                @if($error)
                    <livewire:alert-message-error :message="$errorMessage"/>
                @endif

                <div class="py-2 text-left">
                    <input type="email"
                           class="bg-gray-200 border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                           placeholder="Email"
                           wire:model="email"
                    />
                    @error('email') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="py-2 text-left">
                    <input type="password"
                           class="bg-gray-200 border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                           placeholder="Password"
                           wire:model="password"
                    />
                    @error('password') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="py-2">
                    <button type="submit" class="border-2 border-gray-100 focus:outline-none bg-purple-600 text-white font-bold tracking-wider block w-full p-2 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                        Sign In
                    </button>

                    <label class="text-gray-800 mb-4">or</label>

                    <a href="/auth/github" class="border-2 border-gray-100 focus:outline-none bg-purple-600 text-white font-bold tracking-wider block w-full p-2 rounded-lg focus:border-gray-700 hover:bg-purple-700">
                        Sign in with Github
                    </a>
                </div>
            </form>

            <div class="text-center mt-12">
                <span>
                    Don't have an account?
                </span>
                <a href="/register"
                   class="font-light text-md text-indigo-600 underline font-semibold hover:text-indigo-800">Register</a>
            </div>
        </div>
    </div>
</div>