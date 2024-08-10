<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Tajawal', sans-serif;
        }

        .navbar {
            margin-bottom: 30px;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .welcome-container {
            text-align: center;
            margin-top: 50px;
        }

        .option-card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .option-card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 30px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .btn-primary {
            margin-top: 20px;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #138496;
        }
    </style>
</head>

<body>


    <div class="container welcome-container">
        <h1 class="mb-4">Welcome to Our Website</h1>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card option-card">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">Explore our categories to find what you need.</p>
                        <a href="{{ route('categories.index') }}" class="btn btn-primary">View Categories</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card option-card">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">Browse our product range and find your desired items.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">View Products</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card option-card">
                    <div class="card-body">
                        <h5 class="card-title">similar-categories</h5>
                        <p class="card-text">Browse our similar-categories or add similar-categories.</p>
                        <a href="{{ route('similar.categories') }}" class="btn btn-primary">View Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>