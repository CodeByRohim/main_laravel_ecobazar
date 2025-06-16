{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Payment</title>
</head>
<body>
  <h2>Invoice</h2>
  <p>Name: {{ $data['name'] }}</p>
  <p>Amount: ${{ $data['amount'] }}</p>
  <p>Transaction ID: {{ $data['txn_id'] }}</p>
  <p>thanks,</p>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9;
        }
        .invoice-box {
            max-width: 700px;
            margin: 20px auto;
            background: #fff;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        }
        .invoice-box table {
            width: 100%;
            line-height: 24px;
            border-collapse: collapse;
        }
        .invoice-box td {
            padding: 8px;
            vertical-align: top;
        }
        .invoice-box tr.heading td {
            background: #f0f0f0;
            font-weight: bold;
        }
        .invoice-box tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box .total {
            font-weight: bold;
            text-align: right;
            padding-top: 10px;
        }
        .text-right {
            text-align: right;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<div class="invoice-box">
    <h2>Invoice</h2>
    <p><strong>Invoice ID:</strong> #{{ $data['invoice_id'] ?? '' }}</p>
    <p><strong>Date:</strong> {{ $data['date'] ?? '' }}</p>
    <p><strong>Billed To:</strong> {{ $data['name'] }}</p>
    <p><strong>Billed To:</strong> {{ $data['txn_id'] }}</p>
    
    <table>
        <tr class="heading">
            <td>Item</td>
            <td class="text-right">Price</td>
        </tr>

        {{-- @foreach($data['items'] as $item ?? '')
            <tr class="item">
                <td>{{ $item['name'] ?? '' }}</td>
                <td class="text-right">${{ number_format($item['price'], 2) ?? '' }}</td>
            </tr>
        @endforeach --}}

        <tr class="total">
            <td>Total:</td>
            <td class="text-right">${{ $data['amount'] }}</td>
        </tr>
    </table>

    <p style="margin-top: 30px; font-size: 13px; color: #888;">
        Thank you for your purchase. If you have any questions, contact us at support@arohim17577@gmail.com.
    </p>
</div>
</body>
</html>
