@extends('layouts.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@500&display=swap" rel="stylesheet">

<style>
:root{
    --bg:#f4f7fb;
    --card:#ffffff;
    --border:#e8eef5;
    --text:#111827;
    --muted:#6b7280;
    --blue:#2563eb;
    --blue-soft:#eff6ff;
    --green:#16a34a;
    --green-soft:#dcfce7;
    --amber:#d97706;
    --amber-soft:#fef3c7;
    --red:#dc2626;
    --red-soft:#fee2e2;
    --shadow:0 10px 30px rgba(15,23,42,.06);
    --radius:22px;
}

body{
    background:var(--bg);
    font-family:'DM Sans',sans-serif;
}

/* PAGE */
.profile-page{
    max-width:1350px;
    margin:35px auto;
    padding:0 20px;
}

/* HEADER */
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:16px;
    margin-bottom:26px;
}

.header-left{
    display:flex;
    align-items:center;
    gap:18px;
}

.pet-avatar{
    width:78px;
    height:78px;
    border-radius:24px;
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:34px;
    box-shadow:0 12px 24px rgba(37,99,235,.22);
}

.page-label{
    font-size:12px;
    font-weight:700;
    color:var(--muted);
    text-transform:uppercase;
    letter-spacing:.12em;
    margin-bottom:6px;
}

.page-title{
    font-size:34px;
    font-weight:700;
    color:var(--text);
    margin:0;
    letter-spacing:-1px;
}

.page-sub{
    color:var(--muted);
    margin-top:7px;
    font-size:14px;
}

.back-btn{
    background:#fff;
    border:1px solid var(--border);
    padding:12px 18px;
    border-radius:14px;
    text-decoration:none;
    color:var(--text);
    font-size:14px;
    font-weight:600;
    transition:.2s ease;
    box-shadow:var(--shadow);
}

.back-btn:hover{
    background:#f9fafb;
    color:var(--text);
    transform:translateY(-1px);
}

/* GRID */
.profile-grid{
    display:grid;
    grid-template-columns:340px 1fr;
    gap:22px;
}

@media(max-width:991px){
    .profile-grid{
        grid-template-columns:1fr;
    }
}

/* CARD */
.modern-card{
    background:var(--card);
    border-radius:var(--radius);
    border:1px solid var(--border);
    box-shadow:var(--shadow);
    overflow:hidden;
}

.card-header-modern{
    padding:22px 24px;
    border-bottom:1px solid var(--border);
}

.card-title{
    font-size:18px;
    font-weight:700;
    color:var(--text);
    margin-bottom:4px;
}

.card-sub{
    font-size:13px;
    color:var(--muted);
}

.card-body-modern{
    padding:24px;
}

/* INFO LIST */
.info-list{
    display:flex;
    flex-direction:column;
    gap:18px;
}

.info-item{
    padding-bottom:16px;
    border-bottom:1px solid #f1f5f9;
}

.info-item:last-child{
    border-bottom:none;
    padding-bottom:0;
}

.info-label{
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:.1em;
    color:#94a3b8;
    font-weight:700;
    margin-bottom:7px;
}

.info-value{
    font-size:15px;
    color:#111827;
    font-weight:600;
}

/* BADGES */
.badge-modern{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:8px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

.badge-blue{
    background:var(--blue-soft);
    color:var(--blue);
}

.badge-green{
    background:var(--green-soft);
    color:var(--green);
}

.badge-amber{
    background:var(--amber-soft);
    color:var(--amber);
}

.badge-red{
    background:var(--red-soft);
    color:var(--red);
}

/* RECORDS */
.record-list{
    display:flex;
    flex-direction:column;
    gap:14px;
}

.record-item{
    border:1px solid #edf2f7;
    border-radius:18px;
    padding:18px;
    transition:.18s ease;
    background:#fff;
}

.record-item:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 18px rgba(15,23,42,.06);
}

.record-title{
    font-size:16px;
    font-weight:700;
    color:#111827;
    margin-bottom:8px;
}

.record-text{
    color:#4b5563;
    font-size:14px;
    line-height:1.7;
}

.record-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:10px;
    margin-top:14px;
}

.record-small{
    font-size:12px;
    color:#94a3b8;
}

/* APPOINTMENTS */
.appointment-item{
    border:1px solid #edf2f7;
    border-radius:18px;
    padding:18px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:14px;
    flex-wrap:wrap;
    transition:.18s ease;
}

.appointment-item:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 18px rgba(15,23,42,.06);
}

.appointment-left{
    display:flex;
    flex-direction:column;
    gap:5px;
}

.appointment-service{
    font-size:16px;
    font-weight:700;
    color:#111827;
}

.appointment-date{
    font-size:13px;
    color:#6b7280;
    font-family:'DM Mono',monospace;
}

/* EMPTY */
.empty-box{
    text-align:center;
    padding:50px 20px;
}

.empty-icon{
    font-size:42px;
    margin-bottom:12px;
}

.empty-title{
    font-size:17px;
    font-weight:700;
    color:#111827;
}

.empty-sub{
    margin-top:6px;
    color:#94a3b8;
    font-size:14px;
}
</style>

<div class="profile-page">

    <!-- HEADER -->
    <div class="page-header">

        <div class="header-left">

            <div class="pet-avatar">
                🐾
            </div>

            <div>

                <div class="page-label">
                    Pet Medical Profile
                </div>

                <h1 class="page-title">
                    {{ $pet->name }}
                </h1>

                <div class="page-sub">
                    Complete veterinary profile and appointment history
                </div>

            </div>

        </div>

        <a href="{{ route('admin.pets.index') }}" class="back-btn">
            ← Back to Pets
        </a>

    </div>

    <!-- GRID -->
    <div class="profile-grid">

        <!-- LEFT INFO -->
        <div>

            <div class="modern-card">

                <div class="card-header-modern">
                    <div class="card-title">
                        Pet Information
                    </div>

                    <div class="card-sub">
                        Registered details and owner information
                    </div>
                </div>

                <div class="card-body-modern">

                    <div class="info-list">

                        <div class="info-item">
                            <div class="info-label">Owner</div>
                            <div class="info-value">
                                {{ $pet->owner->name ?? 'N/A' }}
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value">
                                {{ $pet->owner->email ?? 'N/A' }}
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Species</div>

                            <div class="info-value">
                                <span class="badge-modern badge-blue">
                                    {{ $pet->species }}
                                </span>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Breed</div>
                            <div class="info-value">
                                {{ $pet->breed ?? 'Unknown' }}
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Age</div>

                            <div class="info-value">
                                <span class="badge-modern badge-green">
                                    {{ $pet->age ?? 0 }} Years Old
                                </span>
                            </div>
                        </div>

                        @if($pet->notes)
                        <div class="info-item">
                            <div class="info-label">Notes</div>
                            <div class="info-value">
                                {{ $pet->notes }}
                            </div>
                        </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT CONTENT -->
        <div style="display:flex; flex-direction:column; gap:22px;">

            <!-- MEDICAL HISTORY -->
            <div class="modern-card">

                <div class="card-header-modern">

                    <div class="card-title">
                        🏥 Medical History
                    </div>

                    <div class="card-sub">
                        Diagnosis records and veterinary treatments
                    </div>

                </div>

                <div class="card-body-modern">

                    @forelse($pet->medicalRecords as $record)

                        <div class="record-list">

                            <div class="record-item">

                                <div class="record-title">
                                    {{ $record->diagnosis }}
                                </div>

                                <div class="record-text">
                                    {{ $record->treatment }}
                                </div>

                                <div class="record-footer">

                                    <div class="record-small">
                                        Veterinarian:
                                        <strong>{{ $record->veterinarian }}</strong>
                                    </div>

                                    @if($record->created_at)
                                    <div class="record-small">
                                        {{ $record->created_at->format('M d, Y') }}
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="empty-box">

                            <div class="empty-icon">
                                🩺
                            </div>

                            <div class="empty-title">
                                No Medical Records
                            </div>

                            <div class="empty-sub">
                                This pet does not have any medical history yet.
                            </div>

                        </div>

                    @endforelse

                </div>

            </div>

            <!-- APPOINTMENTS -->
            <div class="modern-card">

                <div class="card-header-modern">

                    <div class="card-title">
                        📅 Appointment History
                    </div>

                    <div class="card-sub">
                        Scheduled visits and appointment statuses
                    </div>

                </div>

                <div class="card-body-modern">

                    @forelse($pet->appointments as $app)

                        <div class="record-list">

                            <div class="appointment-item">

                                <div class="appointment-left">

                                    <div class="appointment-service">
                                        {{ $app->service->name ?? 'Veterinary Appointment' }}
                                    </div>

                                    <div class="appointment-date">
                                        {{ \Carbon\Carbon::parse($app->appointment_date)->format('M d, Y • h:i A') }}
                                    </div>

                                </div>

                                <div>

                                    @if($app->status == 'completed')

                                        <span class="badge-modern badge-green">
                                            Completed
                                        </span>

                                    @elseif($app->status == 'cancelled')

                                        <span class="badge-modern badge-red">
                                            Cancelled
                                        </span>

                                    @else

                                        <span class="badge-modern badge-amber">
                                            Pending
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="empty-box">

                            <div class="empty-icon">
                                📅
                            </div>

                            <div class="empty-title">
                                No Appointments Yet
                            </div>

                            <div class="empty-sub">
                                This pet has no appointment history.
                            </div>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>

@endsection