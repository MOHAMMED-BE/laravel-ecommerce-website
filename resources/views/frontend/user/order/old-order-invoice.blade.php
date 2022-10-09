<!doctype html>
<html lang="en">
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: green;
            margin-left: 35px;
        }

        .thanks p {
            color: green;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }

        .td-align {
            text-align: center;
        }
    </style>

</head>

<body>

    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <h2 style="color: green; font-size: 26px;"><strong>Shopping Room</strong> <img src="" alt=""></h2>
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


    <table width="100%" style="background:white; padding:2px;""></table>

  <table width=" 100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
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
                <h3><span style="color: green;">Invoice:</span> {{$order->invoice_no}}</h3>
                Order Date: {{$order->order_date}} <br>
                Payment Type : {{$order->payment_method}} </span>
                </p>
            </td>
        </tr>
    </table>
    <br />
    <h3>Products</h3>


    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
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
            @endforeach
        </tbody>
    </table>
    <br>
    <table width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td align="right">
                <h2><span style="color: green;">Subtotal:</span> ${{$order->amount}}</h2>
                <h2><span style="color: green;">Total:</span> ${{$order->amount}}</h2>
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