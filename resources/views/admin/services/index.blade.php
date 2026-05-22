<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Services Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- GOOGLE FONT -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

:root{
    --bg:#f4f7fb;
    --card:#ffffff;
    --border:#e8edf5;
    --text:#111827;
    --muted:#6b7280;
    --blue:#1a6cf5;
    --blue-soft:#e8f0ff;
    --green:#16a34a;
    --green-soft:#dcfce7;
    --red:#dc2626;
    --red-soft:#fee2e2;
    --shadow:0 10px 30px rgba(15,23,42,.05);
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:var(--bg);
    font-family:'DM Sans',sans-serif;
    color:var(--text);
}

/* PAGE */

.page-wrap{
    max-width:1200px;
    margin:auto;
    padding:40px 22px;
}

/* TOPBAR */

.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:28px;
    gap:20px;
    flex-wrap:wrap;
}

.page-title{
    font-size:30px;
    font-weight:700;
    letter-spacing:-1px;
    margin-bottom:4px;
}

.page-sub{
    color:var(--muted);
    font-size:14px;
}

/* BUTTONS */

.btn-dashboard{
    background:white;
    border:1px solid var(--border);
    border-radius:14px;
    padding:12px 18px;
    text-decoration:none;
    color:var(--text);
    font-weight:600;
    transition:.2s;
    box-shadow:var(--shadow);
}

.btn-dashboard:hover{
    background:#f9fafb;
}

.btn-add{
    background:var(--blue);
    color:white;
    border:none;
    border-radius:14px;
    padding:12px 18px;
    font-weight:600;
    transition:.2s;
}

.btn-add:hover{
    background:#1558ca;
    color:white;
}

/* CARD */

.card-modern{
    background:var(--card);
    border-radius:24px;
    border:1px solid var(--border);
    box-shadow:var(--shadow);
    overflow:hidden;
}

/* TABLE */

.table{
    margin:0;
}

.table thead th{
    background:#f8fafc;
    border-bottom:1px solid var(--border);
    color:var(--muted);
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:.08em;
    padding:18px 22px;
    font-weight:700;
}

.table tbody td{
    padding:20px 22px;
    vertical-align:middle;
    border-bottom:1px solid #f1f5f9;
}

.table tbody tr:last-child td{
    border-bottom:none;
}

.table tbody tr:hover{
    background:#fafcff;
}

.service-name{
    font-weight:700;
    font-size:15px;
}

/* BADGES */

.badge-status{
    padding:8px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:700;
}

.badge-on{
    background:var(--green-soft);
    color:var(--green);
}

.badge-off{
    background:var(--red-soft);
    color:var(--red);
}

/* ACTION BUTTONS */

.action-btn{
    border-radius:12px;
    font-size:13px;
    font-weight:600;
    padding:8px 14px;
}

.btn-toggle{
    border:1px solid #dbe4f0;
    background:white;
}

.btn-edit{
    background:var(--blue-soft);
    color:var(--blue);
    border:none;
}

.btn-delete{
    background:#fff1f2;
    color:#e11d48;
    border:none;
}

/* EMPTY */

.empty-state{
    text-align:center;
    padding:50px 20px;
    color:var(--muted);
}

/* MOBILE */

@media(max-width:768px){

    .topbar{
        align-items:flex-start;
    }

    .table{
        min-width:700px;
    }

}

</style>
</head>

<body>

<div class="page-wrap">

    <!-- HEADER -->
    <div class="topbar">

        <div>

            <a href="/admin/dashboard" class="btn-dashboard d-inline-flex align-items-center gap-2 mb-4">
                ← Back to Dashboard
            </a>

            <div class="page-title">
                Services Management
            </div>

            <div class="page-sub">
                Create, edit, manage availability and organize veterinary services.
            </div>

        </div>

        <div>
            <a href="/services/create" class="btn btn-add">
                + Add Service
            </a>
        </div>

    </div>

    <!-- CARD -->
    <div class="card-modern">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th width="260">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($services as $service)

                    <tr>

                        <td>
                            <div class="service-name">
                                {{ $service->name }}
                            </div>
                        </td>

                        <td class="fw-semibold">
                            ₱{{ number_format($service->price, 2) }}
                        </td>

                        <td>

                            @if($service->is_available)

                                <span class="badge-status badge-on">
                                    Available
                                </span>

                            @else

                                <span class="badge-status badge-off">
                                    Unavailable
                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="d-flex gap-2 flex-wrap">

                                <!-- TOGGLE -->
                                <form action="{{ url('/services/'.$service->id.'/toggle') }}"
                                      method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button class="btn action-btn btn-toggle">
                                        Toggle
                                    </button>

                                </form>

                                <!-- EDIT -->
                                <a href="{{ url('/services/'.$service->id.'/edit') }}"
                                   class="btn action-btn btn-edit">

                                    Edit

                                </a>

                                <!-- DELETE -->
                                <form action="{{ url('/services/'.$service->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn action-btn btn-delete"
                                            onclick="return confirm('Delete this service?')">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="4">

                            <div class="empty-state">

                                <h5 class="mb-2 fw-bold">
                                    No services found
                                </h5>

                                <p class="mb-0">
                                    Add your first veterinary service.
                                </p>

                            </div>

                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>