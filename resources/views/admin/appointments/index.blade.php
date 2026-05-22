<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointments</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f5f8fc;
            color: #111827;
        }

        .page-wrap {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 18px;
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 18px;
        }

        .title {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .subtitle {
            font-size: 13px;
            color: #6b7280;
            margin-top: 3px;
        }

        .back-btn {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .back-btn:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        /* CARD */
        .card-soft {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #eef2f7;
            box-shadow: 0 1px 4px rgba(0,0,0,0.04);
            overflow: hidden;
        }

        /* TABLE */
        .table thead th {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6b7280;
            border-bottom: 1px solid #eef2f7 !important;
        }

        .table tbody td {
            font-size: 14px;
            vertical-align: middle;
            border-color: #f1f5f9;
        }

        .table tbody tr:hover {
            background: #f9fafb;
        }

        /* BADGES */
        .badge-status {
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }

        .pending { background:#fff7ed; color:#9a3412; }
        .approved { background:#ecfdf5; color:#047857; }
        .rejected { background:#fef2f2; color:#b91c1c; }

        /* BUTTONS */
        .btn-sm {
            border-radius: 10px;
            font-weight: 500;
        }

        .btn-success {
            background: #16a34a;
            border: none;
        }

        .btn-danger {
            background: #dc2626;
            border: none;
        }

        .btn-success:hover { background: #15803d; }
        .btn-danger:hover { background: #b91c1c; }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 40px;
            color: #6b7280;
        }
    </style>
</head>

<body>

<div class="page-wrap">

    <!-- HEADER WITH BACK BUTTON -->
    <div class="header">

        <div>
            <div class="title">Appointment Management</div>
            <div class="subtitle">Approve or reject client bookings</div>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="back-btn">
            ← Back to Dashboard
        </a>

    </div>

    <!-- CARD -->
    <div class="card-soft">

        <div class="table-responsive">
            <table class="table align-middle mb-0">

                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Pet(s)</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Proof</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($appointments as $a)
                    <tr>

                        <td class="fw-semibold">{{ $a->user->name ?? 'N/A' }}</td>

                        <td>{{ $a->petNames ?: 'N/A' }}</td>

                        <td>
                            {{ $a->service->name ?? 'N/A' }}
                            <div class="text-muted small">
                                ₱{{ $a->service->price ?? 0 }}
                            </div>
                        </td>

                        <td class="text-muted">
                            {{ $a->appointment_date }}
                        </td>

                        <!-- STATUS -->
                        <td>
                            @if($a->status == 'Pending Payment')
                                <span class="badge-status pending">Waiting Payment</span>

                            @elseif($a->status == 'Paid' || $a->status == 'Pending')
                                <span class="badge-status pending">Pending Approval</span>

                            @elseif($a->status == 'Approved')
                                <span class="badge-status approved">Approved</span>

                            @elseif($a->status == 'Rejected')
                                <span class="badge-status rejected">Rejected</span>

                            @else
                                <span class="badge-status">{{ $a->status }}</span>
                            @endif
                        </td>

                        <!-- PROOF -->
                        <td>
                            @if($a->payment && $a->payment->proof_url)
                                <a href="{{ $a->payment->proof_url }}" target="_blank">
                                    View
                                </a>
                            @else
                                <span class="text-muted">None</span>
                            @endif
                        </td>

                        <!-- ACTIONS -->
                        <td>

                        @if(in_array($a->status, ['Pending', 'Paid']))

                            <form method="POST"
                                  action="{{ route('admin.appointments.update', $a->id) }}"
                                  class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button name="status" value="Approved" class="btn btn-success btn-sm">
                                    Approve
                                </button>
                            </form>

                            <form method="POST"
                                  action="{{ route('admin.appointments.update', $a->id) }}"
                                  class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button name="status" value="Rejected" class="btn btn-danger btn-sm">
                                    Reject
                                </button>
                            </form>

                        @elseif($a->status == 'Pending Payment')
                            <span class="text-warning small">Waiting for payment</span>
                        @else
                            <span class="text-muted small">No actions</span>
                        @endif

                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="empty">
                            No appointments found
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