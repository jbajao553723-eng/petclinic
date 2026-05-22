<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payments</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f5f8fc;
            font-family: 'Inter', sans-serif;
            color: #111827;
        }
        .page-wrap {
            max-width: 1200px;
            margin: 0 auto;
            padding: 28px 24px 40px;
        }
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }
        .topbar h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }
        .topbar p {
            margin: 4px 0 0;
            color: #6b7280;
            font-size: 14px;
        }
        .card-soft {
            background: #ffffff;
            border-radius: 18px;
            border: 1px solid #eef2f7;
            box-shadow: 0 12px 40px rgba(15, 23, 42, 0.06);
            padding: 24px;
            margin-bottom: 24px;
        }
        .table thead th {
            border-bottom: 2px solid #eef2f7;
            color: #6b7280;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        .table tbody tr {
            background: #ffffff;
        }
        .proof-thumb {
            width: 70px;
            height: 60px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }
        .status-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            color: #111827;
        }
        .status-pending { background: #fef3c7; color: #92400e; }
        .status-paid { background: #d1fae5; color: #166534; }
    </style>
</head>
<body>

<div class="page-wrap">
    <div class="topbar">
        <div>
            <h1>Payment Submissions</h1>
            <p>Review proof of payment uploads and manage client payments.</p>
        </div>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">Back to Dashboard</a>
        </div>
    </div>

    <div class="card-soft">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Payment</th>
                        <th>Client</th>
                        <th>Appointment</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Proof</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payments as $payment)
                        <tr>
                            <td>#{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $payment->appointment->user->name ?? 'N/A' }}</td>
                            <td>
                                <div>{{ $payment->appointment->service->name ?? 'N/A' }}</div>
                                <small class="text-muted">{{ $payment->appointment->appointment_date }}</small>
                            </td>
                            <td>₱{{ number_format($payment->amount, 2) }}</td>
                            <td>
                                <span class="status-pill @if($payment->status === 'Paid') status-paid @else status-pending @endif">
                                    {{ $payment->status }}
                                </span>
                            </td>
                            <td>
                                @if($payment->proof_url)
                                    <a href="{{ $payment->proof_url }}" target="_blank">
                                        <img class="proof-thumb" src="{{ $payment->proof_url }}" alt="Proof of payment">
                                    </a>
                                @else
                                    <span class="text-muted">No proof</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                No payment submissions found.
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
