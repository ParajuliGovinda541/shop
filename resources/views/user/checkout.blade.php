@include('layouts.message')
@include('links.links')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="grid grid-cols-2 gap-4">
    <div class="leading-loose j">
        <div class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
            <h2 class="text-gray-800 font-medium mb-4">Customer Information</h2>
            <div class="mb-2">
                <label class="block text-sm text-gray-600" for="cus_name">Name</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" name="person_name" type="text" required="" placeholder="Your Name" aria-label="Name" value="{{auth()->user()->name}}">
            </div>
            <div class="mb-2">
                <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_email" name="email" type="text" required="" placeholder="Your Email" aria-label="Email" value="{{auth()->user()->email}}">
            </div>
            <div class="mb-2">
                <label class="block text-sm text-gray-600" for="phone">Phone</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="phone" name="phone" type="text" required="" placeholder="Phone Number" aria-label="phone" value="{{auth()->user()->phone}}">
            </div>
            <div class="mb-2">
                <label class="block text-sm text-gray-600" for="street">Shipping Address</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="street" name="street" type="text" required="" placeholder="Street" aria-label="Shipping Address" value="{{auth()->user()->street}}">
            </div>
            <div class="mb-2">
                <label class="block text-sm text-gray-600" for="city">City</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="city" name="city" type="text" required="" placeholder="City" aria-label="City" value="{{auth()->user()->city}}">
            </div>
            <div class="inline-block w-1/2 pr-1">
                <label class="block text-sm text-gray-600" for="country">Country</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="country" name="country" type="text" required="" placeholder="Country" aria-label="Country" value="{{auth()->user()->country}}">
            </div>
            <div class="inline-block -mx-1 pl-1 w-1/2">
                <label class="block text-sm text-gray-600" for="zip">Zip</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="zip"  name="zipcode" type="text" required="" placeholder="Zip" aria-label="Zip" value="{{auth()->user()->zip}}">
            </div>
            <h2 class="mt-4 text-gray-800 font-medium">Payment Information</h2>
            <div class="mb-2">
                <label class="block text-sm text-gray-600" for="paymentMethodSelect">Card</label>
                <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" onchange="paymentMethod(this.value)" id="paymentMethodSelect" name="payment_method" required="" aria-label="Payment Method">
                    <option>Select Payment Method</option>
                    <option value="COD">Cash On Delivery</option>
                    <option value="KHALTI">Khalti</option>
                </select>
            </div>
            <div class="mt-4">
                <button onclick="submitdata()" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">GO</button>
                <a href="{{route('user.mycart')}}" class="px-4 ml-6 py-1 text-white font-light tracking-wider bg-red-500 rounded" type="submit">Cancel</a>
            </div>
        </div>
    </div>
    <div class="leading-loose j">
        <div class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
            <h2 class="text-gray-800 font-medium mb-4">Order Summary</h2>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-3">S.N</th>
                        <th scope="col" class="px-2 py-3">Product Image</th>
                        <th scope="col" class="px-2 py-3">Name</th>
                        <th scope="col" class="px-2 py-3">Quantity</th>
                        <th scope="col" class="px-2 py-3">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sn = 1 @endphp
                    @foreach ($carts as $cart)
                    <tr>
                        <td class="px-6 py-4">{{ $sn++ }}</td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('images/product/' . $cart->image_url) }}" alt="{{ asset('images/cart/' . $cart->image_url) }}" width="60" class="rounded-full">
                        </td>
                        <td class="px-6 py-4">{{ $cart->product->product_name }}</td>
                        <td class="px-6 py-4">{{ $cart->qty }}</td>
                        <td class="px-6 py-4">{{ $cart->product->price * $cart->qty }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<script>

  var cus_name  ;
  var cus_email  ;
  var phone  ;
  var street ;
  var city ;
  var zip  ;
  var country ;
  var paymentMethodSelect ;
  var checkout;
  


function paymentMethod(method)
{

    paymentMethodSelect=method;
    
    //  console.log(data);
}

  function submitdata()
  {

   cus_name = document.getElementById('cus_name').value;
   cus_email = document.getElementById('cus_email').value;
   phone = document.getElementById('phone').value;
   street = document.getElementById('street').value;
   city = document.getElementById('city').value;
   zip = document.getElementById('zip').value;
   country = document.getElementById('country').value;


   var data={
    data:{
    
        person_name:cus_name,
        // cus_email:cus_email,
        phone:phone,
        street:street,
        city:city,
        zipcode:zip,
        country:country,    
        


    },
    _token:"{{csrf_token()}}"
  };


    if(paymentMethodSelect=='KHALTI')
    {

        khalti(data);
        checkout.show({amount: 1000});
      
        // console.log(paymentMethodSelect);
    } 
    if(paymentMethodSelect=='COD')
    {

    //   data->data->paymentMethod='COD';
            data['data']['payement_method']='COD';

        loadAjaxContent(data);
    }

  }

// Ajax
function loadAjaxContent(data) {
        $.ajax({
            url: "{{route('order.orderedproduct')}}", // Replace with your AJAX endpoint URL
            type: 'post', // Change to 'POST' if needed
            data:data,
            success: function (response) {
                // The AJAX request was successful.
                // 'data' contains the response from the server.
                window.location.href="{{route('user.orderedproduct')}}";
                
                console.log(response);
            },
            error: function (xhr, status, error) {
                // An error occurred during the AJAX request.
                console.error(error);
            }
        });
    }


   function khalti(data)
   {
    var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_1ce4119b85e24790bdd97f9e236067ff",
            "productIdentity": "{{auth()->user()->id}}",
            "productName": "{{auth()->user()->name}}",
            "productUrl": "http://127.0.0.1:8000/user/viewproduct/11",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                    


          $.ajax({
            type: 'POST',
          url: "{{route('user.khalti.verify')}}",
          data:{
            _token:"{{ csrf_token() }}",
            data:payload,
          },
            
          datatype:'json',
         
          success: function(response) {
            console.log(response);

               data['data']['payement_method']='KHALTI';

               loadAjaxContent(data);

          },
          error: function(xhr, status, error) {
            console.log("Error: " + error);
          }
        });





                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

         checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
      
        
   }

</script>

</body>
</html>
