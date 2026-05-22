@extends('layouts.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --bg:            #f2f2f4;
    --surface:       #ffffff;
    --surface-2:     #f7f7f9;
    --border:        rgba(0,0,0,0.07);
    --border-md:     rgba(0,0,0,0.11);
    --border-strong: rgba(0,0,0,0.18);
    --text-1:        #111114;
    --text-2:        #5a5a65;
    --text-3:        #9b9ba8;
    --blue:          #1a6cf5;
    --blue-hover:    #1460de;
    --blue-subtle:   #eaf0fe;
    --blue-glow:     rgba(26,108,245,0.14);
    --green:         #17a858;
    --green-hover:   #12924d;
    --green-subtle:  #e6f7ee;
    --green-glow:    rgba(23,168,88,0.16);
    --gcash-blue:    #007aff;
    --gcash-subtle:  #e5f1ff;
    --red:           #e0342a;
    --red-subtle:    #fdecea;
    --amber:         #e08b00;
    --amber-subtle:  #fef5e0;
    --radius-sm:     11px;
    --radius-md:     15px;
    --radius-lg:     20px;
    --radius-xl:     26px;
    --font:          'DM Sans', -apple-system, sans-serif;
    --mono:          'DM Mono', monospace;
    --shadow-card:   0 1px 4px rgba(0,0,0,0.05), 0 4px 20px rgba(0,0,0,0.07);
    --transition:    all 0.18s cubic-bezier(0.4,0,0.2,1);
}

body {
    background: var(--bg);
    font-family: var(--font);
    color: var(--text-1);
    -webkit-font-smoothing: antialiased;
    min-height: 100vh;
}

.page-wrap {
    max-width: 520px;
    margin: 0 auto;
    padding: 40px 20px 80px;
}

/* TOP BAR */
.top-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 32px;
}
.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-size: 14px;
    font-weight: 500;
    color: var(--text-2);
    background: var(--surface);
    border: 1px solid var(--border-md);
    border-radius: var(--radius-sm);
    padding: 8px 14px;
    text-decoration: none;
    transition: var(--transition);
}
.back-btn:hover { background: var(--surface-2); color: var(--text-1); border-color: var(--border-strong); text-decoration: none; }
.back-btn svg { width: 15px; height: 15px; }

.breadcrumb {
    font-size: 13px;
    color: var(--text-3);
    display: flex;
    align-items: center;
    gap: 6px;
}
.breadcrumb a { color: var(--blue); text-decoration: none; font-weight: 500; }
.breadcrumb a:hover { text-decoration: underline; }

/* HEADING */
.page-heading { margin-bottom: 24px; }
.eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.7px;
    text-transform: uppercase;
    color: var(--green);
    background: var(--green-subtle);
    padding: 4px 10px;
    border-radius: 20px;
    margin-bottom: 12px;
}
.page-heading h1 {
    font-size: 26px;
    font-weight: 700;
    letter-spacing: -0.5px;
    color: var(--text-1);
    line-height: 1.2;
}
.page-heading p {
    font-size: 14px;
    color: var(--text-2);
    margin-top: 5px;
    line-height: 1.5;
}

/* MAIN CARD */
.pay-card {
    background: var(--surface);
    border-radius: var(--radius-xl);
    border: 1px solid var(--border);
    box-shadow: var(--shadow-card);
    overflow: hidden;
}

/* ORDER SUMMARY STRIP */
.order-strip {
    background: linear-gradient(135deg, #0f4fc2 0%, #1a6cf5 100%);
    padding: 22px 26px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
}
.order-strip-left { flex: 1; min-width: 0; }
.order-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.6);
    margin-bottom: 4px;
}
.order-service {
    font-size: 17px;
    font-weight: 700;
    color: #fff;
    letter-spacing: -0.3px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.order-pet {
    font-size: 13px;
    color: rgba(255,255,255,0.65);
    margin-top: 3px;
    font-weight: 400;
}
.order-amount-wrap { text-align: right; flex-shrink: 0; }
.order-amount-label {
    font-size: 11px;
    font-weight: 500;
    color: rgba(255,255,255,0.55);
    letter-spacing: 0.3px;
    margin-bottom: 2px;
}
.order-amount {
    font-size: 28px;
    font-weight: 700;
    color: #fff;
    font-family: var(--mono);
    letter-spacing: -0.5px;
    line-height: 1;
}
.order-currency {
    font-size: 14px;
    font-weight: 500;
    vertical-align: super;
    margin-right: 2px;
    opacity: 0.8;
}

/* SECTION */
.pay-section {
    padding: 22px 26px;
    border-bottom: 1px solid var(--border);
}
.pay-section:last-of-type { border-bottom: none; }

.section-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    color: var(--text-3);
    margin-bottom: 14px;
}

/* APPOINTMENT DETAILS GRID */
.details-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}
.detail-item {
    background: var(--surface-2);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    padding: 11px 13px;
}
.detail-item-label { font-size: 11px; font-weight: 600; color: var(--text-3); letter-spacing: 0.3px; text-transform: uppercase; margin-bottom: 3px; }
.detail-item-value { font-size: 14px; font-weight: 600; color: var(--text-1); letter-spacing: -0.2px; }

/* GCASH METHOD CARD */
.method-card {
    display: flex;
    align-items: center;
    gap: 14px;
    background: var(--gcash-subtle);
    border: 1.5px solid rgba(0,122,255,0.2);
    border-radius: var(--radius-md);
    padding: 14px 16px;
}
.gcash-logo {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: var(--gcash-blue);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 22px;
}
.method-info { flex: 1; }
.method-name { font-size: 15px; font-weight: 700; color: var(--text-1); letter-spacing: -0.2px; }
.method-sub  { font-size: 12px; color: var(--text-2); margin-top: 2px; }
.method-badge {
    font-size: 11px;
    font-weight: 600;
    color: var(--gcash-blue);
    background: #fff;
    border: 1px solid rgba(0,122,255,0.2);
    padding: 3px 9px;
    border-radius: 20px;
}

/* GCASH QR / ACCOUNT INFO */
.gcash-info-box {
    background: var(--surface-2);
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    padding: 16px;
    margin-top: 12px;
    display: flex;
    align-items: center;
    gap: 14px;
}
.gcash-qr-placeholder {
    width: 72px;
    height: 72px;
    border-radius: var(--radius-sm);
    background: #fff;
    border: 1px solid var(--border-md);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 32px;
}
.gcash-account { flex: 1; }
.gcash-account-label { font-size: 11px; font-weight: 600; color: var(--text-3); text-transform: uppercase; letter-spacing: 0.4px; margin-bottom: 4px; }
.gcash-account-name { font-size: 15px; font-weight: 700; color: var(--text-1); letter-spacing: -0.2px; }
.gcash-account-number {
    font-size: 18px;
    font-weight: 700;
    font-family: var(--mono);
    color: var(--gcash-blue);
    letter-spacing: 0.5px;
    margin-top: 2px;
}
.gcash-copy-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 12px;
    font-weight: 600;
    color: var(--gcash-blue);
    background: #fff;
    border: 1px solid rgba(0,122,255,0.2);
    border-radius: 7px;
    padding: 4px 10px;
    cursor: pointer;
    margin-top: 6px;
    transition: var(--transition);
    font-family: var(--font);
}
.gcash-copy-btn:hover { background: var(--gcash-subtle); }
.gcash-copy-btn svg { width: 12px; height: 12px; }

/* UPLOAD ZONE */
.upload-zone {
    border: 2px dashed var(--border-md);
    border-radius: var(--radius-md);
    padding: 32px 20px;
    text-align: center;
    cursor: pointer;
    transition: var(--transition);
    background: var(--surface-2);
    position: relative;
    overflow: hidden;
}
.upload-zone:hover, .upload-zone.dragover {
    border-color: var(--blue);
    background: var(--blue-subtle);
}
.upload-zone.has-file {
    border-color: var(--green);
    background: var(--green-subtle);
    border-style: solid;
}
.upload-zone input[type="file"] {
    position: absolute; inset: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%; height: 100%;
}
.upload-icon {
    width: 44px; height: 44px;
    border-radius: 12px;
    background: var(--surface);
    border: 1px solid var(--border-md);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
    margin: 0 auto 12px;
    transition: var(--transition);
}
.upload-zone.has-file .upload-icon { background: var(--green-subtle); border-color: rgba(23,168,88,0.2); }
.upload-zone:hover .upload-icon { background: var(--blue-subtle); border-color: rgba(26,108,245,0.2); }
.upload-title { font-size: 14px; font-weight: 600; color: var(--text-1); letter-spacing: -0.2px; margin-bottom: 4px; }
.upload-sub { font-size: 12px; color: var(--text-3); line-height: 1.4; }
.upload-sub span { color: var(--blue); font-weight: 600; }
.upload-zone.has-file .upload-sub span { color: var(--green); }

/* PREVIEW */
.preview-wrap {
    margin-top: 14px;
    display: none;
    border-radius: var(--radius-md);
    overflow: hidden;
    border: 1px solid var(--border);
    background: var(--surface);
    position: relative;
}
.preview-wrap.visible { display: block; }
.preview-wrap img {
    width: 100%;
    max-height: 260px;
    object-fit: cover;
    display: block;
}
.preview-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 14px;
    background: var(--surface);
    border-top: 1px solid var(--border);
}
.preview-filename { font-size: 13px; font-weight: 500; color: var(--text-2); overflow: hidden; text-overflow: ellipsis; white-space: nowrap; flex: 1; }
.preview-size { font-size: 12px; color: var(--text-3); font-family: var(--mono); margin-left: 10px; white-space: nowrap; }
.preview-remove {
    width: 26px; height: 26px;
    border-radius: 50%;
    background: var(--red-subtle);
    border: none;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    margin-left: 10px;
    transition: var(--transition);
    flex-shrink: 0;
}
.preview-remove:hover { background: var(--red); }
.preview-remove:hover svg { color: #fff; }
.preview-remove svg { width: 13px; height: 13px; color: var(--red); }

/* VALIDATION */
.field-error { font-size: 12px; color: var(--red); margin-top: 8px; display: flex; align-items: center; gap: 5px; font-weight: 500; }
.field-error::before { content: '⚠'; font-size: 11px; }

/* SUBMIT SECTION */
.submit-section { padding: 20px 26px 26px; }
.submit-btn {
    width: 100%;
    font-family: var(--font);
    font-size: 15px;
    font-weight: 700;
    letter-spacing: -0.2px;
    color: #fff;
    background: var(--green);
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
    background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, transparent 60%);
    pointer-events: none;
}
.submit-btn:hover { background: var(--green-hover); transform: translateY(-1px); box-shadow: 0 4px 16px var(--green-glow); }
.submit-btn:active { transform: translateY(0); box-shadow: none; }
.submit-btn:disabled { opacity: 0.5; cursor: not-allowed; transform: none; box-shadow: none; }
.submit-btn svg { width: 17px; height: 17px; }

.submit-note { text-align: center; font-size: 12px; color: var(--text-3); margin-top: 10px; display: flex; align-items: center; justify-content: center; gap: 5px; }

/* ALERT */
.alert-success { display: flex; align-items: center; gap: 10px; background: var(--green-subtle); border: 1px solid rgba(23,168,88,0.22); border-radius: var(--radius-md); padding: 13px 16px; font-size: 14px; font-weight: 500; color: #0f6b35; margin-bottom: 20px; }

@media (max-width: 480px) {
    .page-wrap { padding: 28px 14px 60px; }
    .pay-section { padding: 18px 18px; }
    .order-strip { padding: 18px 18px; }
    .submit-section { padding: 16px 18px 22px; }
    .details-grid { grid-template-columns: 1fr; }
    .breadcrumb { display: none; }
    .order-amount { font-size: 24px; }
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
        <div class="breadcrumb">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <span>›</span>
            <span>Payment</span>
        </div>
    </div>

    <!-- HEADING -->
    <div class="page-heading">
        <div class="eyebrow">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <rect x="1" y="2.5" width="8" height="6" rx="1.2"/>
                <path d="M1 5h8M3.5 1.5v2"/>
                <path d="M6.5 1.5v2"/>
            </svg>
            Secure Payment
        </div>
        <h1>Complete Your Payment</h1>
        <p>Send the exact amount via GCash and upload your screenshot to confirm.</p>
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

    <div class="pay-card">

        <!-- ORDER STRIP -->
        <div class="order-strip">
            <div class="order-strip-left">
                <div class="order-label">Service</div>
                <div class="order-service">{{ $payment->appointment->service->name }}</div>
                @if($payment->appointment->pet->name ?? false)
                <div class="order-pet">For {{ $payment->appointment->pet->name }}</div>
                @endif
            </div>
            <div class="order-amount-wrap">
                <div class="order-amount-label">Total Due</div>
                <div class="order-amount">
                    <span class="order-currency">₱</span>{{ number_format($payment->amount, 0) }}
                </div>
            </div>
        </div>

        <!-- APPOINTMENT DETAILS -->
        <div class="pay-section">
            <div class="section-label">Appointment Details</div>
            <div class="details-grid">
                <div class="detail-item">
                    <div class="detail-item-label">Date</div>
                    <div class="detail-item-value">
                        {{ \Carbon\Carbon::parse($payment->appointment->appointment_date)->format('M d, Y') }}
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-item-label">Status</div>
                    <div class="detail-item-value" style="color: var(--amber);">
                        {{ ucfirst($payment->appointment->status ?? 'Pending') }}
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-item-label">Reference No.</div>
                    <div class="detail-item-value" style="font-family: var(--mono); font-size:13px;">
                        #{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-item-label">Amount</div>
                    <div class="detail-item-value" style="font-family: var(--mono); color: var(--blue);">
                        ₱{{ number_format($payment->amount, 2) }}
                    </div>
                </div>
            </div>
        </div>

        <!-- PAYMENT METHOD -->
        <div class="pay-section">
            <div class="section-label">Payment Method</div>

            <div class="method-card">
                <div class="gcash-logo">💙</div>
                <div class="method-info">
                    <div class="method-name">GCash</div>
                    <div class="method-sub">Mobile wallet · Instant transfer</div>
                </div>
                <div class="method-badge">Selected</div>
            </div>

            <div class="gcash-info-box">
                <div class="gcash-qr-placeholder">📱</div>
                <div class="gcash-account">
                    <div class="gcash-account-label">Send payment to</div>
                    <div class="gcash-account-name">{{ config('app.gcash_name', 'PetCare Clinic') }}</div>
                    <div class="gcash-account-number" id="gcashNum">{{ config('app.gcash_number', '09XX XXX XXXX') }}</div>
                    <button type="button" class="gcash-copy-btn" onclick="copyNumber()">
                        <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="4" width="7" height="7" rx="1.2"/>
                            <path d="M1 8V1h7"/>
                        </svg>
                        <span id="copyText">Copy number</span>
                    </button>
                </div>
            </div>

            <div style="margin-top:12px; background: var(--amber-subtle); border: 1px solid rgba(224,139,0,0.2); border-radius: var(--radius-sm); padding: 11px 14px; display: flex; gap: 9px; align-items: flex-start;">
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" stroke="var(--amber)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; margin-top:1px;">
                    <path d="M7.5 1L14 13H1L7.5 1z"/>
                    <path d="M7.5 6v3M7.5 10.5h.01"/>
                </svg>
                <p style="font-size:12px; color:var(--text-2); line-height:1.5; margin:0;">
                    Send exactly <strong style="color:var(--text-1); font-family:var(--mono);">₱{{ number_format($payment->amount, 2) }}</strong> to the number above. Use <strong style="color:var(--text-1);">Reference No. #{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</strong> as your GCash message/note.
                </p>
            </div>
        </div>

        <!-- PROOF OF PAYMENT UPLOAD -->
        <div class="pay-section" style="border-bottom:none;">
            <div class="section-label">Proof of Payment</div>

            <form method="POST"
                  action="{{ route('payments.pay', $payment->id) }}"
                  enctype="multipart/form-data"
                  id="paymentForm">
                @csrf

                <div class="upload-zone" id="uploadZone">
                    <input
                        type="file"
                        name="proof_of_payment"
                        id="proofInput"
                        accept="image/jpeg,image/png,image/jpg,image/webp"
                        required
                    >
                    <div class="upload-icon" id="uploadIcon">
                        <span id="uploadEmoji">📸</span>
                    </div>
                    <div class="upload-title" id="uploadTitle">Upload GCash Screenshot</div>
                    <div class="upload-sub" id="uploadSub">
                        <span>Click to browse</span> or drag and drop your screenshot here<br>
                        JPG, PNG or WEBP · Max 5MB
                    </div>
                </div>

                <div class="preview-wrap" id="previewWrap">
                    <img id="previewImg" src="" alt="Payment proof preview">
                    <div class="preview-bar">
                        <span class="preview-filename" id="previewName">—</span>
                        <span class="preview-size" id="previewSize">—</span>
                        <button type="button" class="preview-remove" id="removeBtn" title="Remove">
                            <svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                <path d="M2 2l9 9M11 2l-9 9"/>
                            </svg>
                        </button>
                    </div>
                </div>

                @error('proof_of_payment')
                <div class="field-error">{{ $message }}</div>
                @enderror

                <div class="submit-section" style="padding: 20px 0 0;">
                    <button type="submit" class="submit-btn" id="submitBtn" disabled>
                        <svg viewBox="0 0 17 17" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="8.5" cy="8.5" r="7"/>
                            <path d="M5.5 8.5l2 2 4-4"/>
                        </svg>
                        Confirm Payment — ₱{{ number_format($payment->amount, 0) }}
                    </button>
                    <div class="submit-note">
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="1" y="4" width="9" height="6.5" rx="1.5"/>
                            <path d="M3.5 4V3a2 2 0 014 0v1"/>
                        </svg>
                        Your payment will be verified by the clinic within 24 hours.
                    </div>
                </div>

            </form>
        </div>

    </div>

</div>

<script>
const proofInput  = document.getElementById('proofInput');
const uploadZone  = document.getElementById('uploadZone');
const previewWrap = document.getElementById('previewWrap');
const previewImg  = document.getElementById('previewImg');
const previewName = document.getElementById('previewName');
const previewSize = document.getElementById('previewSize');
const removeBtn   = document.getElementById('removeBtn');
const submitBtn   = document.getElementById('submitBtn');
const uploadTitle = document.getElementById('uploadTitle');
const uploadSub   = document.getElementById('uploadSub');
const uploadEmoji = document.getElementById('uploadEmoji');

function formatBytes(bytes) {
    if (bytes < 1024) return bytes + ' B';
    if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
    return (bytes / 1048576).toFixed(1) + ' MB';
}

function setFile(file) {
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        previewImg.src = e.target.result;
        previewWrap.classList.add('visible');
        previewName.textContent = file.name;
        previewSize.textContent = formatBytes(file.size);
        uploadZone.classList.add('has-file');
        uploadEmoji.textContent = '✅';
        uploadTitle.textContent = 'Screenshot attached';
        uploadSub.innerHTML = '<span>Change file</span> or remove below';
        submitBtn.disabled = false;
    };
    reader.readAsDataURL(file);
}

proofInput.addEventListener('change', () => {
    if (proofInput.files[0]) setFile(proofInput.files[0]);
});

removeBtn.addEventListener('click', () => {
    proofInput.value = '';
    previewImg.src = '';
    previewWrap.classList.remove('visible');
    uploadZone.classList.remove('has-file');
    uploadEmoji.textContent = '📸';
    uploadTitle.textContent = 'Upload GCash Screenshot';
    uploadSub.innerHTML = '<span>Click to browse</span> or drag and drop your screenshot here<br>JPG, PNG or WEBP · Max 5MB';
    submitBtn.disabled = true;
});

// Drag & drop
uploadZone.addEventListener('dragover', e => { e.preventDefault(); uploadZone.classList.add('dragover'); });
uploadZone.addEventListener('dragleave', () => uploadZone.classList.remove('dragover'));
uploadZone.addEventListener('drop', e => {
    e.preventDefault();
    uploadZone.classList.remove('dragover');
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        const dt = new DataTransfer();
        dt.items.add(file);
        proofInput.files = dt.files;
        setFile(file);
    }
});

// Copy GCash number
function copyNumber() {
    const num = document.getElementById('gcashNum').textContent.trim();
    navigator.clipboard.writeText(num).then(() => {
        const btn = document.getElementById('copyText');
        btn.textContent = 'Copied!';
        setTimeout(() => btn.textContent = 'Copy number', 2000);
    });
}
</script>

@endsection