<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <link href="{{ public_path('assets/pdf.css') }}" rel="stylesheet">

</head>

<body>

    <table width="100%" class="table-1">
        <tr>
            <td valign="top">
                <h2 style="color: #ef750c; font-size: 26px;"><strong>Shopping Room</strong></h2>
            </td>
            <td align="right">
                <pre class="font">
               Shopping Room Head Office
               Email : support@shoppingroom.com <br>
               Phone : +21268367549 <br>
               Moroco, Oujda <br>
            </pre>
            </td>
        </tr>

    </table>


    <table width=" 100%" class="font table-2">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Name:</strong> {{$order->name}} <br>
                    <strong>Email:</strong> {{$order->email}} <br>
                    <strong>Phone:</strong> {{$order->phone}} <br>

                    @php
                    $div = $order->division->division_name;
                    $dis = $order->district->district_name;
                    $state = $order->state->state_name;
                    @endphp

                    <strong>Address:</strong> {{$div}},{{$dis}},{{$state}} <br>
                    <strong>Post Code:</strong> {{$order->post_code}}
                </p>
            </td>
            <td>
                <p class="font">
                <h3><span style="color: #ef750c;">Invoice:</span> {{$order->invoice_no}}</h3>
                Order Date: {{$order->order_date}} <br>
                Payment Type : {{$order->payment_method}} </span>
                </p>
            </td>
        </tr>
    </table>
    <h3>Products</h3>

    <table width="100%" class="table-3">
        <thead class="table-header">
            <tr class="font">
                <th>Image</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Color</th>
                <th>Code</th>
                <th>Quantity</th>
                <th>Unit Price </th>
                <th>Total </th>
            </tr>
        </thead>
        <tbody>

            @foreach($orderItem as $item)

            <tr class="font">
                <td class="td-align">
                    <img src="{{public_path($item->product->product_thumbnail)}}" class="any-img" height="60px;" width="60px;" alt="">
                </td>
                <td class="td-align">{{$item->product->product_name_en}}</td>
                <td class="td-align">
                    @if($item->size == NULL)
                    ---
                    @else
                    {{$item->size}}
                    @endif
                </td>
                <td class="td-align">
                    @if($item->color == NULL)
                    ---
                    @else
                    {{$item->color}}
                    @endif
                </td>
                <td class="td-align">{{$item->product->product_code}}</td>
                <td class="td-align">{{$item->qty}}</td>
                <td class="td-align">${{$item->price}}</td>
                <td class="td-align">${{$item->price * $item->qty}}</td>
            </tr>
            <hr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table style="padding: 0 10px 0 0;width: 14%;float: right;">
        <tr>
            <td align="right">
                <h2><span style="color: #ef750c;">Total Price :</span> ${{$order->amount}}</h2>
            </td>
        </tr>
    </table>
    <div class="thanks mt-3">
        <p>Thanks For Buying Products..!!</p>
    </div>
    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Authority Signature:</h5>
    </div>
</body>

</html>