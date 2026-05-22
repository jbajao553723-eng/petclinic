@extends('layouts.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@500&display=swap" rel="stylesheet">

<style>
:root{
    --bg:#f3f5f9;
    --card:#ffffff;
    --border:#e8edf5;
    --text:#111827;
    --muted:#6b7280;
    --blue:#2563eb;
    --blue-soft:#eff6ff;
    --green:#16a34a;
    --green-soft:#dcfce7;
    --red:#dc2626;
    --red-soft:#fee2e2;
    --shadow:0 8px 30px rgba(15,23,42,.06);
    --radius:20px;
}

body{
    background:var(--bg);
    font-family:'DM Sans',sans-serif;
}

/* PAGE */
.pets-page{
    max-width:1300px;
    margin:35px auto;
    padding:0 22px;
}

/* HEADER */
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:24px;
    gap:16px;
    flex-wrap:wrap;
}

.page-title-wrap{
    display:flex;
    flex-direction:column;
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
    font-size:32px;
    font-weight:700;
    color:var(--text);
    letter-spacing:-1px;
    line-height:1;
    margin:0;
}

.page-sub{
    color:var(--muted);
    margin-top:8px;
    font-size:14px;
}

.back-btn{
    border:none;
    background:#fff;
    border:1px solid var(--border);
    padding:12px 18px;
    border-radius:14px;
    font-size:14px;
    font-weight:600;
    text-decoration:none;
    color:var(--text);
    transition:.2s ease;
    box-shadow:var(--shadow);
}

.back-btn:hover{
    background:#f9fafb;
    transform:translateY(-1px);
    color:var(--text);
}

/* CARD */
.main-card{
    background:var(--card);
    border-radius:var(--radius);
    border:1px solid var(--border);
    overflow:hidden;
    box-shadow:var(--shadow);
}

/* TOP BAR */
.card-top{
    padding:22px 26px;
    border-bottom:1px solid var(--border);
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:14px;
}

.card-title{
    font-size:18px;
    font-weight:700;
    color:var(--text);
    margin-bottom:3px;
}

.card-sub{
    font-size:13px;
    color:var(--muted);
}

.pet-count{
    background:var(--blue-soft);
    color:var(--blue);
    padding:10px 16px;
    border-radius:999px;
    font-size:13px;
    font-weight:700;
}

/* TABLE */
.table{
    margin:0;
}

.table thead th{
    background:#f8fafc;
    color:#64748b;
    font-size:11px;
    text-transform:uppercase;
    letter-spacing:.12em;
    font-weight:700;
    border-bottom:1px solid var(--border)!important;
    padding:18px 24px;
    white-space:nowrap;
}

.table tbody td{
    padding:18px 24px;
    vertical-align:middle;
    border-color:#f1f5f9;
    font-size:14px;
    color:#111827;
}

.table tbody tr{
    transition:.18s ease;
}

.table tbody tr:hover{
    background:#fafcff;
}

/* PET INFO */
.pet-name{
    font-weight:700;
    color:#111827;
    margin-bottom:4px;
}

.pet-id{
    font-size:12px;
    color:#94a3b8;
    font-family:'DM Mono',monospace;
}

.owner-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.owner-avatar{
    width:42px;
    height:42px;
    border-radius:50%;
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:14px;
    font-weight:700;
    flex-shrink:0;
}

.owner-name{
    font-weight:600;
    color:#111827;
}

.owner-email{
    font-size:12px;
    color:#94a3b8;
}

/* BADGES */
.pet-badge{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:8px 12px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

.species-badge{
    background:var(--blue-soft);
    color:var(--blue);
}

.age-badge{
    background:#f3f4f6;
    color:#374151;
}

/* BUTTONS */
.action-wrap{
    display:flex;
    align-items:center;
    gap:8px;
    flex-wrap:wrap;
}

.btn-modern{
    border:none;
    border-radius:12px;
    padding:10px 14px;
    font-size:13px;
    font-weight:700;
    transition:.18s ease;
    text-decoration:none;
}

.btn-view{
    background:var(--blue);
    color:#fff;
}

.btn-view:hover{
    background:#1d4ed8;
    color:#fff;
    transform:translateY(-1px);
}

.btn-delete{
    background:var(--red-soft);
    color:var(--red);
}

.btn-delete:hover{
    background:#fecaca;
    color:#991b1b;
}

/* EMPTY */
.empty-state{
    padding:60px 20px;
    text-align:center;
}

.empty-icon{
    font-size:48px;
    margin-bottom:12px;
}

.empty-title{
    font-size:18px;
    font-weight:700;
    color:#111827;
}

.empty-sub{
    color:#94a3b8;
    font-size:14px;
    margin-top:5px;
}

@media(max-width:768px){

    .page-title{
        font-size:26px;
    }

    .table thead{
        display:none;
    }

    .table tbody tr{
        display:block;
        padding:16px;
        border-bottom:1px solid #f1f5f9;
    }

    .table tbody td{
        display:block;
        border:none;
        padding:8px 0;
    }

    .action-wrap{
        margin-top:10px;
    }
}
</style>

<div class="pets-page">

    <!-- HEADER -->
    <div class="page-header">

        <div class="page-title-wrap">
            <div class="page-label">
                Admin Panel
            </div>

            <h1 class="page-title">
                🐶 Pets Management
            </h1>

            <div class="page-sub">
                View all registered pets and manage pet records.
            </div>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="back-btn">
            ← Back to Dashboard
        </a>

    </div>

    <!-- MAIN CARD -->
    <div class="main-card">

        <!-- CARD HEADER -->
        <div class="card-top">

            <div>
                <div class="card-title">
                    Registered Pets
                </div>

                <div class="card-sub">
                    Complete list of pets inside the veterinary system
                </div>
            </div>

            <div class="pet-count">
                Total Pets: {{ $pets->count() }}
            </div>

        </div>

        <!-- TABLE -->
        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>Pet</th>
                        <th>Owner</th>
                        <th>Species</th>
                        <th>Breed</th>
                        <th>Age</th>
                        <th width="210">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($pets as $pet)

                        <tr>

                            <!-- PET -->
                            <td>

                                <div class="pet-name">
                                    {{ $pet->name }}
                                </div>

                                <div class="pet-id">
                                    PET-{{ str_pad($pet->id, 4, '0', STR_PAD_LEFT) }}
                                </div>

                            </td>

                            <!-- OWNER -->
                            <td>

                                <div class="owner-box">

                                    <div class="owner-avatar">
                                        {{ strtoupper(substr($pet->owner->name ?? 'U',0,1)) }}
                                    </div>

                                    <div>

                                        <div class="owner-name">
                                            {{ $pet->owner->name ?? 'N/A' }}
                                        </div>

                                        <div class="owner-email">
                                            {{ $pet->owner->email ?? 'No email' }}
                                        </div>

                                    </div>

                                </div>

                            </td>

                            <!-- SPECIES -->
                            <td>
                                <span class="pet-badge species-badge">
                                    {{ $pet->species }}
                                </span>
                            </td>

                            <!-- BREED -->
                            <td>
                                {{ $pet->breed ?? 'N/A' }}
                            </td>

                            <!-- AGE -->
                            <td>
                                <span class="pet-badge age-badge">
                                    {{ $pet->age ?? 0 }} yrs
                                </span>
                            </td>

                            <!-- ACTIONS -->
                            <td>

                                <div class="action-wrap">

                                    <a href="{{ route('admin.pets.show', $pet->id) }}"
                                       class="btn-modern btn-view">
                                        View Profile
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.pets.destroy', $pet->id) }}"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-modern btn-delete"
                                                onclick="return confirm('Delete this pet permanently?')">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        🐾
                                    </div>

                                    <div class="empty-title">
                                        No pets found
                                    </div>

                                    <div class="empty-sub">
                                        No pets have been registered yet.
                                    </div>

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