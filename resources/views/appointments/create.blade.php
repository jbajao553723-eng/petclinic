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
    max-width: 660px;
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
.page-heading { margin-bottom: 26px; }
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

/* PROGRESS */
.progress-steps {
    display: flex;
    align-items: center;
    margin-bottom: 24px;
}
.step-item {
    display: flex;
    align-items: center;
    gap: 8px;
    flex: 1;
}
.step-item:last-child { flex: none; }
.step-dot {
    width: 28px; height: 28px;
    border-radius: 50%;
    border: 2px solid var(--border-md);
    background: var(--surface);
    display: flex; align-items: center; justify-content: center;
    font-size: 12px;
    font-weight: 700;
    color: var(--text-3);
    flex-shrink: 0;
    transition: var(--transition);
}
.step-dot.active { border-color: var(--blue); background: var(--blue); color: #fff; }
.step-dot.done   { border-color: var(--green); background: var(--green); color: #fff; }
.step-label {
    font-size: 12px;
    font-weight: 500;
    color: var(--text-3);
    letter-spacing: -0.1px;
    white-space: nowrap;
}
.step-label.active { color: var(--text-1); font-weight: 600; }
.step-connector {
    flex: 1;
    height: 1.5px;
    background: var(--border-md);
    margin: 0 10px;
}
.step-connector.done { background: var(--green); }

/* FORM CARD */
.form-card {
    background: var(--surface);
    border-radius: var(--radius-xl);
    border: 1px solid var(--border);
    box-shadow: var(--shadow-card);
    overflow: hidden;
}

.form-section {
    padding: 26px 28px;
    border-bottom: 1px solid var(--border);
}
.form-section:last-of-type { border-bottom: none; }

.section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 18px;
}
.section-title-wrap { display: flex; align-items: center; gap: 10px; }
.step-badge {
    width: 22px; height: 22px;
    border-radius: 6px;
    background: var(--blue);
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    font-family: var(--mono);
}
.section-title {
    font-size: 14px;
    font-weight: 600;
    letter-spacing: -0.2px;
    color: var(--text-1);
}
.section-meta {
    font-size: 12px;
    font-weight: 500;
    color: var(--text-3);
    font-family: var(--mono);
}
.section-meta.has-value { color: var(--blue); }

/* PET TILES */
.pets-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 10px;
}
.pet-option { position: relative; }
.pet-option input[type="checkbox"] {
    position: absolute; opacity: 0;
    width: 0; height: 0; pointer-events: none;
}
.pet-tile {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 7px;
    padding: 18px 12px 14px;
    background: var(--surface-2);
    border: 1.5px solid var(--border);
    border-radius: var(--radius-md);
    cursor: pointer;
    user-select: none;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}
.pet-tile::before {
    content: '';
    position: absolute; inset: 0;
    background: var(--blue-subtle);
    opacity: 0;
    transition: opacity 0.18s;
}
.pet-tile:hover { border-color: rgba(26,108,245,0.3); }
.pet-tile:hover::before { opacity: 0.5; }
.pet-option input:checked + .pet-tile {
    border-color: var(--blue);
    box-shadow: 0 0 0 3px var(--blue-glow);
}
.pet-option input:checked + .pet-tile::before { opacity: 1; }

.pet-checkmark {
    position: absolute;
    top: 9px; right: 9px;
    width: 17px; height: 17px;
    border-radius: 50%;
    background: var(--blue);
    display: flex; align-items: center; justify-content: center;
    opacity: 0;
    transform: scale(0.4) rotate(-90deg);
    transition: all 0.2s cubic-bezier(0.34,1.56,0.64,1);
}
.pet-checkmark svg { width: 9px; height: 9px; color: #fff; }
.pet-option input:checked + .pet-tile .pet-checkmark {
    opacity: 1;
    transform: scale(1) rotate(0deg);
}
.pet-emoji { font-size: 30px; line-height: 1; position: relative; z-index: 1; }
.pet-name  { font-size: 13px; font-weight: 600; color: var(--text-1); letter-spacing: -0.2px; position: relative; z-index: 1; }
.pet-species { font-size: 11px; color: var(--text-3); font-weight: 400; position: relative; z-index: 1; }
.pet-age {
    font-size: 10px;
    font-family: var(--mono);
    color: var(--blue);
    background: var(--blue-subtle);
    padding: 2px 8px;
    border-radius: 20px;
    position: relative; z-index: 1;
    font-weight: 500;
}

.empty-pets {
    padding: 28px 16px;
    text-align: center;
    background: var(--surface-2);
    border-radius: var(--radius-md);
    border: 1.5px dashed var(--border-md);
}
.empty-pets p { font-size: 14px; color: var(--text-2); }
.empty-pets a { color: var(--blue); font-weight: 600; }

/* SERVICE ROWS */
.service-list { display: flex; flex-direction: column; gap: 8px; }
.service-option { position: relative; }
.service-option input[type="radio"] {
    position: absolute; opacity: 0;
    width: 0; height: 0; pointer-events: none;
}
.service-tile {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 13px 15px;
    background: var(--surface-2);
    border: 1.5px solid var(--border);
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: var(--transition);
    user-select: none;
}
.service-tile:hover { border-color: rgba(26,108,245,0.3); background: #f4f7fe; }
.service-option input:checked + .service-tile {
    border-color: var(--blue);
    background: var(--blue-subtle);
    box-shadow: 0 0 0 3px var(--blue-glow);
}
.service-radio {
    width: 17px; height: 17px;
    border-radius: 50%;
    border: 2px solid var(--border-md);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    transition: var(--transition);
}
.service-radio::after {
    content: '';
    width: 7px; height: 7px;
    border-radius: 50%;
    background: #fff;
    opacity: 0;
    transform: scale(0);
    transition: all 0.15s ease;
}
.service-option input:checked + .service-tile .service-radio { border-color: var(--blue); background: var(--blue); }
.service-option input:checked + .service-tile .service-radio::after { opacity: 1; transform: scale(1); }
.service-icon-box {
    width: 38px; height: 38px;
    border-radius: 10px;
    background: var(--surface);
    border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
    transition: var(--transition);
}
.service-option input:checked + .service-tile .service-icon-box { background: #fff; border-color: rgba(26,108,245,0.15); }
.service-text { flex: 1; min-width: 0; }
.service-name { font-size: 14px; font-weight: 600; color: var(--text-1); letter-spacing: -0.2px; }
.service-description { font-size: 12px; color: var(--text-3); margin-top: 1px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.service-price-tag { font-size: 14px; font-weight: 700; color: var(--blue); font-family: var(--mono); letter-spacing: -0.3px; white-space: nowrap; }

/* DATE */
.date-wrap { position: relative; }
.date-icon {
    position: absolute;
    left: 14px; top: 50%;
    transform: translateY(-50%);
    width: 17px; height: 17px;
    color: var(--text-3);
    pointer-events: none;
}
.date-input {
    width: 100%;
    font-family: var(--font);
    font-size: 15px;
    font-weight: 500;
    letter-spacing: -0.2px;
    color: var(--text-1);
    background: var(--surface-2);
    border: 1.5px solid var(--border);
    border-radius: var(--radius-md);
    padding: 13px 16px 13px 44px;
    transition: var(--transition);
    -webkit-appearance: none;
    appearance: none;
}
.date-input:focus {
    outline: none;
    border-color: var(--blue);
    background: var(--blue-subtle);
    box-shadow: 0 0 0 3px var(--blue-glow);
}
.date-input::-webkit-calendar-picker-indicator { opacity: 0.4; cursor: pointer; }
.date-hint { font-size: 12px; color: var(--text-3); margin-top: 8px; display: flex; align-items: center; gap: 5px; }

/* VALIDATION */
.field-error { font-size: 12px; color: var(--red); margin-top: 8px; display: flex; align-items: center; gap: 5px; font-weight: 500; }
.field-error::before { content: '⚠'; font-size: 11px; }

/* SUMMARY */
.summary-section {
    padding: 20px 28px;
    background: var(--surface-2);
    border-top: 1px solid var(--border);
}
.summary-title { font-size: 11px; font-weight: 600; letter-spacing: 0.6px; text-transform: uppercase; color: var(--text-3); margin-bottom: 12px; }
.summary-items { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
.summary-item {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    padding: 11px 13px;
    transition: var(--transition);
}
.summary-item.filled { border-color: rgba(26,108,245,0.2); background: var(--blue-subtle); }
.summary-item-label { font-size: 10px; font-weight: 600; letter-spacing: 0.4px; text-transform: uppercase; color: var(--text-3); margin-bottom: 3px; }
.summary-item.filled .summary-item-label { color: rgba(26,108,245,0.7); }
.summary-item-value { font-size: 13px; font-weight: 600; color: var(--text-3); letter-spacing: -0.2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.summary-item.filled .summary-item-value { color: var(--blue); }

/* SUBMIT */
.submit-section { padding: 20px 28px 26px; }
.submit-btn {
    width: 100%;
    font-family: var(--font);
    font-size: 15px;
    font-weight: 700;
    letter-spacing: -0.2px;
    color: #fff;
    background: var(--blue);
    border: none;
    border-radius: var(--radius-md);
    padding: 15px 24px;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center; gap: 8px;
    transition: var(--transition);
    position: relative; overflow: hidden;
}
.submit-btn::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.08) 0%, transparent 60%);
    pointer-events: none;
}
.submit-btn:hover { background: var(--blue-hover); transform: translateY(-1px); box-shadow: 0 4px 16px rgba(26,108,245,0.38); }
.submit-btn:active { transform: translateY(0); box-shadow: none; }
.submit-btn svg { width: 17px; height: 17px; }
.submit-note { text-align: center; font-size: 12px; color: var(--text-3); margin-top: 10px; display: flex; align-items: center; justify-content: center; gap: 5px; }

/* ALERT */
.alert-success { display: flex; align-items: center; gap: 10px; background: var(--green-subtle); border: 1px solid rgba(23,168,88,0.22); border-radius: var(--radius-md); padding: 13px 16px; font-size: 14px; font-weight: 500; color: #0f6b35; margin-bottom: 20px; }

@media (max-width: 500px) {
    .page-wrap { padding: 28px 14px 60px; }
    .form-section { padding: 20px 18px; }
    .summary-section { padding: 18px 18px; }
    .submit-section { padding: 18px 18px 22px; }
    .pets-grid { grid-template-columns: repeat(2, 1fr); }
    .summary-items { grid-template-columns: 1fr; gap: 7px; }
    .breadcrumb-trail { display: none; }
    .page-heading h1 { font-size: 24px; }
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
            <span>Book Appointment</span>
        </div>
    </div>

    <!-- HEADING -->
    <div class="page-heading">
        <div class="eyebrow">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor">
                <rect x="0" y="0" width="4.2" height="4.2" rx="1.2"/>
                <rect x="5.8" y="0" width="4.2" height="4.2" rx="1.2"/>
                <rect x="0" y="5.8" width="4.2" height="4.2" rx="1.2"/>
                <rect x="5.8" y="5.8" width="4.2" height="4.2" rx="1.2"/>
            </svg>
            New Appointment
        </div>
        <h1>Schedule a Vet Visit</h1>
        <p>Complete all three steps below to confirm your booking.</p>
    </div>

    <!-- PROGRESS -->
    <div class="progress-steps">
        <div class="step-item">
            <div class="step-dot active" id="dot1">1</div>
            <span class="step-label active" id="lbl1">Pets</span>
        </div>
        <div class="step-connector" id="conn1"></div>
        <div class="step-item">
            <div class="step-dot" id="dot2">2</div>
            <span class="step-label" id="lbl2">Service</span>
        </div>
        <div class="step-connector" id="conn2"></div>
        <div class="step-item">
            <div class="step-dot" id="dot3">3</div>
            <span class="step-label" id="lbl3">Date</span>
        </div>
    </div>

    @if(session('success'))
    <div class="alert-success">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="9" r="7.5"/>
            <path d="M5.5 9l2.5 2.5 4.5-5"/>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf

        <div class="form-card">

            <!-- STEP 1: PETS -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-title-wrap">
                        <div class="step-badge">1</div>
                        <span class="section-title">Select Pets</span>
                    </div>
                    <span class="section-meta" id="petMeta">— none selected</span>
                </div>

                @if($pets->isEmpty())
                <div class="empty-pets">
                    <p>No pets on file. <a href="{{ route('pets.create') }}">Add your first pet →</a></p>
                </div>
                @else
                <div class="pets-grid">
                    @foreach($pets as $pet)
                    <label class="pet-option">
                        <input
                            type="checkbox"
                            name="pet_ids[]"
                            value="{{ $pet->id }}"
                            onchange="syncSummary()"
                            {{ in_array($pet->id, old('pet_ids', [])) ? 'checked' : '' }}
                        >
                        <div class="pet-tile">
                            <div class="pet-checkmark">
                                <svg viewBox="0 0 9 9" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 4.5l2.5 2.5 4-4"/>
                                </svg>
                            </div>
                            <div class="pet-emoji">@php
                                $s = strtolower($pet->species ?? '');
                                if($s==='cat') echo '🐱';
                                elseif($s==='bird') echo '🐦';
                                elseif($s==='rabbit') echo '🐰';
                                elseif($s==='fish') echo '🐟';
                                elseif($s==='hamster') echo '🐹';
                                else echo '🐶';
                            @endphp</div>
                            <div class="pet-name">{{ $pet->name }}</div>
                            <div class="pet-species">{{ $pet->species }}</div>
                            @if($pet->age)
                            <div class="pet-age">{{ $pet->age }} yrs</div>
                            @endif
                        </div>
                    </label>
                    @endforeach
                </div>
                @endif

                @error('pet_ids')
                <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- STEP 2: SERVICE -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-title-wrap">
                        <div class="step-badge">2</div>
                        <span class="section-title">Choose a Service</span>
                    </div>
                    <span class="section-meta" id="svcMeta">— none selected</span>
                </div>

                <div class="service-list">
                    @php
                        $icons = [
                            'groom'   => '✂️',
                            'vaccin'  => '💉',
                            'check'   => '🩺',
                            'dental'  => '🦷',
                            'surgery' => '🏥',
                            'deworm'  => '💊',
                            'bath'    => '🛁',
                            'x-ray'   => '🔬',
                        ];
                    @endphp
                    @foreach($services as $service)
                    <label class="service-option">
                        <input
                            type="radio"
                            name="service_id"
                            value="{{ $service->id }}"
                            onchange="syncSummary()"
                            {{ old('service_id') == $service->id ? 'checked' : '' }}
                            required
                        >
                        <div class="service-tile">
                            <div class="service-radio"></div>
                            <div class="service-icon-box">@php
                                $ico = '🏥';
                                foreach($icons as $k => $v) {
                                    if(stripos($service->name, $k) !== false) { $ico = $v; break; }
                                }
                                echo $ico;
                            @endphp</div>
                            <div class="service-text">
                                <div class="service-name">{{ $service->name }}</div>
                                @if($service->description ?? false)
                                <div class="service-description">{{ Str::limit($service->description, 55) }}</div>
                                @endif
                            </div>
                            <div class="service-price-tag">₱{{ number_format($service->price, 0) }}</div>
                        </div>
                    </label>
                    @endforeach
                </div>

                @error('service_id')
                <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- STEP 3: DATE -->
            <div class="form-section" style="border-bottom:none;">
                <div class="section-header">
                    <div class="section-title-wrap">
                        <div class="step-badge">3</div>
                        <span class="section-title">Appointment Date</span>
                    </div>
                    <span class="section-meta" id="dateMeta">— not set</span>
                </div>

                <div class="date-wrap">
                    <svg class="date-icon" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1.5" y="3.5" width="15" height="13" rx="2.5"/>
                        <path d="M5.5 1.5v4M12.5 1.5v4M1.5 8h15"/>
                    </svg>
                    <input
                        type="date"
                        name="appointment_date"
                        class="date-input"
                        id="apptDate"
                        value="{{ old('appointment_date') }}"
                        min="{{ date('Y-m-d') }}"
                        onchange="syncSummary()"
                        required
                    >
                </div>
                <div class="date-hint">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="6" cy="6" r="5"/>
                        <path d="M6 5.5v3M6 4h.01"/>
                    </svg>
                    Available Monday – Saturday. Same-day bookings subject to availability.
                </div>

                @error('appointment_date')
                <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- SUMMARY -->
            <div class="summary-section">
                <div class="summary-title">Booking Summary</div>
                <div class="summary-items">
                    <div class="summary-item" id="sumPets">
                        <div class="summary-item-label">Pets</div>
                        <div class="summary-item-value" id="sumPetsVal">—</div>
                    </div>
                    <div class="summary-item" id="sumSvc">
                        <div class="summary-item-label">Service</div>
                        <div class="summary-item-value" id="sumSvcVal">—</div>
                    </div>
                    <div class="summary-item" id="sumDate">
                        <div class="summary-item-label">Date</div>
                        <div class="summary-item-value" id="sumDateVal">—</div>
                    </div>
                </div>
            </div>

            <!-- SUBMIT -->
            <div class="submit-section">
                <button type="submit" class="submit-btn">
                    <svg viewBox="0 0 17 17" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 8.5h11M9.5 4l4.5 4.5L9.5 13"/>
                    </svg>
                    Confirm Appointment
                </button>
                <div class="submit-note">
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="1" y="4" width="9" height="6.5" rx="1.5"/>
                        <path d="M3.5 4V3a2 2 0 014 0v1"/>
                    </svg>
                    Your appointment will be reviewed and confirmed by the clinic.
                </div>
            </div>

        </div>

    </form>

</div>

<script>
function syncSummary() {
    const checked = [...document.querySelectorAll('input[name="pet_ids[]"]:checked')];
    const petMeta = document.getElementById('petMeta');
    const sumPets = document.getElementById('sumPets');
    const sumPetsVal = document.getElementById('sumPetsVal');

    if (checked.length) {
        const names = checked.map(cb => cb.closest('.pet-option').querySelector('.pet-name').textContent.trim());
        const txt = names.length > 2 ? names[0] + ' +' + (names.length - 1) : names.join(', ');
        petMeta.textContent = checked.length + (checked.length === 1 ? ' pet selected' : ' pets selected');
        petMeta.classList.add('has-value');
        sumPetsVal.textContent = txt;
        sumPets.classList.add('filled');
    } else {
        petMeta.textContent = '— none selected';
        petMeta.classList.remove('has-value');
        sumPetsVal.textContent = '—';
        sumPets.classList.remove('filled');
    }

    const svc = document.querySelector('input[name="service_id"]:checked');
    const svcMeta = document.getElementById('svcMeta');
    const sumSvc = document.getElementById('sumSvc');
    const sumSvcVal = document.getElementById('sumSvcVal');

    if (svc) {
        const name = svc.closest('.service-option').querySelector('.service-name').textContent.trim();
        const price = svc.closest('.service-option').querySelector('.service-price-tag').textContent.trim();
        svcMeta.textContent = name;
        svcMeta.classList.add('has-value');
        sumSvcVal.textContent = name + ' · ' + price;
        sumSvc.classList.add('filled');
    } else {
        svcMeta.textContent = '— none selected';
        svcMeta.classList.remove('has-value');
        sumSvcVal.textContent = '—';
        sumSvc.classList.remove('filled');
    }

    const dateVal = document.getElementById('apptDate').value;
    const dateMeta = document.getElementById('dateMeta');
    const sumDate = document.getElementById('sumDate');
    const sumDateVal = document.getElementById('sumDateVal');

    if (dateVal) {
        const d = new Date(dateVal + 'T00:00:00');
        dateMeta.textContent = d.toLocaleDateString('en-US', { weekday:'short', month:'short', day:'numeric', year:'numeric' });
        dateMeta.classList.add('has-value');
        sumDateVal.textContent = d.toLocaleDateString('en-US', { month:'short', day:'numeric', year:'numeric' });
        sumDate.classList.add('filled');
    } else {
        dateMeta.textContent = '— not set';
        dateMeta.classList.remove('has-value');
        sumDateVal.textContent = '—';
        sumDate.classList.remove('filled');
    }

    // Progress dots
    const d1=document.getElementById('dot1'), l1=document.getElementById('lbl1');
    const d2=document.getElementById('dot2'), l2=document.getElementById('lbl2');
    const d3=document.getElementById('dot3'), l3=document.getElementById('lbl3');
    const c1=document.getElementById('conn1'), c2=document.getElementById('conn2');
    const checkSVG = '<svg width="11" height="11" viewBox="0 0 11 11" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M1.5 5.5l3 3 5-5"/></svg>';

    function markDone(dot, lbl, num) { dot.className='step-dot done'; dot.innerHTML=checkSVG; lbl.className='step-label'; }
    function markActive(dot, lbl, num) { dot.className='step-dot active'; dot.innerHTML=num; lbl.className='step-label active'; }
    function markIdle(dot, lbl, num) { dot.className='step-dot'; dot.innerHTML=num; lbl.className='step-label'; }

    if (checked.length) { markDone(d1,l1,'1'); c1.classList.add('done'); } else { markActive(d1,l1,'1'); c1.classList.remove('done'); }
    if (svc) { markDone(d2,l2,'2'); c2.classList.add('done'); }
    else if (checked.length) { markActive(d2,l2,'2'); c2.classList.remove('done'); }
    else { markIdle(d2,l2,'2'); c2.classList.remove('done'); }
    if (dateVal) { markDone(d3,l3,'3'); }
    else if (svc) { markActive(d3,l3,'3'); }
    else { markIdle(d3,l3,'3'); }
}

document.addEventListener('DOMContentLoaded', syncSummary);
</script>

@endsection