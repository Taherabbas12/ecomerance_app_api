<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مقارنة بين فئتين</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .category-container {
            margin-bottom: 40px;
        }

        .category-title {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mb-4">مقارنة بين فئتين</h2>

        <div class="category-container">
            <h3 class="category-title">{{ $category1->name }}</h3>
            <div class="row">
                @foreach($productsCategory1 as $product)
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="https://via.placeholder.com/150" class="img-fluid" alt="Product Image">
                            <h5 class="mt-2">{{ $product->name }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="category-container">
            <h3 class="category-title">{{ $category2->name }}</h3>
            <div class="row">
                @foreach($productsCategory2 as $product)
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="https://via.placeholder.com/150" class="img-fluid" alt="Product Image">
                            <h5 class="mt-2">{{ $product->name }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- زر لحفظ المقارنة -->
        <form action="{{ route('save.comparison') }}" method="POST">
            @csrf
            <input type="hidden" name="category_id_1" value="{{ $category1->id }}">
            <input type="hidden" name="category_id_2" value="{{ $category2->id }}">
            <button type="submit" class="btn btn-primary">حفظ المقارنة</button>
        </form>

    </div>
</body>

</html>