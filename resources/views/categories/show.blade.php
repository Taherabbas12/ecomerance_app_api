<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Tajawal', sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        .category-title {
            color: #343a40;
            font-size: 2rem;
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

        .card-body {
            text-align: center;
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

        .btn-primary {
            background-color: #17a2b8;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
            text-align: center;
            display: block;
            margin: 20px auto;
        }

        .btn-primary:hover {
            background-color: #138496;
        }

        .btn-success {
            background-color: #28a745;
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

    <div class="container">
        <h2 class="category-title">{{ $category->name }}</h2>

        <div class="subcategories-container mb-4">
            <h4 class="text-center mb-4">Subcategories</h4>
            <div class="row">
                @if($subCategories->isEmpty())
                    <div class="col-12">
                        <p class="text-center">No subcategories found.</p>
                    </div>
                @else
                    @foreach($subCategories as $subCategory)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $subCategory->name }}</h5>
                                    <a href="{{ route('categories.show', $subCategory->id) }}" class="btn btn-primary">View
                                        Subcategory</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="products-container">
            <h4 class="text-center mb-4">Products</h4>
            @if($products->isEmpty())
                <p class="text-center">No products found.</p>
            @else
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="https://via.placeholder.com/450" class="card-img-top" alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-price">Price: ${{ $product->price }}</p>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-success">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>