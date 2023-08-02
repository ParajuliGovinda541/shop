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
                <form id="signupForm" action="{{ route('user.store') }}" method="POST" onsubmit="return validateForm()">
                    @csrf
                    <h1 class="mb-8 text-3xl text-center font-bold">Sign up</h1>
                    <input type="text" id="name" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="name" placeholder="Full Name" />
                    <span id="nameError" class="hidden text-red-600 text-sm">Please enter your Full Name.</span>

                    <!-- Add similar <span> elements for other fields -->
                    <input type="text" id="phone" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="phone" placeholder="Phone" />
                    <span id="phoneError" class="hidden text-red-600 text-sm">Please enter a valid Phone number.</span>

                    <input type="text" id="address" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="address" placeholder="Address" />
                    <span id="addressError" class="hidden text-red-600 text-sm">Please enter your Address.</span>

                    <input type="text" id="email" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="email" placeholder="Email" />
                    <span id="emailError" class="hidden text-red-600 text-sm">Please enter a valid Email address.</span>

                    <input type="password" id="password" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="password" placeholder="Password" />
                    <span id="passwordError" class="hidden text-red-600 text-sm">Please enter a Password.</span>

                    <input type="password" id="password_confirmation" class="block border border-gray-300 focus:border-green-500 w-full p-3 rounded mb-4" name="password_confirmation" placeholder="Confirm Password" />
                    <span id="passwordConfirmationError" class="hidden text-red-600 text-sm">Passwords do not match.</span>

                    <button type="submit" class="w-full text-center py-3 rounded bg-green-500 text-white hover:bg-green-600 focus:outline-none my-1">Create Account</button>
                    <div class="text-center text-sm text-gray-600 mt-4">
                        <!-- ... (Terms of Service and Privacy Policy links) ... -->
                    </div>
                </form>
                <!-- Success message element -->
                <div id="successMessage" class="hidden text-center text-green-600 mt-4">
                    Registered Successfully! Redirecting to login page...
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

            // Validation for Name
            if (name.trim() === '') {
                displayErrorMessage('name', 'Please enter your Full Name.');
                return false;
            } else {
                hideErrorMessage('name');
            }

            // Validation for Phone
            if (phone.trim() === '') {
                displayErrorMessage('phone', 'Please enter a valid Phone number.');
                return false;
            } else if (!/^\d{10}$/.test(phone.trim())) {
                displayErrorMessage('phone', 'Phone number must be 10 digits.');
                return false;
            } else {
                hideErrorMessage('phone');
            }

            // Validation for Address
            if (address.trim() === '') {
                displayErrorMessage('address', 'Please enter your Address.');
                return false;
            } else {
                hideErrorMessage('address');
            }

            // Validation for Email
            if (email.trim() === '') {
                displayErrorMessage('email', 'Please enter your Email.');
                return false;
            } else if (!isValidEmail(email)) {
                displayErrorMessage('email', 'Please enter a valid Email address.');
                return false;
            } else {
                hideErrorMessage('email');
            }

            // Validation for Password
            if (password.trim() === '') {
                displayErrorMessage('password', 'Please enter a Password.');
                return false;
            } else {
                hideErrorMessage('password');
            }

            // Validation for Password Confirmation
            if (password !== password_confirmation) {
                displayErrorMessage('password_confirmation', 'Passwords do not match.');
                return false;
            } else {
                hideErrorMessage('password_confirmation');
            }

            // If the form passes validation, you can allow the form submission
            showSuccessMessage();
            return true;
        }

        function displayErrorMessage(field, message) {
            const errorMessage = document.getElementById(`${field}Error`);
            errorMessage.innerText = message;
            errorMessage.classList.remove('hidden');
        }

        function hideErrorMessage(field) {
            const errorMessage = document.getElementById(`${field}Error`);
            errorMessage.classList.add('hidden');
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
                // Redirect to the login page after the success message is displayed
                window.location.href = "{{ route('userlogin') }}";
            }, 3000);
        }
    </script>
</body>

</html>
