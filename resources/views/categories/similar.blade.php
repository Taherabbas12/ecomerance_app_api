<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الفئات المتشابهة</title>
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

        .category-pair {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .category-names {
            display: flex;
            align-items: center;
        }

        .category-names h5 {
            margin: 0 15px;
            font-weight: bold;
        }

        .arrow {
            font-size: 24px;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('categories.compare.form') }}" class="btn btn-primary">انتقل إلى نموذج اختيار
                الفئات</a>
        </div>

        <h2 class="mb-4">الفئات المتشابهة</h2>

        @foreach($similarCategories as $similarCategory)
            <div class="category-pair">
                <div class="category-names">
                    <h5>{{ $similarCategory->category->name }}</h5>
                    <span class="arrow">&rarr;</span>
                    <h5>{{ $similarCategory->similarCategory->name }}</h5>
                </div>
                <form action="{{ route('delete.similar.category', $similarCategory->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                </form>
            </div>
        @endforeach

    </div>
</body>

</html>