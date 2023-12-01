<!DOCTYPE html>
<html>
<head>
    <title>Potwierdzenie zamówienia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
        }
        h1, h3 {
            color: #333;
        }
        .details, .order-info {
            background: #e9ecef;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        @foreach ($finalOrderDetails as $paymentMethod)
            <div class="order-block">
                @foreach ($paymentMethod->ordersDetails as $deliveryDetail)
                    <h1>Witaj {{ $deliveryDetail->name }}!</h1>
                    <h3>Twoje zamówienie zostało zrealizowane pomyślnie.</h3>
                    <div class="details">
                        <p><strong>Szczegóły dostawy:</strong></p>
                        <p>Odbiorca: {{ $deliveryDetail->name }}</p>
                        <p>Sposób dostawy: {{ App\Enums\DeliveryMethodEnum::fromName($deliveryDetail->delivery_method)->value }}</p>
                        <p>Adres: {{ $deliveryDetail->postal_code }} {{ $deliveryDetail->post_office }}, {{ $deliveryDetail->city }} ul.{{ $deliveryDetail->street }} {{ $deliveryDetail->house_number }}/{{ $deliveryDetail->apartment_number }}</p>
                    </div>
                    <div class="order-info">
                        <p><strong>Szczegóły zamówienia:</strong></p>
                        <p>Sposób płatności: {{ App\Enums\PaymentMethodEnum::fromName($paymentMethod->payment_method)->value }}</p>
                        <p>Usługi:</p>
                        @foreach ($deliveryDetail->orders as $order)
                            <p>{{ $order->service->name }} x{{ $order->quantity }}</p>
                        @endforeach
                        <p>Koszt zakupu: {{ $paymentMethod->cost }}zł</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</body>
</html>
