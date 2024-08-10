<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Root Categories</title>
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
            border-radius: 8px;
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
    </style>
</head>

<body>

    <div class="container">
        <h2 class="category-title">Root Categories</h2>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('categories.compare.form') }}" class="btn btn-primary">انتقل إلى نموذج اختيار
                الفئات</a>
        </div>


        <div class="row">
            @if($categories->isEmpty())
                <div class="col-12">
                    <p class="text-center">No root categories found.</p>
                </div>
            @else
                @foreach($categories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card category-card" onclick="location.href='{{ route('categories.show', $category->id) }}'">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>