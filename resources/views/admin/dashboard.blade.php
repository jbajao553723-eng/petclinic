<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PetsNCare — Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --bg:            #f2f2f4;
    --surface:       #ffffff;
    --surface-2:     #f7f7f9;
    --border:        rgba(0,0,0,0.07);
    --border-md:     rgba(0,0,0,0.11);
    --text-1:        #111114;
    --text-2:        #5a5a65;
    --text-3:        #9b9ba8;
    --blue:          #1a6cf5;
    --blue-hover:    #1460de;
    --blue-subtle:   #eaf0fe;
    --blue-glow:     rgba(26,108,245,0.14);
    --green:         #17a858;
    --green-subtle:  #e6f7ee;
    --amber:         #e08b00;
    --amber-subtle:  #fef5e0;
    --red:           #e0342a;
    --red-subtle:    #fdecea;
    --purple:        #7c3aed;
    --purple-subtle: #ede9fe;
    --sidebar-w:     240px;
    --topbar-h:      60px;
    --radius-sm:     10px;
    --radius-md:     14px;
    --radius-lg:     18px;
    --radius-xl:     24px;
    --font:          'DM Sans', -apple-system, sans-serif;
    --mono:          'DM Mono', monospace;
    --shadow-xs:     0 1px 3px rgba(0,0,0,0.05), 0 1px 2px rgba(0,0,0,0.04);
    --shadow-sm:     0 2px 8px rgba(0,0,0,0.06), 0 1px 3px rgba(0,0,0,0.04);
    --transition:    all 0.18s cubic-bezier(0.4,0,0.2,1);
}

html, body { height: 100%; }
body {
    font-family: var(--font);
    background: var(--bg);
    color: var(--text-1);
    display: flex;
    -webkit-font-smoothing: antialiased;
    min-height: 100vh;
}

/* ── SIDEBAR ── */
.sidebar {
    width: var(--sidebar-w);
    height: 100vh;
    position: fixed;
    top: 0; left: 0;
    background: linear-gradient(180deg, #1044c4 0%, #1a6cf5 100%);
    display: flex;
    flex-direction: column;
    z-index: 100;
}

.sidebar-brand {
    padding: 20px 18px 16px;
    border-bottom: 1px solid rgba(255,255,255,0.12);
    flex-shrink: 0;
}
.brand-row {
    display: flex;
    align-items: center;
    gap: 10px;
}
.brand-icon {
    width: 34px; height: 34px;
    background: rgba(255,255,255,0.2);
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}
.brand-name {
    font-size: 15px;
    font-weight: 700;
    color: #fff;
    letter-spacing: -0.2px;
}
.brand-sub {
    font-size: 11px;
    color: rgba(255,255,255,0.32);
    margin-top: 1px;
    font-weight: 400;
    letter-spacing: 0.3px;
    text-transform: uppercase;
}

.sidebar-nav {
    flex: 1;
    padding: 12px 10px;
    overflow-y: auto;
}
.nav-group-label {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.45);
    padding: 0 8px;
    margin: 10px 0 5px;
}
.nav-group-label:first-child { margin-top: 0; }

.nav-item {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 9px 10px;
    border-radius: var(--radius-sm);
    text-decoration: none;
    color: rgba(255,255,255,0.58);
    font-size: 13.5px;
    font-weight: 500;
    margin-bottom: 2px;
    transition: var(--transition);
    letter-spacing: -0.1px;
}
.nav-item:hover { color: #fff; background: rgba(255,255,255,0.07); }
.nav-item.active { color: #fff; background: rgba(255,255,255,0.22); }
.nav-item-icon {
    width: 28px; height: 28px;
    border-radius: 7px;
    background: rgba(255,255,255,0.06);
    display: flex; align-items: center; justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
}
.nav-item.active .nav-item-icon { background: rgba(255,255,255,0.18); }

.sidebar-footer {
    padding: 12px 10px;
    border-top: 1px solid rgba(255,255,255,0.12);
    flex-shrink: 0;
}
.logout-btn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-family: var(--font);
    font-size: 13px;
    font-weight: 600;
    color: rgba(255,255,255,0.5);
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: var(--radius-sm);
    padding: 9px 14px;
    cursor: pointer;
    transition: var(--transition);
}
.logout-btn:hover { color: #fff; background: rgba(255,255,255,0.1); }

/* ── MAIN ── */
.main {
    margin-left: var(--sidebar-w);
    flex: 1;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

/* ── TOPBAR ── */
.topbar {
    height: var(--topbar-h);
    background: var(--surface);
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    padding: 0 28px;
    gap: 14px;
    position: sticky;
    top: 0;
    z-index: 50;
}
.topbar-title {
    font-size: 15px;
    font-weight: 700;
    color: var(--text-1);
    letter-spacing: -0.2px;
}
.topbar-sub {
    font-size: 12px;
    color: var(--text-3);
    margin-top: 1px;
}
.topbar-spacer { flex: 1; }



.topbar-user {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 5px 10px 5px 5px;
    border-radius: var(--radius-sm);
    border: 1px solid var(--border-md);
    cursor: default;
}
.user-avatar {
    width: 28px; height: 28px;
    background: var(--blue);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 12px;
    font-weight: 700;
    color: #fff;
}
.user-name { font-size: 13px; font-weight: 600; color: var(--text-1); letter-spacing: -0.1px; }
.user-role { font-size: 11px; color: var(--text-3); }

/* ── CONTENT ── */
.content {
    padding: 28px;
    flex: 1;
}

/* ── PAGE HERO ── */
.page-hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
    flex-wrap: wrap;
    gap: 12px;
}
.page-hero-left .hero-eyebrow {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    color: var(--text-3);
    margin-bottom: 4px;
}
.page-hero-left h1 {
    font-size: 26px;
    font-weight: 700;
    letter-spacing: -0.5px;
    color: var(--text-1);
    line-height: 1.15;
}
.page-hero-left p {
    font-size: 14px;
    color: var(--text-2);
    margin-top: 4px;
}
.live-clock {
    font-size: 12px;
    font-family: var(--mono);
    color: var(--text-3);
    background: var(--surface);
    border: 1px solid var(--border-md);
    border-radius: var(--radius-sm);
    padding: 6px 12px;
}

/* ── STATS STRIP ── */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
    margin-bottom: 22px;
}
.stat-card {
    background: var(--surface);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border);
    padding: 20px 22px;
    box-shadow: var(--shadow-xs);
    display: flex;
    align-items: center;
    gap: 14px;
    transition: var(--transition);
}
.stat-card:hover { box-shadow: var(--shadow-sm); transform: translateY(-1px); }
.stat-icon-wrap {
    width: 44px; height: 44px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}
.si-blue   { background: var(--blue-subtle); }
.si-green  { background: var(--green-subtle); }
.si-amber  { background: var(--amber-subtle); }
.si-purple { background: var(--purple-subtle); }
.stat-info label {
    display: block;
    font-size: 11px;
    font-weight: 600;
    color: var(--text-3);
    letter-spacing: 0.3px;
    text-transform: uppercase;
    margin-bottom: 3px;
}
.stat-num {
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.6px;
    color: var(--text-1);
    line-height: 1;
    font-family: var(--mono);
}

/* ── MAIN GRID ── */
.main-grid {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 18px;
    align-items: start;
}

/* ── SECTION CARD ── */
.section-card {
    background: var(--surface);
    border-radius: var(--radius-xl);
    border: 1px solid var(--border);
    box-shadow: var(--shadow-xs);
    overflow: hidden;
}
.section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 22px;
    border-bottom: 1px solid var(--border);
}
.section-title {
    font-size: 15px;
    font-weight: 700;
    letter-spacing: -0.2px;
    color: var(--text-1);
}
.section-sub {
    font-size: 12px;
    color: var(--text-3);
    margin-top: 2px;
}
.section-link {
    font-size: 12px;
    font-weight: 600;
    color: var(--blue);
    text-decoration: none;
    padding: 6px 12px;
    border-radius: var(--radius-sm);
    border: 1px solid rgba(26,108,245,0.2);
    transition: var(--transition);
}
.section-link:hover { background: var(--blue-subtle); }

/* ── CHART ── */
.chart-body { padding: 22px; }
.chart-wrap { position: relative; height: 200px; }

/* ── TABLE ── */
.data-table { width: 100%; border-collapse: collapse; }
.data-table thead th {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    color: var(--text-3);
    padding: 0 22px 12px;
    text-align: left;
    border-bottom: 1px solid var(--border);
}
.data-table tbody tr { transition: background 0.12s; }
.data-table tbody tr:hover { background: var(--surface-2); }
.data-table tbody td {
    padding: 13px 22px;
    font-size: 13.5px;
    color: var(--text-1);
    border-bottom: 1px solid var(--border);
}
.data-table tbody tr:last-child td { border-bottom: none; }

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    font-weight: 600;
    padding: 3px 9px;
    border-radius: 20px;
}
.status-badge::before { content:''; width:5px; height:5px; border-radius:50%; background:currentColor; flex-shrink:0; }
.badge-pending   { background: var(--amber-subtle); color: var(--amber); }
.badge-completed { background: var(--green-subtle);  color: var(--green); }
.badge-cancelled { background: var(--red-subtle);    color: var(--red); }

/* ── SIDEBAR COL ── */
.sidebar-col { display: flex; flex-direction: column; gap: 14px; }

/* ── STATUS CARDS ── */
.status-card {
    background: var(--surface);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border);
    box-shadow: var(--shadow-xs);
    padding: 16px 18px;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: var(--transition);
}
.status-card:hover { box-shadow: var(--shadow-sm); }
.status-icon {
    width: 40px; height: 40px;
    border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}
.status-info-text { flex: 1; }
.status-name { font-size: 13px; font-weight: 600; color: var(--text-1); letter-spacing: -0.1px; }
.status-desc { font-size: 11px; color: var(--text-3); margin-top: 2px; }
.status-count {
    font-size: 24px;
    font-weight: 700;
    font-family: var(--mono);
    letter-spacing: -0.5px;
}

/* ── QUICK LINKS ── */
.quick-grid { padding: 14px 16px 18px; display: flex; flex-direction: column; gap: 4px; }
.quick-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    border-radius: var(--radius-sm);
    text-decoration: none;
    color: var(--text-1);
    font-size: 13.5px;
    font-weight: 500;
    letter-spacing: -0.1px;
    transition: var(--transition);
    border: 1px solid transparent;
}
.quick-link:hover { background: var(--surface-2); border-color: var(--border); color: var(--text-1); }
.quick-link-icon {
    width: 30px; height: 30px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 15px;
    flex-shrink: 0;
}
.quick-link .chevron { margin-left: auto; font-size: 12px; color: var(--text-3); }

/* ── EMPTY ── */
.empty-row td { text-align: center; padding: 32px; color: var(--text-3); font-size: 13px; }

@media (max-width: 1050px) { .main-grid { grid-template-columns: 1fr; } .sidebar-col { display: grid; grid-template-columns: repeat(3,1fr); } }
@media (max-width: 900px)  { .stats-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width: 680px)  { .sidebar { display: none; } .main { margin-left: 0; } .content { padding: 18px 14px; } }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-row">
            <div class="brand-icon">🐾</div>
            <div>
                <div class="brand-name">PetsNCare</div>
                <div class="brand-sub">Admin Panel</div>
            </div>
        </div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-group-label">Main</div>

        <a href="/admin/dashboard" class="nav-item active">
            <div class="nav-item-icon">📊</div>
            Dashboard
        </a>

        <a href="{{ route('admin.appointments.index') }}" class="nav-item">
            <div class="nav-item-icon">📅</div>
            Appointments
        </a>

        <div class="nav-group-label">Manage</div>

        <a href="{{ route('services.index') }}" class="nav-item">
            <div class="nav-item-icon">🩺</div>
            Services
        </a>

        <a href="{{ route('admin.pets.index') }}" class="nav-item">
    <div class="nav-item-icon">🐶</div> Pets
</a>
            
        </a>
    </nav>

    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4.5 11H2.5A1 1 0 011.5 10V3A1 1 0 012.5 2H4.5M8.5 9l3-3-3-3M11.5 6.5H5"/>
                </svg>
                Sign Out
            </button>
        </form>
    </div>
</aside>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <header class="topbar">
        <div>
            <div class="topbar-title">Dashboard</div>
            <div class="topbar-sub">Veterinary Clinic System</div>
        </div>
        <div class="topbar-spacer"></div>

        <div> 
            
        </div>

        <div class="topbar-user">
            <div class="user-avatar">A</div>
            <div>
                <div class="user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>
    </header>

    <!-- CONTENT -->
    <main class="content">

        <!-- HERO -->
        <div class="page-hero">
            <div class="page-hero-left">
                <div class="hero-eyebrow">Overview</div>
                <h1>Clinic Dashboard</h1>
                <p>Monitor appointments, pets, and services in one place.</p>
            </div>
            <div class="live-clock" id="liveClock">—</div>
        </div>

        <!-- STATS -->
        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon-wrap si-blue">👤</div>
                <div class="stat-info">
                    <label>Users</label>
                    <div class="stat-num">{{ $totalUsers }}</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon-wrap si-green">🐾</div>
                <div class="stat-info">
                    <label>Pets</label>
                    <div class="stat-num">{{ $totalPets }}</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon-wrap si-amber">🩺</div>
                <div class="stat-info">
                    <label>Services</label>
                    <div class="stat-num">{{ $totalServices }}</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon-wrap si-purple">📅</div>
                <div class="stat-info">
                    <label>Appointments</label>
                    <div class="stat-num">{{ $totalAppointments }}</div>
                </div>
            </div>

        </div>

        <!-- MAIN GRID -->
        <div class="main-grid">

            <!-- LEFT -->
            <div style="display:flex; flex-direction:column; gap:18px;">

                <!-- CHART -->
                <div class="section-card">
                    <div class="section-header">
                        <div>
                            <div class="section-title">Monthly Appointments</div>
                            <div class="section-sub">Full year overview</div>
                        </div>
                        <span style="font-size:12px; font-family:var(--mono); color:var(--text-3);" id="yearLabel"></span>
                    </div>
                    <div class="chart-body">
                        <div class="chart-wrap">
                            <canvas id="apptChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- APPOINTMENTS TABLE -->
                <div class="section-card">
                    <div class="section-header">
                        <div>
                            <div class="section-title">Recent Appointments</div>
                            <div class="section-sub">Latest scheduled visits</div>
                        </div>
                        <a href="{{ route('admin.appointments.index') }}" class="section-link">View all</a>
                    </div>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Pet</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentAppointments ?? [] as $appt)
                            <tr>
                                <td style="font-weight:600;">{{ $appt->pet->name ?? '—' }}</td>
                                <td style="color:var(--text-2);">{{ $appt->service->name ?? '—' }}</td>
                                <td style="font-family:var(--mono); font-size:12px; color:var(--text-3);">
                                    {{ \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') }}
                                </td>
                                <td>
                                    <span class="status-badge
                                        {{ $appt->status === 'completed' ? 'badge-completed' : ($appt->status === 'cancelled' ? 'badge-cancelled' : 'badge-pending') }}">
                                        {{ ucfirst($appt->status) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr class="empty-row">
                                <td colspan="4">No appointments yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="sidebar-col">

                <!-- STATUS COUNTS -->
                <div class="status-card">
                    <div class="status-icon" style="background:var(--amber-subtle);">⏳</div>
                    <div class="status-info-text">
                        <div class="status-name">Pending</div>
                        <div class="status-desc">Awaiting approval</div>
                    </div>
                    <div class="status-count" style="color:var(--amber);">{{ $pendingAppointments }}</div>
                </div>

                <div class="status-card">
                    <div class="status-icon" style="background:var(--green-subtle);">✅</div>
                    <div class="status-info-text">
                        <div class="status-name">Completed</div>
                        <div class="status-desc">Finished visits</div>
                    </div>
                    <div class="status-count" style="color:var(--green);">{{ $completedAppointments }}</div>
                </div>

                <div class="status-card">
                    <div class="status-icon" style="background:var(--red-subtle);">✕</div>
                    <div class="status-info-text">
                        <div class="status-name">Cancelled</div>
                        <div class="status-desc">Not proceeded</div>
                    </div>
                    <div class="status-count" style="color:var(--red);">{{ $cancelledAppointments }}</div>
                </div>

                <!-- QUICK ACCESS -->
                <div class="section-card">
                    <div class="section-header">
                        <div class="section-title">Quick Access</div>
                    </div>
                    <div class="quick-grid">
                        <a href="{{ route('admin.appointments.index') }}" class="quick-link">
                            <div class="quick-link-icon" style="background:var(--blue-subtle);">📅</div>
                            Appointments
                            <span class="chevron">›</span>
                        </a>
                        <a href="{{ route('services.index') }}" class="quick-link">
                            <div class="quick-link-icon" style="background:var(--green-subtle);">🩺</div>
                            Services
                            <span class="chevron">›</span>
                        </a>
                        <a href="{{ route('pets.index') }}" class="quick-link">
                            <div class="quick-link-icon" style="background:var(--amber-subtle);">🐶</div>
                            Pets
                            <span class="chevron">›</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </main>
</div>

<script>
// Live clock
function tick() {
    const now = new Date();
    document.getElementById('liveClock').textContent =
        now.toLocaleDateString('en-US', { weekday:'short', month:'short', day:'numeric' }) +
        '  ·  ' +
        now.toLocaleTimeString('en-US', { hour:'2-digit', minute:'2-digit' });
}
document.getElementById('yearLabel').textContent = new Date().getFullYear();
tick(); setInterval(tick, 1000);

// Chart
@php
    $chartLabels = $monthlyLabels ?? ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    $chartCounts = $monthlyCounts ?? [4,7,5,9,12,8,15,11,6,10,14,9];
@endphp
const ctx = document.getElementById('apptChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($chartLabels),
        datasets: [{
            data: @json($chartCounts),
            backgroundColor: '#1a6cf5',
            borderRadius: 6,
            borderSkipped: false,
            barPercentage: 0.52,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: '#111114',
                titleColor: '#fff',
                bodyColor: 'rgba(255,255,255,0.6)',
                padding: 10,
                borderRadius: 8,
                callbacks: { label: c => ' ' + c.parsed.y + ' appointments' }
            }
        },
        scales: {
            x: {
                grid: { display: false },
                border: { display: false },
                ticks: { font: { family: "'DM Mono'", size: 11 }, color: '#9b9ba8' }
            },
            y: {
                grid: { color: '#f0f2f7' },
                border: { display: false },
                ticks: { font: { family: "'DM Mono'", size: 11 }, color: '#9b9ba8', maxTicksLimit: 5 }
            }
        }
    }
});
</script>

</body>
</html>