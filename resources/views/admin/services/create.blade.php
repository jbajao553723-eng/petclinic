<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Service</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; background:#f5f8fc; }
        .card-soft { max-width:500px; margin:60px auto; background:white; padding:25px; border-radius:14px; border:1px solid #eef2f7; }
    </style>
</head>

<body>

<div class="card-soft">

    <h4 class="fw-bold">Create Service</h4>
    <p class="text-muted small">Add a new clinic service</p>

    <form method="POST" action="{{ route('services.store') }}">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Duration (minutes)</label>
            <input type="number" name="duration" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">
            Save Service
        </button>

    </form>

</div>

</body>
</html>