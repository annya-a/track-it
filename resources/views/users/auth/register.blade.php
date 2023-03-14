<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up and Track it</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="/assets/css/tailwind.output.css" />
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer
    ></script>
    <script src="/assets/js/init-alpine.js"></script>
</head>
<body>
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
                        <x-forms.email name="email" title="Email" :value="old('email')" placeholder="johndoe@example.com" />

                        <x-forms.password name="password" title="Password" placeholder="***************"/>

                        <x-forms.password name="password_confirmation" title="Confirm password" placeholder="***************"/>

                        <x-forms.checkbox name="policy" :value="old('policy')" option="1" title="I agree to the privacy policy"/>

                        <x-forms.button name="register">Create account</x-forms.button>

                        <p class="mt-4">
                            <a
                                class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="./login.html"
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
</body>
</html>
