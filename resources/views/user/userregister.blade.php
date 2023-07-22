<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Include Tailwind CSS styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="bg-gray-100 min-h-screen flex flex-col">
        <div class="container mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full max-w-sm">
                <form action="{{ route('user.store') }}" method="POST" onsubmit="return validateForm()">
                    @csrf
                    <h1 class="mb-8 text-3xl text-center font-bold">Sign up</h1>
                    <input type="text" id="name" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="name" placeholder="Full Name" />

                    <input type="text" id="phone" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="phone" placeholder="Phone" />

                    <input type="text" id="address" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="address" placeholder="Address" />

                    <input type="text" id="email" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="email" placeholder="Email" />

                    <input type="password" id="password" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="password" placeholder="Password" />

                    <input type="password" id="password_confirmation" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="password_confirmation" placeholder="Confirm Password" />

                    <button type="submit" class="w-full text-center py-3 rounded bg-green-500 text-white hover:bg-green-600 focus:outline-none my-1">Create Account</button>
                    <div class="text-center text-sm text-gray-600 mt-4">
                        By signing up, you agree to the
                        <a class="no-underline border-b border-gray-600 text-gray-600 hover:border-gray-800" href="#">Terms of Service</a> and
                        <a class="no-underline border-b border-gray-600 text-gray-600 hover:border-gray-800" href="#">Privacy Policy</a>
                    </div>
                </form>
                <!-- Success message element -->
                <div id="successMessage" class="hidden text-center text-green-600 mt-4">
                    Registered Successfully!
                </div>
            </div>

            <div class="text-gray-600 mt-6">
                Already have an account?
                <a class="no-underline border-b border-blue-600 text-blue-600 hover:border-blue-800" href="{{ route('userlogin') }}">Log in</a>.
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            const name = document.getElementById('name').value;
            const phone = document.getElementById('phone').value;
            const address = document.getElementById('address').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const password_confirmation = document.getElementById('password_confirmation').value;

            if (name.trim() === '') {
                alert('Please enter your Full Name.');
                return false;
            }

            if (phone.trim() === '') {
                alert('Please enter your Phone number.');
                return false;
            }

            if (address.trim() === '') {
                alert('Please enter your Address.');
                return false;
            }

            if (email.trim() === '') {
                alert('Please enter your Email.');
                return false;
            } else if (!isValidEmail(email)) {
                alert('Please enter a valid Email address.');
                return false;
            }

            if (password.trim() === '') {
                alert('Please enter a Password.');
                return false;
            }

            if (password !== password_confirmation) {
                alert('Passwords do not match.');
                return false;
            }

            // If the form passes validation, you can allow the form submission
            showSuccessMessage();
            return true;
        }

        function isValidEmail(email) {
            // Basic email validation using a regular expression
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function showSuccessMessage() {
            // Show the success message element by removing the "hidden" class
            const successMessage = document.getElementById('successMessage');
            successMessage.classList.remove('hidden');

            // Hide the success message after a few seconds
            setTimeout(() => {
                successMessage.classList.add('hidden');
            }, 3000);
        }
    </script>
</body>

</html>
