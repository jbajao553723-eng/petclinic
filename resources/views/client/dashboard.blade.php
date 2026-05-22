@extends('layouts.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
        --bg: #f5f5f7;
        --surface: #ffffff;
        --surface-2: #f9f9fb;
        --border: rgba(0,0,0,0.06);
        --border-mid: rgba(0,0,0,0.1);
        --text-primary: #1d1d1f;
        --text-secondary: #6e6e73;
        --text-tertiary: #aeaeb2;
        --accent: #0071e3;
        --accent-hover: #0077ed;
        --accent-subtle: #e8f0fd;
        --green: #34c759;
        --green-subtle: #e8faf0;
        --amber: #ff9f0a;
        --amber-subtle: #fff4e0;
        --red: #ff3b30;
        --red-subtle: #ffe8e6;
        --radius-sm: 10px;
        --radius-md: 14px;
        --radius-lg: 18px;
        --radius-xl: 24px;
        --shadow-xs: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.06), 0 1px 3px rgba(0,0,0,0.04);
        --shadow-md: 0 4px 16px rgba(0,0,0,0.08), 0 2px 6px rgba(0,0,0,0.04);
        --font: 'DM Sans', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    body {
        background: var(--bg);
        font-family: var(--font);
        color: var(--text-primary);
        -webkit-font-smoothing: antialiased;
        min-height: 100vh;
    }

    .dash-wrap {
        max-width: 1180px;
        margin: 0 auto;
        padding: 32px 24px 60px;
    }

    /* ── TOP NAV ── */
    .top-nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 36px;
    }

    .nav-brand {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .nav-brand-icon {
        width: 36px;
        height: 36px;
        background: var(--text-primary);
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .nav-brand-name {
        font-size: 17px;
        font-weight: 600;
        letter-spacing: -0.3px;
        color: var(--text-primary);
    }

    .nav-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-family: var(--font);
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.1px;
        border-radius: var(--radius-sm);
        padding: 8px 16px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.15s ease;
        white-space: nowrap;
    }

    .btn-primary {
        background: var(--accent);
        color: #fff;
    }
    .btn-primary:hover { background: var(--accent-hover); color: #fff; }

    .btn-ghost {
        background: transparent;
        color: var(--text-secondary);
        border: 1px solid var(--border-mid);
    }
    .btn-ghost:hover { background: var(--surface); color: var(--text-primary); }

    .btn-warning {
        background: var(--amber);
        color: #fff;
    }
    .btn-warning:hover { background: #e8900a; color: #fff; }

    .btn-danger-ghost {
        background: transparent;
        color: var(--red);
        border: 1px solid rgba(255,59,48,0.2);
    }
    .btn-danger-ghost:hover { background: var(--red-subtle); }

    /* ── HERO ── */
    .hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        margin-bottom: 28px;
        flex-wrap: wrap;
    }

    .hero-text .greeting-label {
        font-size: 13px;
        font-weight: 500;
        color: var(--text-tertiary);
        letter-spacing: 0.4px;
        text-transform: uppercase;
        margin-bottom: 4px;
    }

    .hero-text h1 {
        font-size: 32px;
        font-weight: 700;
        letter-spacing: -0.8px;
        color: var(--text-primary);
        line-height: 1.15;
    }

    .hero-text h1 em {
        font-family: var(--font);
        font-style: normal;
        font-weight: 700;
    }

    .hero-text p {
        margin-top: 6px;
        font-size: 15px;
        color: var(--text-secondary);
        letter-spacing: -0.1px;
    }

    /* ── STATS STRIP ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: var(--surface);
        border-radius: var(--radius-lg);
        padding: 20px 22px;
        box-shadow: var(--shadow-xs);
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 14px;
        transition: box-shadow 0.2s ease;
    }
    .stat-card:hover { box-shadow: var(--shadow-sm); }

    .stat-icon-wrap {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .si-blue { background: var(--accent-subtle); }
    .si-green { background: var(--green-subtle); }
    .si-amber { background: var(--amber-subtle); }
    .si-red { background: var(--red-subtle); }

    .stat-info label {
        display: block;
        font-size: 12px;
        font-weight: 500;
        color: var(--text-tertiary);
        letter-spacing: 0.2px;
        margin-bottom: 2px;
    }
    .stat-info .stat-num {
        font-size: 26px;
        font-weight: 700;
        letter-spacing: -0.6px;
        color: var(--text-primary);
        line-height: 1.1;
    }

    /* ── MAIN LAYOUT ── */
    .main-grid {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 20px;
        align-items: start;
    }

    /* ── SECTION CARD ── */
    .section-card {
        background: var(--surface);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-xs);
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 22px 24px 0;
    }

    .section-title {
        font-size: 17px;
        font-weight: 600;
        letter-spacing: -0.3px;
        color: var(--text-primary);
    }

    .section-subtitle {
        font-size: 13px;
        color: var(--text-tertiary);
        margin-top: 2px;
        letter-spacing: -0.1px;
    }

    /* ── PETS GRID ── */
    .pets-body {
        padding: 20px 24px 24px;
    }

    .pets-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

    .pet-item {
        background: var(--surface-2);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 18px;
        transition: all 0.2s ease;
    }
    .pet-item:hover { border-color: var(--border-mid); box-shadow: var(--shadow-xs); }

    .pet-item-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 12px;
    }

    .pet-avatar {
        width: 42px;
        height: 42px;
        background: var(--accent-subtle);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .pet-age-badge {
        font-size: 12px;
        font-weight: 500;
        color: var(--text-tertiary);
        background: var(--border);
        padding: 3px 9px;
        border-radius: 20px;
    }

    .pet-name {
        font-size: 16px;
        font-weight: 600;
        letter-spacing: -0.3px;
        color: var(--text-primary);
        margin-bottom: 4px;
    }

    .pet-tags {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .tag {
        font-size: 11px;
        font-weight: 500;
        padding: 3px 9px;
        border-radius: 20px;
        letter-spacing: 0.1px;
    }
    .tag-blue { background: var(--accent-subtle); color: var(--accent); }
    .tag-green { background: var(--green-subtle); color: #248a3d; }

    .pet-actions {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .pet-actions .btn {
        justify-content: center;
        font-size: 13px;
        padding: 8px 12px;
        border-radius: 9px;
    }

    .pet-actions-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 7px;
    }

    .btn-outline {
        background: transparent;
        color: var(--accent);
        border: 1px solid rgba(0,113,227,0.25);
    }
    .btn-outline:hover { background: var(--accent-subtle); color: var(--accent); }

    /* ── APPOINTMENTS TABLE ── */
    .appt-body { padding: 16px 0 0; }

    .appt-table { width: 100%; border-collapse: collapse; }

    .appt-table thead th {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: var(--text-tertiary);
        padding: 0 24px 12px;
        text-align: left;
        border-bottom: 1px solid var(--border);
    }

    .appt-table tbody tr {
        border-bottom: 1px solid var(--border);
        transition: background 0.15s ease;
    }
    .appt-table tbody tr:last-child { border-bottom: none; }
    .appt-table tbody tr:hover { background: var(--surface-2); }

    .appt-table tbody td {
        padding: 14px 24px;
        font-size: 14px;
        color: var(--text-primary);
        letter-spacing: -0.1px;
    }

    .appt-table td:nth-child(2) {
        color: var(--text-secondary);
        font-size: 13px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 20px;
        letter-spacing: 0.1px;
    }
    .status-badge::before {
        content: '';
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: currentColor;
        flex-shrink: 0;
    }
    .status-pending { background: var(--amber-subtle); color: #a16207; }
    .status-confirmed { background: var(--green-subtle); color: #248a3d; }
    .status-cancelled { background: var(--red-subtle); color: var(--red); }

    .table-footer {
        padding: 16px 24px;
        border-top: 1px solid var(--border);
    }

    /* ── SIDEBAR ── */
    .sidebar-col { display: flex; flex-direction: column; gap: 16px; }

    /* ── QUICK ACTIONS ── */
    .quick-grid { padding: 16px 18px 20px; display: flex; flex-direction: column; gap: 6px; }

    .quick-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border-radius: var(--radius-sm);
        text-decoration: none;
        color: var(--text-primary);
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.1px;
        transition: background 0.15s ease;
        border: 1px solid transparent;
    }
    .quick-link:hover {
        background: var(--surface-2);
        border-color: var(--border);
        color: var(--text-primary);
    }

    .quick-link-icon {
        width: 32px;
        height: 32px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
    }

    .quick-link span.chevron {
        margin-left: auto;
        font-size: 12px;
        color: var(--text-tertiary);
    }

    /* ── ACTIVITY ── */
    .activity-list { padding: 14px 20px 20px; display: flex; flex-direction: column; gap: 0; }

    .activity-item {
        display: flex;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid var(--border);
    }
    .activity-item:last-child { border-bottom: none; padding-bottom: 0; }

    .activity-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 5px;
    }
    .dot-blue { background: var(--accent); }
    .dot-green { background: var(--green); }
    .dot-amber { background: var(--amber); }

    .activity-text strong {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-primary);
        display: block;
        margin-bottom: 2px;
        letter-spacing: -0.1px;
    }
    .activity-text p {
        font-size: 12px;
        color: var(--text-tertiary);
        line-height: 1.4;
    }

    /* ── TIPS ── */
    .tips-body { padding: 14px 20px 20px; }

    .tip-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 10px 0;
        border-bottom: 1px solid var(--border);
        font-size: 13px;
        color: var(--text-secondary);
        line-height: 1.4;
        letter-spacing: -0.1px;
    }
    .tip-item:last-child { border-bottom: none; padding-bottom: 0; }
    .tip-item::before {
        content: '→';
        color: var(--accent);
        font-weight: 600;
        flex-shrink: 0;
        margin-top: 1px;
    }

    /* ── EMPTY STATE ── */
    .empty-state {
        text-align: center;
        padding: 48px 24px;
        color: var(--text-secondary);
    }
    .empty-state .empty-icon { font-size: 40px; margin-bottom: 12px; }
    .empty-state h5 { font-size: 16px; font-weight: 600; color: var(--text-primary); letter-spacing: -0.2px; margin-bottom: 6px; }
    .empty-state p { font-size: 14px; color: var(--text-tertiary); }

    /* ── MODAL ── */
    .modal-content { border: none; border-radius: var(--radius-xl); box-shadow: 0 20px 60px rgba(0,0,0,0.15); }
    .modal-header { padding: 22px 24px 0; border-bottom: none; }
    .modal-header .modal-title { font-size: 18px; font-weight: 700; letter-spacing: -0.4px; }
    .modal-body { padding: 20px 24px; }
    .modal-footer { padding: 0 24px 22px; border-top: none; }

    .form-label { font-size: 13px; font-weight: 500; color: var(--text-secondary); margin-bottom: 6px; letter-spacing: -0.1px; }
    .form-control {
        font-family: var(--font);
        font-size: 15px;
        border: 1px solid var(--border-mid);
        border-radius: var(--radius-sm);
        padding: 10px 14px;
        background: var(--surface);
        color: var(--text-primary);
        width: 100%;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }
    .form-control:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(0,113,227,0.12);
    }
    .form-control::placeholder { color: var(--text-tertiary); }

    /* ── DIVIDER ── */
    .mb-panel { margin-bottom: 20px; }

    /* ── RESPONSIVE ── */
    @media (max-width: 960px) {
        .main-grid { grid-template-columns: 1fr; }
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 600px) {
        .stats-grid { grid-template-columns: 1fr 1fr; }
        .pets-grid { grid-template-columns: 1fr; }
        .hero h1 { font-size: 26px; }
        .nav-actions .btn-ghost { display: none; }
    }
</style>

<div class="dash-wrap">

    <!-- TOP NAV -->
    <nav class="top-nav">
        <div class="nav-brand">
            <div class="hero">
        <div class="hero-text">
            <div class="greeting-label">Dashboard</div>
            <h1>Hello, <em>{{ Auth::user()->name }}</em> 👋</h1>
            <p>Manage pets, services, and appointments in one place.</p>
        </div>
    </div>
        </div>
        <div class="nav-actions">
            <a href="{{ route('appointments.create') }}" class="btn btn-primary">
                Book Appointment
            </a>
            <button class="btn btn-ghost"
                    data-bs-toggle="modal"
                    data-bs-target="#addPetModal">
                + Add Pet
            </button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-ghost">Sign out</button>
            </form>
        </div>
    </nav>

    <!-- HERO -->
    

    <!-- STATS -->
    <div class="stats-grid">

        <div class="stat-card">
            <div class="stat-icon-wrap si-blue">🐾</div>
            <div class="stat-info">
                <label>My Pets</label>
                <div class="stat-num">{{ $pets->count() ?? 0 }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon-wrap si-green">📅</div>
            <div class="stat-info">
                <label>Appointments</label>
                <div class="stat-num">{{ $totalAppointments ?? 0 }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon-wrap si-amber">⏳</div>
            <div class="stat-info">
                <label>Pending</label>
                <div class="stat-num" style="color: var(--amber);">{{ $pendingAppointments ?? 0 }}</div>
            </div>
        </div>


        </div>

    </div>

    <!-- MAIN -->
    <div class="main-grid">

        <!-- LEFT COLUMN -->
        <div>

            <!-- MY PETS -->
            <div class="section-card mb-panel">

                <div class="section-header">
                        <div>
                        <div class="section-title">My Pets</div>
                        <div class="section-subtitle">Book appointments and manage your pet profiles from one place.</div>
                    </div>
                    <div style="display:flex; gap:10px; align-items:center;">
                        <a href="{{ route('appointments.create') }}"
                           class="btn btn-warning"
                           style="font-size:13px; padding:7px 14px;">
                            Book Appointment
                        </a>
                        <button class="btn btn-primary"
                                style="font-size:13px; padding:7px 14px;"
                                data-bs-toggle="modal"
                                data-bs-target="#addPetModal">
                            + Add Pet
                        </button>
                    </div>
                </div>

                <div class="pets-body">

                    @if($pets->isEmpty())
                        <div class="empty-state">
                            <div class="empty-icon">🐾</div>
                            <h5>No pets added yet</h5>
                            <p>Start by adding your first pet profile.</p>
                        </div>
                    @else
                        <div class="pets-grid">
                            @foreach($pets as $pet)
                                <div class="pet-item">

                                    <div class="pet-item-top">
                                        <div class="pet-avatar">
                                            {{ strtolower($pet->species) === 'cat' ? '🐱' : (strtolower($pet->species) === 'bird' ? '🐦' : '🐶') }}
                                        </div>
                                        <span class="pet-age-badge">{{ $pet->age }} yrs</span>
                                    </div>

                                    <div class="pet-name">{{ $pet->name }}</div>

                                    <div class="pet-tags">
                                        <span class="tag tag-blue">{{ $pet->species }}</span>
                                        @if($pet->breed)
                                            <span class="tag tag-green">{{ $pet->breed }}</span>
                                        @endif
                                    </div>

                                    <div class="pet-actions">
                                        <a href="{{ route('appointments.create') }}"
                                           class="btn btn-warning">
                                            Book Appointment
                                        </a>
                                        <div class="pet-actions-row">
                                            <a href="{{ route('pets.edit', $pet->id) }}"
                                               class="btn btn-outline">
                                                Edit
                                            </a>
                                            <form method="POST"
                                                  action="{{ route('pets.destroy', $pet->id) }}"
                                                  style="display:contents;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger-ghost" style="font-size:13px;padding:8px 12px;border-radius:9px;">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>

            </div>

            <!-- APPOINTMENTS -->
            <div class="section-card">

                <div class="section-header" style="padding-bottom: 0;">
                    <div>
                        <div class="section-title">Upcoming Appointments</div>
                        <div class="section-subtitle">Your latest schedules and services</div>
                    </div>
                    <a href="{{ route('appointments.index') }}"
                       class="btn btn-ghost"
                       style="font-size:13px; padding:7px 14px;">
                        View all
                    </a>
                </div>

                <div class="appt-body">
                    <table class="appt-table">
                        <thead>
                            <tr>
                                <th>Pet(s)</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments ?? [] as $appointment)
                                <tr>
                                    <td style="font-weight:500;">{{ $appointment->petNames ?? 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y · h:i A') }}</td>
                                    <td>
                                        <span class="status-badge
                                            @if($appointment->status === 'confirmed') status-confirmed
                                            @elseif($appointment->status === 'cancelled') status-cancelled
                                            @else status-pending
                                            @endif">
                                            {{ ucfirst($appointment->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <div class="empty-state" style="padding:32px 24px;">
                                            <div class="empty-icon" style="font-size:28px;">📅</div>
                                            <h5>No upcoming appointments</h5>
                                            <p>Book a veterinary service to get started.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

        <!-- SIDEBAR -->
        <div class="sidebar-col">

            <!-- QUICK ACTIONS -->
            <div class="section-card">
                <div class="section-header">
                    <div>
                        <div class="section-title">Quick Actions</div>
                    </div>
                </div>
                <div class="quick-grid">

                    <a href="{{ route('services.index') }}" class="quick-link">
                        <div class="quick-link-icon" style="background:var(--accent-subtle);">🏥</div>
                        Veterinary Services
                        <span class="chevron">›</span>
                    </a>

                    <a href="{{ route('appointments.index') }}" class="quick-link">
                        <div class="quick-link-icon" style="background:#f2f2f7;">📋</div>
                        Appointment History
                        <span class="chevron">›</span>
                    </a>

                </div>
            </div>

            <!-- RECENT ACTIVITY -->
            <div class="section-card">
                <div class="section-header">
                    <div class="section-title">Recent Activity</div>
                </div>
                <div class="activity-list">

                    <div class="activity-item">
                        <div class="activity-dot dot-amber"></div>
                        <div class="activity-text">
                            <strong>Appointment Submitted</strong>
                            <p>Grooming appointment is pending approval.</p>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-dot dot-green"></div>
                        <div class="activity-text">
                            <strong>Pet Profile Added</strong>
                            <p>Successfully added a new pet profile.</p>
                        </div>
                    </div>


                </div>
            </div>

            <!-- PET CARE TIPS -->
            <div class="section-card">
                <div class="section-header">
                    <div class="section-title">Pet Care Tips</div>
                </div>
                <div class="tips-body">
                    <div class="tip-item">Keep vaccinations updated regularly.</div>
                    <div class="tip-item">Schedule routine wellness checkups.</div>
                    <div class="tip-item">Maintain a balanced and nutritious pet diet.</div>
                    <div class="tip-item">Groom pets regularly for better hygiene.</div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- ADD PET MODAL -->
<div class="modal fade" id="addPetModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('pets.store') }}">
            @csrf
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add New Pet</h5>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            style="background: none; border: none; font-size: 20px; color: var(--text-tertiary); cursor: pointer; line-height: 1;">
                        ×
                    </button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Pet Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Buddy" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Species</label>
                        <input type="text" name="species" class="form-control" placeholder="Dog, Cat, Bird…" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Breed</label>
                        <input type="text" name="breed" class="form-control" placeholder="e.g. Golden Retriever">
                    </div>

                    <div class="mb-0">
                        <label class="form-label">Age (years)</label>
                        <input type="number" name="age" class="form-control" placeholder="e.g. 3" min="0">
                    </div>

                </div>

                <div class="modal-footer" style="gap: 8px;">
                    <button type="button"
                            class="btn btn-ghost"
                            data-bs-dismiss="modal"
                            style="flex: 1;">
                        Cancel
                    </button>
                    <button type="submit"
                            class="btn btn-primary"
                            style="flex: 1;">
                        Save Pet
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection