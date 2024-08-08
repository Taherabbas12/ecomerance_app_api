<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Tajawal', sans-serif;
        }

        .products-title {
            color: #343a40;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            text-align: center;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-img-top {
            border-radius: 10px;
        }

        .card-title {
            color: #495057;
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 15px;
        }

        .card-text {
            color: #6c757d;
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .card-price {
            color: #28a745;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #17a2b8;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #138496;
        }

        .btn-success {
            background-color: #138496;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="products-title">المنتجات</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">إضافة منتج جديد</a>
        <div class="row">
            @foreach($products as $product)

                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://via.placeholder.com/450" class="card-img-top" alt="Product Image">
                        <a href="{{ route('products.show', $product->id) }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-price">السعر: ${{ $product->price }}</p>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-success">أضف إلى
                                    السلة</a>
                            </div>
                        </a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</body>

</html>