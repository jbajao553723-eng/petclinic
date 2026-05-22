<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Service</title>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f8fc;
        }

        .card-soft {
            max-width: 520px;
            margin: 70px auto;
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #eef2f7;
            padding: 25px;
        }

        .title {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
        }

        .sub {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 20px;
        }

        .btn-primary {
            border-radius: 10px;
            font-weight: 600;
        }

        .form-control {
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="card-soft">

    <!-- HEADER -->
    <div class="title">Edit Service</div>
    <div class="sub">Update service details below</div>

    <!-- FORM -->
    <form method="POST" action="{{ route('services.update', $service->id) }}">
        @csrf
        @method('PUT')

        <!-- NAME -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Service Name</label>
            <input type="text"
                   name="name"
                   value="{{ $service->name }}"
                   class="form-control"
                   required>
        </div>

        <!-- PRICE -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Price</label>
            <input type="number"
                   name="price"
                   value="{{ $service->price }}"
                   class="form-control"
                   required>
        </div>

        <!-- BUTTONS -->
        <button class="btn btn-primary w-100 mb-2">
            Update Service
        </button>

        <a href="{{ route('services.index') }}" class="btn btn-light w-100">
            Cancel
        </a>

    </form>

</div>

</body>
</html>