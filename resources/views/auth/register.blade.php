<x-app-layout>
    <form
        action="{{ route('register') }}"
        method="post"
        class="w-[400px] mx-auto p-6 my-16"
    >
        @csrf

        <h2 class="text-2xl font-semibold text-center mb-4">Create an account</h2>
        <p class="text-center text-gray-500 mb-3">
            or
            <a
                href="{{ route('login') }}"
                class="text-sm text-purple-700 hover:text-purple-600"
            >
                login with existing account
            </a>
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <div>
            <span>
                @if ($errors->has('name'))
                    <span class="invalid-feedback text-red-600 mb-4">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </span>
        </div>
        <div class="mb-4">
            <input
                class="w-full focus:border-gray-600 focus:ring-gray-600 border-gray-300 rounded"
                placeholder="Your name" type="text" name="name" :value="old('name')" />
        </div>
        <div>
            <span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback text-red-600 mb-4">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </span>
        </div>
        <div class="mb-4">
            <input class="w-full focus:border-gray-600 focus:ring-gray-600 border-gray-300 rounded"
                placeholder="Your Email" type="email" name="email" :value="old('email')" />
        </div>
        <div class="mb-4">
            <span>
                @if ($errors->has('password'))
                    <span class="invalid-feedback text-red-600 mb-4">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </span>
        </div>
        <div class="mb-4">
            <input
                class="w-full focus:border-gray-600 focus:ring-gray-600 border-gray-300 rounded"
                placeholder="Password" type="password" name="password"/>
        </div>
        <div class="mb-4">
            <span>
                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback text-red-600 mb-4">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </span>
        </div>
        <div class="mb-4">
            <input
                class="w-full focus:border-gray-600 focus:ring-gray-600 border-gray-300 rounded"
                placeholder="Repeat Password" type="password" name="password_confirmation"/>
        </div>

        <button
            class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
        >
            Signup
        </button>
    </form>
</x-app-layout>
