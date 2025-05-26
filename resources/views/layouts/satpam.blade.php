<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/tailwind-custom.css">
    <link rel="stylesheet" href="/css/optimize.css">
    <link rel="stylesheet" href="/css/table-fix.css">
    <link rel="stylesheet" href="/css/mobile-optimize.css">
    <link rel="stylesheet" href="/css/tambah-tamu.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">
    <div class="app-container">
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>
        
        <aside id="sidebar" class="sidebar bg-white shadow-lg">
            <div class="sidebar-header p-4 border-b flex items-center justify-between">
                <h3 class="text-xl font-semibold text-gray-800">Security Panel</h3>
            </div>
            <nav class="mt-4">
                <div class="menu-section px-4">
                    <div class="menu-item">
                        <a href="{{ route('satpam.dashboard') }}" class="flex items-center text-gray-600 hover:text-blue-500">
                            <i class="fas fa-home w-6"></i>
                            <span>Dashboard</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('satpam.tambah-tamu') }}" class="flex items-center text-gray-600 hover:text-blue-500">
                            <i class="fas fa-user-plus w-6"></i>
                            <span>Tambah Tamu</span>
                        </a>
                    </div>  
                    <div class="menu-item">
                        <a href="{{ route('satpam.daftar-tamu') }}" class="flex items-center text-gray-600 hover:text-blue-500">
                            <i class="fas fa-users w-6"></i>
                            <span>Daftar Tamu</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('satpam.jadwal-satpam') }}" class="flex items-center text-gray-600 hover:text-blue-500">
                            <i class="fas fa-calendar w-6"></i>
                            <span>Jadwal Satpam</span>
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <main id="main-content" class="main-content bg-gray-100">
            <div class="topbar bg-white shadow-sm">
                <button id="sidebar-toggle" class="p-2 rounded-lg hover:bg-gray-100 focus:outline-none">
                    <i class="fas fa-bars text-gray-600"></i>
                </button>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Welcome, Security</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                    <button onclick="confirmLogout()" class="text-red-500 hover:text-red-600">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </div>
            </div>

            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

    <style>
        .app-container {
            display: flex;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            background: #fff;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar.collapsed {
            width: 90px;
        }

        .sidebar.collapsed .menu-item span {
            display: none;
        }

        .sidebar.collapsed .menu-item i {
            margin: 0 auto;
        }

        .sidebar-header {
            padding: 1.25rem;
            border-bottom: 1px solid #e5e7eb;
            background: #f8fafc;
        }

        .sidebar.collapsed .sidebar-header h3 {
            display: none;
        }

        .menu-section {
            padding: 1rem;
        }

        .menu-item {
            margin: 0.75rem 0;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            padding: 0.875rem 1rem;
            border-radius: 0.5rem;
            color: #4b5563;
            transition: all 0.2s ease;
            gap: 0.75rem;
        }

        .menu-item a:hover {
            background-color: #f3f4f6;
            color: #3b82f6;
        }

        .menu-item i {
            font-size: 1.25rem;
            width: 1.5rem;
            text-align: center;
            transition: all 0.2s ease;
        }

        .main-content {
            flex: 1;
            margin-left: 250px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 900;
            padding: 1rem 1.5rem;
            background: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }

            .sidebar.collapsed {
                width: 280px;
            }

            .sidebar.collapsed .menu-item span {
                display: inline;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .main-content.expanded {
                margin-left: 0;
            }

            #sidebar-overlay {
                backdrop-filter: blur(2px);
                transition: all 0.3s ease;
                opacity: 0;
                visibility: hidden;
            }

            #sidebar-overlay.show {
                opacity: 1;
                visibility: visible;
            }

            body.sidebar-open {
                overflow: hidden;
            }

            .menu-item a {
                padding: 1rem;
            }
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const overlay = document.getElementById('sidebar-overlay');
        let isSidebarCollapsed = false;

        function toggleSidebar() {
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
                document.body.classList.toggle('sidebar-open');
            } else {
                isSidebarCollapsed = !isSidebarCollapsed;
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            }
        }

        function handleResize() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                document.body.classList.remove('sidebar-open');
                if (isSidebarCollapsed) {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('expanded');
                }
            } else {
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
            }
        }

        sidebarToggle.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);
        window.addEventListener('resize', handleResize);
    });
    </script>

    <script>
    function confirmLogout() {
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Apakah Anda yakin ingin logout tamu ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#22c55e',
            cancelButtonColor: '#ef4444',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            background: '#fff',
            customClass: {
                popup: 'rounded-lg shadow-xl',
                title: 'text-xl font-semibold text-gray-800',
                content: 'text-gray-600 mt-2',
                confirmButton: 'px-6 py-2 rounded-md text-white font-medium hover:bg-green-600 transition-colors',
                cancelButton: 'px-6 py-2 rounded-md text-white font-medium hover:bg-red-600 transition-colors'
            },
            showClass: {
                popup: 'animate__animated animate__fadeInDown animate__faster'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp animate__faster'
            },
            backdrop: `
                rgba(0,0,0,0.4)
                left top
                no-repeat
            `,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: true,
            focusConfirm: false,
            heightAuto: false,
            padding: '2em'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
    </script>
</body>
</html>