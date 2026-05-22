@extends('layouts.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --bg:              #f2f2f4;
    --surface:         #ffffff;
    --surface-2:       #f7f7f9;
    --surface-3:       #efeff2;
    --border:          rgba(0,0,0,0.07);
    --border-md:       rgba(0,0,0,0.11);
    --border-strong:   rgba(0,0,0,0.18);
    --text-1:          #111114;
    --text-2:          #5a5a65;
    --text-3:          #9b9ba8;
    --blue:            #1a6cf5;
    --blue-hover:      #1460de;
    --blue-subtle:     #eaf0fe;
    --blue-glow:       rgba(26,108,245,0.14);
    --green:           #17a858;
    --green-subtle:    #e6f7ee;
    --amber:           #e08b00;
    --amber-subtle:    #fef5e0;
    --red:             #e0342a;
    --red-subtle:      #fdecea;
    --radius-xs:       8px;
    --radius-sm:       11px;
    --radius-md:       15px;
    --radius-lg:       20px;
    --radius-xl:       26px;
    --font:            'DM Sans', -apple-system, sans-serif;
    --mono:            'DM Mono', monospace;
    --shadow-card:     0 1px 4px rgba(0,0,0,0.05), 0 4px 16px rgba(0,0,0,0.06);
    --transition:      all 0.18s cubic-bezier(0.4,0,0.2,1);
}

body {
    background: var(--bg);
    font-family: var(--font);
    color: var(--text-1);
    -webkit-font-smoothing: antialiased;
    min-height: 100vh;
}

.page-wrap {
    max-width: 800px;
    margin: 0 auto;
    padding: 40px 20px 80px;
}

/* TOP BAR */
.top-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 36px;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-family: var(--font);
    font-size: 14px;
    font-weight: 500;
    color: var(--text-2);
    background: var(--surface);
    border: 1px solid var(--border-md);
    border-radius: var(--radius-sm);
    padding: 8px 14px;
    text-decoration: none;
    transition: var(--transition);
    letter-spacing: -0.1px;
}
.back-btn:hover {
    background: var(--surface-2);
    color: var(--text-1);
    border-color: var(--border-strong);
    text-decoration: none;
}
.back-btn svg { width: 15px; height: 15px; flex-shrink: 0; }

.breadcrumb-trail {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    color: var(--text-3);
}
.breadcrumb-trail a {
    color: var(--blue);
    text-decoration: none;
    font-weight: 500;
}
.breadcrumb-trail a:hover { text-decoration: underline; }

/* PAGE HEADING */
.page-heading {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 26px;
}
.heading-text { flex: 1; }
.eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.7px;
    text-transform: uppercase;
    color: var(--blue);
    background: var(--blue-subtle);
    padding: 4px 10px;
    border-radius: 20px;
    margin-bottom: 12px;
}
.page-heading h1 {
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.6px;
    color: var(--text-1);
    line-height: 1.2;
}
.page-heading p {
    font-size: 15px;
    color: var(--text-2);
    margin-top: 6px;
    font-weight: 400;
    letter-spacing: -0.1px;
    line-height: 1.5;
}

.action-btn {
    font-family: var(--font);
    font-size: 14px;
    font-weight: 700;
    letter-spacing: -0.1px;
    color: #fff;
    background: var(--blue);
    border: none;
    border-radius: var(--radius-sm);
    padding: 11px 20px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: var(--transition);
    box-shadow: 0 2px 8px rgba(26,108,245,0.2);
}
.action-btn:hover {
    background: var(--blue-hover);
    color: #fff;
    text-decoration: none;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(26,108,245,0.3);
}
.action-btn svg { width: 15px; height: 15px; }

/* TABLE CARD */
.list-card {
    background: var(--surface);
    border-radius: var(--radius-xl);
    border: 1px solid var(--border);
    box-shadow: var(--shadow-card);
    overflow: hidden;
}

.table-responsive {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.custom-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    text-align: left;
}

.custom-table th {
    background: var(--surface-2);
    padding: 14px 24px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    color: var(--text-3);
    border-bottom: 1px solid var(--border);
}

.custom-table td {
    padding: 18px 24px;
    font-size: 14px;
    color: var(--text-1);
    border-bottom: 1px solid var(--border);
    transition: var(--transition);
}

.custom-table tbody tr:last-child td {
    border-bottom: none;
}

.custom-table tbody tr:hover td {
    background: var(--surface-2);
}

/* TABLE DATA STYLES */
.pet-name-cell { font-weight: 600; color: var(--text-1); letter-spacing: -0.2px; }
.service-name-cell { font-weight: 500; color: var(--text-2); }
.date-cell { font-family: var(--mono); font-size: 13px; color: var(--text-2); }

/* STATUS BADGES */
.status-badge {
    display: inline-flex;
    align-items: center;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: -0.1px;
    padding: 4px 12px;
    border-radius: 20px;
}
.status-badge.pending { background: var(--amber-subtle); color: var(--amber); }
.status-badge.approved { background: var(--green-subtle); color: var(--green); }
.status-badge.rejected { background: var(--red-subtle); color: var(--red); }

/* EMPTY STATE */
.empty-state {
    padding: 48px 24px;
    text-align: center;
    background: var(--surface);
}
.empty-state p { font-size: 15px; color: var(--text-2); margin-bottom: 16px; }

@media (max-width: 600px) {
    .page-wrap { padding: 28px 14px 60px; }
    .page-heading { flex-direction: column; align-items: flex-start; gap: 16px; }
    .action-btn { width: 100%; justify-content: center; }
    .breadcrumb-trail { display: none; }
    .custom-table th, .custom-table td { padding: 14px 16px; }
}
</style>

<div class="page-wrap">

    <!-- TOP BAR -->
    <div class="top-bar">
        <a href="{{ route('dashboard') }}" class="back-btn">
            <svg viewBox="0 0 15 15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9.5 11.5L5.5 7.5l4-4"/>
            </svg>
            Back to Dashboard
        </a>
        <div class="breadcrumb-trail">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <span style="color:var(--text-3)">›</span>
            <span>My Appointments</span>
        </div>
    </div>

    <!-- HEADING -->
    <div class="page-heading">
        <div class="heading-text">
            <div class="eyebrow">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor">
                    <rect x="0" y="0" width="4.2" height="4.2" rx="1.2"/>
                    <rect x="5.8" y="0" width="4.2" height="4.2" rx="1.2"/>
                    <rect x="0" y="5.8" width="4.2" height="4.2" rx="1.2"/>
                    <rect x="5.8" y="5.8" width="4.2" height="4.2" rx="1.2"/>
                </svg>
                History & Logs
            </div>
            <h1>My Appointments</h1>
            <p>Track, manage, and view updates regarding your scheduling files.</p>
        </div>
        <a href="{{ route('appointments.create') }}" class="action-btn">
            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                <line x1="8" y1="2" x2="8" y2="14"></line>
                <line x1="2" y1="8" x2="14" y2="8"></line>
            </svg>
            Book Appointment
        </a>
    </div>

    <!-- CONTENT DATA CARD -->
    <div class="list-card">
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Pet(s)</th>
                        <th>Service</th>
                        <th>Appointment Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $a)
                        <tr>
                            <td class="pet-name-cell">
                                {{ $a->petNames ?: 'N/A' }}
                            </td>
                            <td class="service-name-cell">
                                {{ $a->service->name ?? 'N/A' }}
                            </td>
                            <td class="date-cell">
                                {{ is_string($a->appointment_date) ? $a->appointment_date : $a->appointment_date->format('M d, Y') }}
                            </td>
                            <td>
                                @if($a->status == 'Pending')
                                    <span class="status-badge pending">Pending</span>
                                @elseif($a->status == 'Approved')
                                    <span class="status-badge approved">Approved</span>
                                @else
                                    <span class="status-badge rejected">Rejected</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <p>No records found. Schedule your pet's first evaluation clinic slot today.</p>
                                    <a href="{{ route('appointments.create') }}" class="back-btn">
                                        Book Your Visit Now →
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection