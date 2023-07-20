<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Sipariş Detayı</h1>
Müşteri Ad Soyad : <h3>{{$order->name}}</h3>
Müşteri Email : <h3>{{$order->email}}</h3>
Müşteri Telefon : <h3>{{$order->phone}}</h3>
Müşteri Adresi : <h3>{{$order->address}}</h3>
Müşteri ID : <h3>{{$order->user_id}}</h3>
Ürün Adı : <h3>{{$order->product_title}}</h3>
Ürün Ücreti : <h3>{{$order->price}}</h3>
Ürün Adeti : <h3>{{$order->quantity}}</h3>
Ödeme Durumu : <h3>{{$order->payment_status}}</h3>
Ürün ID : <h3>{{$order->product_id}}</h3>
</body>
</html>
