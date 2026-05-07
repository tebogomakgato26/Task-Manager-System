<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Task Manager') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Figtree', sans-serif; background: #f0fdf4; }
        .sidebar { width: 220px; min-height: 100vh; background: #059669; position: fixed; top: 0; left: 0; display: flex; flex-direction: column; z-index: 100; }
        .sidebar-brand { padding: 20px 16px; border-bottom: 1px solid rgba(255,255,255,0.2); display: flex; align-items: center; gap: 10px; }
        .sidebar-brand-icon { width: 32px; height: 32px; border-radius: 8px; background: #fff; display: flex; align-items: center; justify-content: center; font-weight: 600; color: #059669; font-size: 14px; }
        .sidebar-brand-name { color: #fff; font-size: 15px; font-weight: 600; }
        .sidebar-nav { padding: 12px 8px; flex: 1; }
        .sidebar-link { display: flex; align-items: center; gap: 10px; padding: 9px 12px; border-radius: 6px; color: rgba(255,255,255,0.75); text-decoration: none; font-size: 13px; margin-bottom: 4px; transition: all 0.2s; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,0.2); color: #fff; }
        .sidebar-user { padding: 12px 16px; border-top: 1px solid rgba(255,255,255,0.2); display: flex; align-items: center; gap: 8px; }
        .sidebar-avatar { width: 30px; height: 30px; border-radius: 50%; background: #fff; display: flex; align-items: center; justify-content: center; font-size: 11px; color: #059669; font-weight: 600; }
        .main-content { margin-left: 220px; min-height: 100vh; display: flex; flex-direction: column; }
        .topbar { background: #fff; padding: 12px 24px; border-bottom: 1px solid #e5e7eb; display: flex; align-items: center; justify-content: space-between; }
        .page-body { padding: 24px; flex: 1; }
        .btn-primary { background: #059669; border-color: #059669; }
        .btn-primary:hover { background: #047857; border-color: #047857; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-icon">T</div>
            <span class="sidebar-brand-name">Task Manager</span>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('tasks.index') }}" class="sidebar-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
                My Tasks
            </a>
            <a href="{{ route('categories.index') }}" class="sidebar-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
              Categories
            </a>
            <a href="#" class="sidebar-link">
                Team
            </a>
            <a href="{{ route('profile.edit') }}" class="sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                Profile
            </a>
        </nav>
        <div class="sidebar-user">
            <div class="sidebar-avatar">{{ substr(Auth::user()->name, 0, 2) }}</div>
            <div>
                <p style="color:#fff; font-size:12px; margin:0; font-weight:500;">{{ Auth::user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:rgba(255,255,255,0.7); font-size:11px; padding:0; cursor:pointer;">Log out</button>
                </form>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <span style="font-size:15px; font-weight:500; color:#111827;">{{ $header ?? 'Dashboard' }}</span>
        </div>
        <div class="page-body">
            {{ $slot }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>