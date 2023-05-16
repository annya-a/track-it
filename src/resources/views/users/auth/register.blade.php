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
                        src="/assets/img/create-account-office.jpeg"
                        alt="Office"
                    />
                    <img
                        aria-hidden="true"
                        class="hidden object-cover w-full h-full dark:block"
                        src="/assets/img/create-account-office-dark.jpeg"
                        alt="Office"
                    />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1
                            class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
                        >
                            Create account
                        </h1>
                        <x-forms.form :action="route('register')" method="POST">
                            <div class="mt-4">
                                <x-forms.text name="name" title="Your Name" :value="old('name')" placeholder="John Doe"/>
                            </div>
                            <div class="mt-4">
                                <x-forms.email name="email" title="Email" :value="old('email')" placeholder="johndoe@example.com" />
                            </div>
                            <div class="mt-4">
                                <x-forms.password name="password" title="Password" placeholder="***************"/>
                            </div>
                            <div class="mt-4">
                                <x-forms.password name="password_confirmation" title="Confirm password" placeholder="***************"/>
                            </div>
                            <div class="mt-4">
                                <x-forms.checkbox name="policy" :value="old('policy')" option="1" title="I agree to the privacy policy"/>
                            </div>

                            <x-forms.button name="register" class="w-full">Create account</x-forms.button>

                            <p class="mt-4">
                                <a
                                    class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                    href="{{ route('login')}} "
                                >
                                    Already have an account? Login
                                </a>
                            </p>
                        </x-forms.form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
