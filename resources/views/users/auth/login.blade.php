<x-layout.app>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div
            class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
        >
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img
                        aria-hidden="true"
                        class="object-cover w-full h-full dark:hidden"
                        src="../assets/img/login-office.jpeg"
                        alt="Office"
                    />
                    <img
                        aria-hidden="true"
                        class="hidden object-cover w-full h-full dark:block"
                        src="../assets/img/login-office-dark.jpeg"
                        alt="Office"
                    />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1
                            class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
                        >
                            Login
                        </h1>
                        <x-forms.form  :action="route('login')" method="POST">
                            <x-forms.email name="email" title="Email" :value="old('email')" placeholder="johndoe@example.com" />

                            <x-forms.password name="password" title="Password" placeholder="***************" />


                            <x-forms.button name="login">
                                Log in
                            </x-forms.button>
                        </x-forms.form>

                        <p class="mt-4">
                            <a
                                class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="./forgot-password.html"
                            >
                                Forgot your password?
                            </a>
                        </p>
                        <p class="mt-1">
                            <a
                                class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="{{ route('register') }}"
                            >
                                Create account
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
