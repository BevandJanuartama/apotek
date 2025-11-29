<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel - The PHP Framework For Web Artisans</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #1a202c;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .bg-animation span {
            position: absolute;
            display: block;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.1);
            animation: move 25s linear infinite;
            bottom: -150px;
        }

        .bg-animation span:nth-child(1) { left: 25%; animation-delay: 0s; width: 80px; height: 80px; }
        .bg-animation span:nth-child(2) { left: 10%; animation-delay: 2s; width: 20px; height: 20px; }
        .bg-animation span:nth-child(3) { left: 70%; animation-delay: 4s; width: 20px; height: 20px; }
        .bg-animation span:nth-child(4) { left: 40%; animation-delay: 0s; width: 60px; height: 60px; }
        .bg-animation span:nth-child(5) { left: 65%; animation-delay: 0s; width: 20px; height: 20px; }
        .bg-animation span:nth-child(6) { left: 75%; animation-delay: 3s; width: 110px; height: 110px; }
        .bg-animation span:nth-child(7) { left: 35%; animation-delay: 7s; width: 150px; height: 150px; }
        .bg-animation span:nth-child(8) { left: 50%; animation-delay: 15s; width: 25px; height: 25px; }
        .bg-animation span:nth-child(9) { left: 20%; animation-delay: 2s; width: 15px; height: 15px; }
        .bg-animation span:nth-child(10) { left: 85%; animation-delay: 0s; width: 150px; height: 150px; }

        @keyframes move {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }

        /* Container */
        .container {
            position: relative;
            z-index: 1;
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
            animation: fadeInDown 0.8s ease;
        }

        .logo {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo svg {
            width: 40px;
            height: 40px;
        }

        nav {
            display: flex;
            gap: 1rem;
        }

        nav a {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Hero Section */
        .hero {
            text-align: center;
            margin-bottom: 4rem;
            animation: fadeInUp 1s ease;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hero p {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            font-size: 1.1rem;
        }

        .btn-primary {
            background: white;
            color: #667eea;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid white;
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        /* Commands Section */
        .commands-section {
            animation: fadeInUp 1.2s ease;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            text-align: center;
            margin-bottom: 3rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .commands-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .command-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .command-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .command-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .command-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .command-title {
            font-size: 1rem;
            font-weight: 600;
            color: #2d3748;
            font-family: 'Courier New', monospace;
            background: #f7fafc;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            flex: 1;
            word-break: break-all;
        }

        .command-description {
            color: #4a5568;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Category Headers */
        .category-header {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            margin: 3rem 0 1.5rem 0;
            padding-left: 1rem;
            border-left: 5px solid white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 2rem;
            color: rgba(255, 255, 255, 0.8);
            animation: fadeIn 1.5s ease;
        }

        footer a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.2rem;
            }

            .commands-grid {
                grid-template-columns: 1fr;
            }

            .category-header {
                font-size: 1.5rem;
            }

            nav {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-animation">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="container">
        <!-- Header -->
        <header>
            <div class="logo">
                <svg viewBox="0 0 50 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.055.038.078.06.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51c0-.07.01-.141.028-.208.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06.03-.024.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068.025.02.054.038.077.06.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216l17.62-10.144zM1.602 7.719v31.068L19.22 48.93v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-.002-21.481L4.965 9.654 1.602 7.72zm8.81-5.994L2.405 6.334l8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764l4.645-2.674V7.719l-3.363 1.936-4.646 2.675v20.096l3.364-1.937zM39.243 7.164l-8.006 4.609 8.006 4.609 8.005-4.61-8.005-4.608zm-.801 10.605l-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937v-9.124zM20.02 38.33l11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833 7.993 4.524z" fill="white"/>
                </svg>
                Laravel
            </div>
            <nav>
                <a href="/login">Log in</a>
                <a href="/register">Register</a>
            </nav>
        </header>

        <!-- Hero Section -->
        <div class="hero">
            <h1>Laravel Command Reference</h1>
            <p>Master Laravel development with these essential Artisan commands</p>
            <P>DIBUAT OLEH BEPANTEXX</P>
            <div class="cta-buttons">
                <a href="https://laravel.com/docs" class="btn btn-primary" target="_blank">Documentation</a>
                <a href="https://laracasts.com" class="btn btn-secondary" target="_blank">Learn Laravel</a>
            </div>
        </div>
        
        <!-- Commands Section -->
        <div class="commands-section">
            <h2 class="section-title">Artisan Commands Cheat Sheet</h2>

            <!-- Project Setup -->
            <h3 class="category-header">🚀 Project Setup</h3>
            <div class="commands-grid">
                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">📦</div>
                        <div class="command-title">composer create-project laravel/laravel nama_project</div>
                    </div>
                    <p class="command-description">Membuat project Laravel baru dengan semua dependencies yang diperlukan.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🔧</div>
                        <div class="command-title">php artisan serve</div>
                    </div>
                    <p class="command-description">Menjalankan server development lokal (default: http://localhost:8000).</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🔑</div>
                        <div class="command-title">php artisan key:generate</div>
                    </div>
                    <p class="command-description">Generate application key untuk keamanan enkripsi Laravel.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">⚙️</div>
                        <div class="command-title">php artisan optimize</div>
                    </div>
                    <p class="command-description">Optimize aplikasi dengan cache configuration, routes, dan views.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🧹</div>
                        <div class="command-title">php artisan optimize:clear</div>
                    </div>
                    <p class="command-description">Membersihkan semua cache optimization (config, route, view, dll).</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">📁</div>
                        <div class="command-title">php artisan storage:link</div>
                    </div>
                    <p class="command-description">Membuat symbolic link dari public/storage ke storage/app/public.</p>
                </div>
            </div>

            <!-- Model Commands -->
            <h3 class="category-header">🎯 Model Commands</h3>
            <div class="commands-grid">
                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">📝</div>
                        <div class="command-title">php artisan make:model NamaModel</div>
                    </div>
                    <p class="command-description">Membuat model baru di folder app/Models.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🗄️</div>
                        <div class="command-title">php artisan make:model NamaModel -m</div>
                    </div>
                    <p class="command-description">Membuat model sekaligus migration untuk struktur tabel database.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🎮</div>
                        <div class="command-title">php artisan make:model NamaModel -c</div>
                    </div>
                    <p class="command-description">Membuat model sekaligus controller.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🔄</div>
                        <div class="command-title">php artisan make:model NamaModel -r</div>
                    </div>
                    <p class="command-description">Membuat model dan controller resource (CRUD methods otomatis).</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🏭</div>
                        <div class="command-title">php artisan make:model NamaModel -f</div>
                    </div>
                    <p class="command-description">Membuat model sekaligus factory untuk generate data dummy.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🎁</div>
                        <div class="command-title">php artisan make:model NamaModel -a</div>
                    </div>
                    <p class="command-description">Membuat model dengan migration, factory, seeder, controller, policy, dan form requests.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">⚡</div>
                        <div class="command-title">php artisan make:model NamaModel -mcr</div>
                    </div>
                    <p class="command-description">Membuat model, migration, dan controller resource sekaligus.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">💎</div>
                        <div class="command-title">php artisan make:model NamaModel -mcrf</div>
                    </div>
                    <p class="command-description">Membuat model, migration, controller resource, dan factory sekaligus.</p>
                </div>
            </div>

            <!-- Migration & Database -->
            <h3 class="category-header">🗄️ Migration & Database</h3>
            <div class="commands-grid">
                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">📄</div>
                        <div class="command-title">php artisan make:migration create_table_name</div>
                    </div>
                    <p class="command-description">Membuat file migration baru untuk struktur database.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">▶️</div>
                        <div class="command-title">php artisan migrate</div>
                    </div>
                    <p class="command-description">Menjalankan semua migration untuk membuat tabel di database.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🔄</div>
                        <div class="command-title">php artisan migrate:fresh</div>
                    </div>
                    <p class="command-description">Drop semua tabel dan jalankan ulang migration dari awal.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🌱</div>
                        <div class="command-title">php artisan migrate:fresh --seed</div>
                    </div>
                    <p class="command-description">Drop semua tabel, migrate ulang, dan jalankan seeder.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">⏪</div>
                        <div class="command-title">php artisan migrate:rollback</div>
                    </div>
                    <p class="command-description">Membatalkan migration terakhir (menghapus tabel/perubahan).</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">⏮️</div>
                        <div class="command-title">php artisan migrate:rollback --step=2</div>
                    </div>
                    <p class="command-description">Rollback beberapa migration sekaligus (contoh: 2 migration terakhir).</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🔃</div>
                        <div class="command-title">php artisan migrate:refresh</div>
                    </div>
                    <p class="command-description">Rollback semua migration dan jalankan ulang.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🔍</div>
                        <div class="command-title">php artisan migrate:status</div>
                    </div>
                    <p class="command-description">Menampilkan status semua migration (sudah dijalankan atau belum).</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🌱</div>
                        <div class="command-title">php artisan db:seed</div>
                    </div>
                    <p class="command-description">Menjalankan seeder untuk memasukkan data dummy ke database.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🎲</div>
                        <div class="command-title">php artisan db:seed --class=UserSeeder</div>
                    </div>
                    <p class="command-description">Menjalankan seeder spesifik (contoh: UserSeeder).</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🏭</div>
                        <div class="command-title">php artisan make:seeder NamaSeeder</div>
                    </div>
                    <p class="command-description">Membuat file seeder baru untuk data dummy.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🔧</div>
                        <div class="command-title">php artisan make:factory NamaFactory</div>
                    </div>
                    <p class="command-description">Membuat factory untuk generate data testing.</p>
                </div>
            </div>

            <!-- Controller Commands -->
            <h3 class="category-header">🎮 Controller Commands</h3>
            <div class="commands-grid">
                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">📋</div>
                        <div class="command-title">php artisan make:controller NamaController</div>
                    </div>
                    <p class="command-description">Membuat controller baru (empty controller).</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">📦</div>
                        <div class="command-title">php artisan make:controller NamaController --resource</div>
                    </div>
                    <p class="command-description">Membuat resource controller dengan CRUD methods (index, create, store, show, edit, update, destroy).</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🔗</div>
                        <div class="command-title">php artisan make:controller NamaController --model=NamaModel</div>
                    </div>
                    <p class="command-description">Membuat resource controller yang terhubung dengan model tertentu.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🌐</div>
                        <div class="command-title">php artisan make:controller API/NamaController --api</div>
                    </div>
                    <p class="command-description">Membuat API controller tanpa create dan edit methods.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🔨</div>
                        <div class="command-title">php artisan make:controller NamaController --invokable</div>
                    </div>
                    <p class="command-description">Membuat single action controller dengan method __invoke().</p>
                </div>
            </div>

            <!-- Route Commands -->
            <h3 class="category-header">🛣️ Route Commands</h3>
            <div class="commands-grid">
                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">📋</div>
                        <div class="command-title">php artisan route:list</div>
                    </div>
                    <p class="command-description">Menampilkan daftar semua route yang terdaftar di aplikasi.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🔍</div>
                        <div class="command-title">php artisan route:list --columns=method,uri,name</div>
                    </div>
                    <p class="command-description">Menampilkan route dengan kolom tertentu saja.</p>
                </div>

                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">💾</div>
                        <div class="command-title">php artisan route:cache</div>
                    </div>
                    <p class="command-description">Cache routes untuk meningkatkan performa loading aplikasi
                    </p>.
                </div>                                                                          
                <div class="command-card">
                    <div class="command-header">
                        <div class="command-icon">🧹</div>
                        <div class="command-title">php artisan route:clear</div>
                    </div>
                    <p class="command-description">Membersihkan route cache.</p>
                </div>
            </div>
        </div>      
    </div>  
    <!-- Footer --> 
    <footer class="text-center py-4 text-gray-700 flex flex-col items-center gap-1">
    {{-- <span>&copy; 2024 Laravel Command Reference. Built with ❤️ by Bepantexx.</span> --}}

    <a href="https://www.instagram.com/jnrtma?igsh=MXJydmdwenFoYnA1Yw%3D%3D&utm_source=qr"
        target="_blank"
        class="flex items-center gap-2 text-pink-600 hover:text-pink-700">
        <p>&copy; 2024 Laravel Command Reference. Built with ❤️ by Bepantexx.</p>
    </a>
</footer>

</body>
</html>