<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Laravel Admin')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
            color: #1f2937;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 240px;
            height: 100vh;

            background: #1f2937;
            color: white;

            padding: 25px 15px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            padding: 0 15px 30px;
        }

        .nav-link {
            display: block;

            color: #d1d5db;
            text-decoration: none;

            padding: 13px 15px;
            margin-bottom: 5px;

            border-radius: 8px;

            transition: 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #374151;
            color: white;
        }

        .main {
            margin-left: 240px;
            min-height: 100vh;
        }

        .topbar {
            height: 70px;

            background: white;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 30px;

            border-bottom: 1px solid #e5e7eb;
        }

        .topbar h2 {
            font-size: 20px;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .avatar {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: #667eea;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: bold;
        }

        .logout-button {
            border: none;

            background: #ef4444;
            color: white;

            padding: 9px 15px;

            border-radius: 7px;

            cursor: pointer;
        }

        .content {
            padding: 30px;
        }

        @media (max-width: 700px) {

            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->

    <aside class="sidebar">

        <div class="logo">
            Laravel Admin
        </div>

        <a
            href="/dashboard"
            class="nav-link"
        >
            Dashboard
        </a>

        <a
            href="/departments"
            class="nav-link"
        >
            Departments
        </a>

        <a
            href="/users"
            class="nav-link"
        >
            Users
        </a>

        <a
            href="/roles"
            class="nav-link"
        >
            Roles
        </a>

        <a
            href="/authorization"
            class="nav-link"
        >
            Authorization
        </a>

    </aside>


    <!-- Main -->

    <main class="main">

        <!-- Topbar -->

        <header class="topbar">

            <h2>
                @yield('page-title', 'Dashboard')
            </h2>

            <div class="user-section">

                <span>
                    {{ Auth::user()->name }}
                </span>

                <div class="avatar">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>

                <form
                    method="POST"
                    action="/logout"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout-button"
                    >
                        Logout
                    </button>

                </form>

            </div>

        </header>


        <!-- Page Content -->

        <div class="content">

            @yield('content')

        </div>

    </main>

</body>
</html>