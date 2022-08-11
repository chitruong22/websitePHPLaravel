<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .container{
            width: 900px;
            /*background-color: #444444;*/
            color: #C0C0C0;
        }
        .container .header{
            padding: 5px 10px;
            display: flow-root;
            background-color: #E53935;
            color: #2B2B2B;
            font-weight: 500;
            font-size: 12px;
        }
        .content{
            background-color: #444444;
        }
        .content .row{
            margin: 0;
            margin-bottom: 10px;
        }
        .text {
            padding: 10px;
            background-color: #2B2B2B;
            font-size: 12px;
        }
        table{
            width: 100%;
        }
        .back-color{
            background-color: #C4CDD5;
            color: #2B2B2B;
        }
        table tr:first-child{
            background-color: #C4CDD5;
            color: #2B2B2B;
        }
        tr, th ,td{
            border: 1px solid #C4CDD5 !important;
        }
        .footer{
            padding: 10px;
            background-color: #444444;
            font-size: 12px;
        }
        .footer .row{
            margin: 0;
        }
        .copy-right{
            background-color: #E53935;
        }
        .copy-right p{
            font-size: 12px;
            text-align: center;
            padding: 5px 0;
            color: #2B2B2B;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="header">
        <span class="text-left">Date: <?php echo date("Y/m/d");?></span>
    </div>
    <div class="content pl-3">
        <div class="row">
            <div class="col-4 mb-3">
                <div class="img">
                    <img src="{{URL::asset('img/logo.png')}}" width="20%">
                </div>
            </div>
            <div class="col-8 text-right">
                <span>Công Ty TNHH Đầu Tư và Phát Triển <br> Công Nghệ GT</span>
            </div>
        </div>

        <div class="text">
            <p>Chào mừng khách hàng {{ $order[0]->name }}<br>
            Cám ơn quý khách đã quan tâm và sử dụng dịch vụ của Graphics Tablet</p>
            <table class="mb-2">
                <tr>
                    <th colspan="2">Thông tin đặt hàng:</th>
                </tr>
                <tr>
                    <td>Khách hàng: <strong>{{ $order[0]->name }}</strong></td>
                    <td>Điện thoại: <strong>{{ $order[0]->phone }}</strong></td>
                </tr>
                <tr>
                    <td>Địa chỉ: <strong>{{ $order[0]->address }}</strong></td>
                    <td>Email: <strong> {{ $order[0]->email }}</strong></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="3">Thông tin đơn hàng:</th>
                </tr>
                <tr>
                    <td>Mã đơn hàng: <strong>{{ $order[0]->id_order }}</strong></td>
                    <td colspan="2">Tình trạng thanh toán: <strong>{{ $order[0]->payment_status }}</strong></td>
                </tr>
                <?php
                    foreach ($order_detail as $item){
                ?>
                <tr>
                    <td>Sản phẩm: <strong>{{ $item->product_name }}</strong></td>
                    <td>Số lượng: <strong>{{ $item->quantity}}</strong></td>
                    <td>Đơn giá: <strong>{{ number_format($item->price,3,".",".") }} đ</strong></td>
                </tr>
                <?php
                }
                ?>
                <tr class="back-color">
                    <td colspan="3"><strong>Tổng tiền: {{  number_format($order[0]->total,3,".",".") }} đ</strong></td>
                </tr>
            </table>
            <tr>
        </div>
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-4">
                <div class="img">
                    <img src="{{URL::asset('img/logo.png')}}" width="20%">
                </div>
            </div>
            <div class="col-8">
                <p>
                    Địa chỉ: Số 288 Đường Nguyễn Văn Linh, Hưng Lợi, Ninh Kiều, Cần Thơ<br>
                    Số điện thoại: +84 888 222 999<br>
                    Email: graphicstablet@gmail.com<br>
                </p>
            </div>
        </div>
    </div>
    <div class="copy-right">
       <p>©2021 - Bản quyền thuộc về Graphics Tablet</p>
    </div>
</div>
</body>
</html>
