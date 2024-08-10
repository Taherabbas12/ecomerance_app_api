<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختيار الفئات للمقارنة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="form-title">مقارنة بين فئتين</h2>
                    <form action="{{ route('categories.compare') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category_id_1" class="form-label">اختر الفئة الأولى</label>
                            <select class="form-control" id="category_id_1" name="category_id_1">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category_id_2" class="form-label">اختر الفئة الثانية</label>
                            <select class="form-control" id="category_id_2" name="category_id_2">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">مقارنة الفئات</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>