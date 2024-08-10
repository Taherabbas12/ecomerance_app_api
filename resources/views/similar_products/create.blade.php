<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة منتج مشابه</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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

        .form-control {
            border-radius: 4px;
        }

        .btn-primary {
            width: 100%;
            border-radius: 4px;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="form-title">إضافة منتج مشابه</h2>
                    <form action="{{ route('products.similar.store', ['product' => $product->id]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label">فئة المنتج</label>
                            <select class="form-control" id="category" name="category_id">
                                @foreach ($allCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="similar_product" class="form-label">اسم المنتج</label>
                            <div class="dropdown">
                                <input type="text" class="form-control" id="similar_product" name="similar_product_name"
                                    autocomplete="off" placeholder="ابحث عن المنتج..."
                                    onkeyup="searchProduct(this.value)">
                                <div class="dropdown-menu" id="search-results"></div>
                            </div>
                        </div>
                        <input type="hidden" id="similar_product_id" name="similar_product_id">
                        <button type="submit" class="btn btn-primary">إضافة منتج مشابه</button>
                    </form>
                    <h3 class="mt-4">منتجات من نفس الفئة</h3>
                    <ul class="list-group">
                        @foreach ($similarCategoryProducts as $similarProduct)
                            <li class="list-group-item">{{ $similarProduct->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function searchProduct(query) {
            if (query.length > 2) {
                fetch(`/products/search?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        let results = document.getElementById('search-results');
                        results.innerHTML = '';
                        data.forEach(product => {
                            let item = document.createElement('a');
                            item.classList.add('dropdown-item');
                            item.href = '#';
                            item.textContent = product.name;
                            item.onclick = () => selectProduct(product);
                            results.appendChild(item);
                        });
                        results.classList.add('show');
                    });
            }
        }

        function selectProduct(product) {
            document.getElementById('similar_product').value = product.name;
            document.getElementById('similar_product_id').value = product.id;
            document.getElementById('search-results').classList.remove('show');
        }
    </script>
</body>

</html>