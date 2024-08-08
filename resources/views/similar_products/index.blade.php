<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات المشابهة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- رابط تحميل مكتبة Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .container {
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

        .form-control {
            border-radius: 4px;
        }

        .btn-primary,
        .btn-danger {
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="form-title">المنتجات المشابهة لـ {{ $product->name }}</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- إضافة منتج مشابه جديد -->
        <h4>إضافة منتج مشابه جديد:</h4>
        <form action="{{ route('similarProducts.store', $product->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="similar_product_id" class="form-label">اختر منتج مشابه:</label>
                <select class="form-select" id="similar_product_id" name="similar_product_id" required>
                    <option value="">اختر منتجاً...</option>
                    @foreach($allProducts as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">إضافة</button>
        </form>

        <!-- قائمة المنتجات المشابهة الحالية -->
        <h4>المنتجات المشابهة الحالية:</h4>
        <ul class="list-group mb-4">
            @foreach($product->similarProducts as $similarProduct)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $similarProduct->name }}
                    <form action="{{ route('similarProducts.destroy', [$product->id, $similarProduct->id]) }}" method="POST"
                        onsubmit="return confirm('هل أنت متأكد من إزالة هذا المنتج المشابه؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">إزالة</button>
                    </form>
                </li>
            @endforeach
        </ul>

    </div>

    <!-- روابط تحميل مكتبة Select2 وجافاسكريبت -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // تفعيل مكتبة Select2 على القائمة المنسدلة
        $(document).ready(function () {
            $('#similar_product_id').select2({
                placeholder: 'اختر منتجاً...',
                allowClear: true,
                width: '100%' // لضمان أن القائمة المنسدلة تأخذ عرض الحاوية بالكامل
            });
        });
    </script>
</body>

</html>