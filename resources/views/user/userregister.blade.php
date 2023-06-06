@vite(['resources/css/app.css', 'resources/js/app.js'])
<!-- component -->
<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <h1 class="mb-8 text-3xl text-center">Sign up</h1>
                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="name"
                    placeholder="Full Name" />

                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="phone"
                    placeholder="Phone" />

                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="address"
                    placeholder="Address" />
                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="email"
                    placeholder="Email" />

                <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="password"
                    placeholder="Password" />
                <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="password_confirmation" placeholder="Confirm Password" />

                <button type="submit"
                    class="w-full text-center py-3 rounded bg-green text-black hover:bg-green-dark focus:outline-none my-1">Create
                    Account</button>
                <div class="text-center text-sm text-grey-dark mt-4">
                    By signing up, you agree to the
                    <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                        Terms of Service
                    </a> and
                    <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                        Privacy Policy
                    </a>
                </div>
        </div>

        <div class="text-grey-dark mt-6">
            Already have an account?
            <a class="no-underline border-b border-blue text-blue" href="{{ route('userlogin') }}">
                Log in
            </a>.
        </div>
        </form>

    </div>
</div>
