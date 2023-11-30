<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Szczegóły Zamówienia</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 0;
            border: 1px solid #ddd;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            border-bottom: 2px solid #000000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #2d3031;
            font-size: 28px;
            margin: 0;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h3 {
            color: #2d3031;
            font-size: 22px;
            margin-bottom: 10px;
        }
        .section p {
            font-size: 16px;
            line-height: 1.5;
            margin: 5px 0;
        }
        .total {
            font-weight: bold;
            font-size: 18px;
            text-align: right;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Faktura</h1>
        </div>
        @foreach ($orderDetails as $paymentMethod)
            <div class="section order-details">
                
                @foreach ($paymentMethod->ordersDetails as $deliveryDetail)
                    <h3>Dane</h3>
                    <p>Imię i nazwisko: {{ $deliveryDetail->name }}</p>
                    <div class="section delivery-details">
                        <h3>Adres</h3>
                        <p>{{ $deliveryDetail->city }}, ul.{{ $deliveryDetail->street }} {{ $deliveryDetail->house_number }}/{{ $deliveryDetail->apartment_number }}</p>
                        <p>{{ $deliveryDetail->postal_code }} {{ $deliveryDetail->post_office }}</p>
                    </div>
                    <h3>Metoda płatności</h3>
                    <p>{{ App\Enums\PaymentMethodEnum::fromName($paymentMethod->payment_method)->value }}</p>
                    <div class="section services-section">
                        <h3>Usługi</h3>
                        @foreach ($deliveryDetail->orders as $order)
                            <p>{{ $order->service->name }} x{{ $order->quantity }}</p>
                        @endforeach
                    </div>
                @endforeach
                <p class="total">Koszt zakupu: <strong>{{ $paymentMethod->cost }}zł</strong></p>
            </div>
        @endforeach
    </div>
</body>
</html>