
@include('user.navbar')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>About Us- Emporium</title>


<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-bold mb-4">About Our Store</h1>
        <div class="flex flex-wrap items-center justify-center mb-8">
            <img class="w-48 h-48 mx-4 my-2" src="{{asset('images\logo.jpg')}}" alt="Store Logo">
            <img class="w-48 h-48 mx-4 my-2" src="{{asset('images\product\6472d8c164172.jpg')}} " alt="Product Photos">
        </div>

        <p class="text-lg text-gray-700 mb-8">We are a leading ecommerce store dedicated to providing high-quality products
            and exceptional customer service. With years of experience in the industry, we strive to be your go-to online
            destination for all your shopping needs.</p>

        <h2 class="text-2xl font-bold mb-4">Our Mission</h2>
        <p class="text-lg text-gray-700 mb-8">At our store, our mission is to deliver top-notch products that enhance
            your lifestyle and bring you joy. We carefully curate our collection to ensure that you find exactly what
            you're looking for, whether it's the latest fashion trends, home decor items, or unique gifts.</p>

        <h2 class="text-2xl font-bold mb-4">Why Choose Us?</h2>
        <ul class="list-disc list-inside text-lg text-gray-700 mb-8">
            <li>Wide selection of high-quality products</li>
            <li>Fast and reliable shipping</li>
            <li>Secure and convenient online shopping experience</li>
            <li>Exceptional customer support</li>
            <li>Competitive prices</li>
        </ul>

        <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
        <p class="text-lg text-gray-700 mb-2">If you have any questions or need assistance, our dedicated support team is
            here to help. Please feel free to reach out to us through any of the following channels:</p>
        <ul class="list-disc list-inside text-lg text-gray-700 mb-8">
            <li>Email: info@example.com</li>
            <li>Phone: 123-456-7890</li>
            <li>Live Chat: Visit our website and click on the chat icon</li>
        </ul>

        <div class="flex flex-wrap items-center justify-center mb-8">
            <img class="w-48 h-48 mx-4 my-2" src="your-team-image1.jpg" alt="Team Photo 1">
            <img class="w-48 h-48 mx-4 my-2" src="your-team-image2.jpg" alt="Team Photo 2">
            <img class="w-48 h-48 mx-4 my-2" src="your-team-image3.jpg" alt="Team Photo 3">
        </div>

        <p class="text-lg text-gray-700">Thank you for choosing our store. We look forward to serving you!</p>
    </div>
</body>


