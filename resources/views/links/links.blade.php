@vite(['resources/css/app.css', 'resources/js/app.js'])

{{-- // jquery ko link deko --}}
<script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>  

{{-- css ko link --}}
<link rel="stylesheet" href="{{asset('datatable/datatables.css')}}">

{{-- font ko link --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">



{{-- javascript code --}}

<script src="{{asset('datatable/datatables.js')}}"></script>
<script src="{{asset('fontfolder/js/fontawesome.min.js')}}"></script>
<!-- Add this in your layout -->
<script src="{{ asset('livewire/livewire.js') }}"></script>
<!-- Add this in your layout -->
<script src="{{ asset('js/alpine.js') }}"></script>
<script src="{{ asset('livewire/livewire.js') }}"></script>

