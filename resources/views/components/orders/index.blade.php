<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ORders</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>
<body>
    @php use Carbon\Carbon; @endphp
<nav class="bg-gray-700 p-4 mb-3">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-white">Orders</h1>
    </div>
</nav>
<div class="container mx-auto">
    <div class="mb-4">
        <input type="text" id="searchInput" placeholder="Search orders..."
            class="w-full py-2 px-3 rounded-md shadow-md focus:outline-none focus:ring focus:border-blue-300">
    </div>
    
    
    @if(count($orders) < 1)
    <div class="flex items-center justify-center w-full">
        <h3 class="text-xl text-gray-700">There are no orders at the moment</h3>
    </div>
    @endif
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-1" id="content-loaded">
        @foreach($groupedOrders as $orderNumber => $group)
        <div class="border p-4 rounded-lg bg-gray-200 flex flex-col justify-between">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-xl font-semibold">Order #: {{ $orderNumber }}</h2>
                
                <a href="{{ route('order.done', $orderNumber) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Done</a>
            </div>
            <!-- List of orders -->
            <ul>
            @foreach($group as $order)
                @php
                    $carbonTimestamp = Carbon::parse($order['created_at']);
                    $timeAgo = $carbonTimestamp->diffForHumans();
                @endphp
                <li class="mb-2">
                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{ $order['quantity'] }} {{ $order['menu'] }}
                    <hr>
                </li> 
            @endforeach
            </ul>
            <span class="mt-5">{{ $timeAgo }}</span> 
        </div>
        @endforeach
    </div>  
</div>
<script>
    // Get a reference to the search input field
    const searchInput = document.getElementById('searchInput');

    // Get all order containers
    const orderContainers = document.querySelectorAll('.border');

    // Attach an event listener to the search input
    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase();

        // Loop through each order container
        orderContainers.forEach((container) => {
            const orderText = container.textContent.toLowerCase();

            // Check if the order text contains the search term
            if (orderText.includes(searchTerm)) {
                container.style.display = 'block'; // Show the container
            } else {
                container.style.display = 'none'; // Hide the container
            }
        });
    });
</script>

</body>
</html>