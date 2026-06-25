<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
    @yield('title','Dashboard')
    | Inventory Asset System
</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#f1f5f9;
            font-family:'Segoe UI',sans-serif;
            margin:0;
        }

        .sidebar{
    width:250px;
    min-height:100vh;
    background:linear-gradient(
    180deg,
    #0f172a 0%,
    #111827 100%
    );
    position:fixed;
}

.sidebar::-webkit-scrollbar{
    width:6px;
}

.sidebar::-webkit-scrollbar-thumb{
    background:#334155;
    border-radius:10px;
}

        .content{
    margin-left:250px;
    padding:15px 20px;
}

        .sidebar a{
            color:#cbd5e1;
            text-decoration:none;
            display:block;
            padding:14px 20px;
            margin:6px 12px;
            border-radius:10px;
            transition:.3s;
        }

        .sidebar a:hover{
    background:#2563eb;
    color:white;
    transform:translateX(5px);
    box-shadow:0 5px 15px rgba(37,99,235,.35);
}

.sidebar a.active{
    background:#2563eb;
    color:white;
    font-weight:600;
    box-shadow:0 4px 15px rgba(37,99,235,.4);
    border-left:4px solid #60a5fa;
}

        .logo-box{
            text-align:center;
            color:white;
            padding:30px 15px;
            border-bottom:1px solid rgba(255,255,255,.1);
        }

        .logo-box i{
    font-size:48px;
    color:#60a5fa;
    transition:.3s;
}

.logo-box:hover i{
    transform:rotate(-10deg) scale(1.1);
}

        .page-card{
            background:white;
            border:none;
            border-radius:16px;
            box-shadow:0 4px 15px rgba(0,0,0,.08);
        }

        .card{
    border:none;
    border-radius:15px;
    transition:.3s;
}

.card:hover{
    box-shadow:0 10px 25px rgba(0,0,0,.12);
}

.card-body{
    padding:15px;
}

        .stat-card{
    transition:all .35s ease;
    cursor:pointer;
}

.stat-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.18);
}

.stat-card:hover h1{
    transform:scale(1.15);
}

.stat-card h1{
    transition:.3s;
}

        .table{
            margin-bottom:0;
        }

        .header-box{
    background:white;
    border-radius:15px;
    padding:20px 25px;
    margin-bottom:20px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
    border-left:5px solid #2563eb;
    transition:.3s;
}

.header-box:hover{
    box-shadow:0 10px 25px rgba(0,0,0,.12);
}

        .top-action{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        }

        .icon-btn{
    width:42px;
    height:42px;
    display:inline-flex;
    justify-content:center;
    align-items:center;
    border-radius:10px;
    transition:.3s;
}

.icon-btn:hover{
    transform:translateY(-3px);
}

        .menu-btn{
    transition:all .3s ease;
    border-radius:15px;
    font-weight:600;
}

.btn{
    transition:.3s;
}

.btn:hover{
    transform:translateY(-3px);
}

.running-text{
    white-space:nowrap;
    overflow:hidden;
    width:100%;
}

.running-text span{
    display:inline-block;
    padding-left:100%;
    animation:running 18s linear infinite;
}

@keyframes running{
    from{
        transform:translateX(0);
    }
    to{
        transform:translateX(-100%);
    }
}

.running-text{
    width:100%;
    overflow:hidden;
    white-space:nowrap;
    background:#fff;
}

.running-text span{
    display:inline-block;
    padding-left:100%;
    color:#212529;
    font-size:14px;
    font-weight:600;
    animation:runningText 15s linear infinite;
}

@keyframes runningText{
    0%{
        transform:translateX(0);
    }
    100%{
        transform:translateX(-100%);
    }
}

    </style>

</head>

<body>

<div class="sidebar">

    <div class="logo-box">

        <i class="bi bi-box-seam"></i>

        <h4 class="mt-3 fw-bold">
    Inventory Asset
</h4>

<small class="text-secondary">
    Management System
</small>

    </div>

    <a href="{{ route('dashboard') }}"
   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i>
        Dashboard
    </a>

    <a href="{{ route('items.index') }}"
   class="{{ request()->routeIs('items.*') ? 'active' : '' }}">
        <i class="bi bi-box-seam me-2"></i>
        Data Barang
    </a>

    <a href="{{ route('item-types.index') }}"
   class="{{ request()->routeIs('item-types.*') ? 'active' : '' }}">
        <i class="bi bi-tag-fill me-2"></i>
        Jenis Barang
    </a>

    <a href="{{ route('buildings.index') }}"
   class="{{ request()->routeIs('buildings.*') ? 'active' : '' }}">
        <i class="bi bi-building me-2"></i>
        Gedung
    </a>

    <a href="{{ route('rooms.index') }}"
   class="{{ request()->routeIs('rooms.*') ? 'active' : '' }}">
        <i class="bi bi-door-open me-2"></i>
        Ruangan
    </a>

    <a href="{{ route('inventories.index') }}"
   class="{{ request()->routeIs('inventories.*') ? 'active' : '' }}">
        <i class="bi bi-clipboard-data me-2"></i>
        Inventory
    </a>

    <a href="{{ route('inventory-rooms.index') }}"
   class="{{ request()->routeIs('inventory-rooms.*') ? 'active' : '' }}">
        <i class="bi bi-geo-alt-fill me-2"></i>
        Penempatan Barang
    </a>

    <a href="{{ route('inventory-transactions.index') }}"
   class="{{ request()->routeIs('inventory-transactions.*') ? 'active' : '' }}">
        <i class="bi bi-arrow-repeat me-2"></i>
        Transaksi Inventory
    </a>

    @if(auth()->user()->role == 'Admin')

    <a href="{{ route('users.index') }}"
   class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
        <i class="bi bi-people-fill me-2"></i>
        Manajemen User
    </a>

    @endif

</div>

<div class="content">

    <div class="header-box">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h3 class="mb-1">

                    @yield('title','Dashboard')

                </h3>

                <small class="text-muted">

                    Sistem Informasi Inventory Asset

                </small>

            </div>

            <div class="d-flex align-items-center">

    <a href="{{ route('dashboard') }}"
       class="btn btn-primary icon-btn">

        <i class="bi bi-house-door-fill"></i>

    </a>

    <a href="javascript:history.back()"
       class="btn btn-secondary icon-btn ms-2">

        <i class="bi bi-arrow-left"></i>

    </a>

    <div class="d-flex align-items-center ms-4 me-4">
        <i class="bi bi-person-circle fs-2 text-primary me-2"></i>

        <div>

            <div class="fw-bold">
                {{ auth()->user()->name }}
            </div>

            <small class="text-muted">
                {{ auth()->user()->role }}
            </small>

        </div>

    </div>

    <form action="{{ route('logout') }}"
          method="POST"
          style="display:inline;">

        @csrf

        <button class="btn btn-danger icon-btn">

            <i class="bi bi-box-arrow-right"></i>

        </button>

    </form>

</div>

        </div>

    </div>

    @yield('content')
<footer class="text-center text-muted mt-3 pt-2 border-top">

    <small>

        © {{ date('Y') }} Aldiyanra Saputra | Inventory Asset System

    </small>

</footer>
</div>

</body>
</html>