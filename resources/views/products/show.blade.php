<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل المنتج</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Tajawal', sans-serif;
        }

        .product-title {
            color: #343a40;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .product-description {
            color: #6c757d;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .product-price {
            color: #28a745;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .total-price {
            color: #dc3545;
            font-size: 1.5rem;
            font-weight: 500;
            margin-top: 10px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .quantity-control button {
            border: none;
            background-color: #fff;
            font-size: 1.5rem;
            padding: 0 15px;
            cursor: pointer;
            color: #495057;
        }

        .quantity-control input {
            width: 60px;
            text-align: center;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin: 0 10px;
            font-size: 1.2rem;
        }

        .add-to-cart-btn {
            background-color: #17a2b8;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 25px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        .add-to-cart-btn:hover {
            background-color: #138496;
        }

        .similar-products-title {
            color: #343a40;
            font-size: 2rem;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .card-title {
            color: #495057;
            font-size: 1.1rem;
            margin-top: 10px;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            border-radius: 5px;
        }

        .container {
            max-width: 960px;
            margin-top: 40px;
        }

        img.product-image {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="product-title">{{ $product->name }}</h1>
                <p class="product-description">{{ $product->description }}</p>
                <p class="product-price">السعر: ${{ $product->price }}</p>
                <p class="total-price">المجموع: $<span id="total-price">{{ $product->price }}</span></p>

                <div class="quantity-control">
                    <button type="button" onclick="decreaseQuantity()">-</button>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" onchange="updateTotalPrice()">
                    <button type="button" onclick="increaseQuantity()">+</button>
                </div>
                <button class="add-to-cart-btn">أضف إلى السلة</button>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/450" class="img-fluid product-image" alt="Product Image">
            </div>
        </div>

        <h2 class="similar-products-title">منتجات مشابهة</h2>
        <div class="row">
            @foreach($similarProducts as $similarProduct)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="https://via.placeholder.com/450" class="card-img-top" alt="Similar Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $similarProduct->name }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function decreaseQuantity() {
            var quantity = document.getElementById('quantity');
            if (quantity.value > 1) {
                quantity.value--;
                updateTotalPrice();
            }
        }

        function increaseQuantity() {
            var quantity = document.getElementById('quantity');
            quantity.value++;
            updateTotalPrice();
        }

        function updateTotalPrice() {
            var quantity = document.getElementById('quantity').value;
            var price = {{ $product->price }};
            var totalPrice = quantity * price;
            document.getElementById('total-price').innerText = totalPrice;
        }
    </script>
</body>

</html>