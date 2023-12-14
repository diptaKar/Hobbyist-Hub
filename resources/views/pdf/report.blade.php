<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hobbyist Hub Report</title>
    <!-- Include any additional stylesheets or styles specific to your PDF layout -->
</head>
<body>
    <h1>Hobbyist Hub Report</h1>

    <div>
        <p>New Customers Today: {{ $newCustomersToday }}</p>
        
        <p>Products Added Today:</p>
        <ul>
            @foreach ($productsAddedToday as $product)
                <li>{{ $product->title }} - Quantity: {{ $product->qty }}</li>
            @endforeach
        </ul>

        <p>Orders Today:</p>
        <ul>
            @foreach ($ordersToday as $order)
                <li>Order ID: {{ $order->id }} - Product Description: {{ $order->p_description }}</li>
            @endforeach
        </ul>

        <!-- Include any additional HTML content or styles specific to your PDF layout -->
    </div>
</body>
</html>
