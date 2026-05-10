<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard AquaNode Kepri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Background Gradient Gelap ala Hacker/IoT */
        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar tembus pandang (Glass Effect) */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Kartu Sensor dengan efek kaca */
        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 25px;
            transition: all 0.3s ease;
            height: 100%;
        }

        .glass-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Ikon bulat berwarna */
        .icon-box {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }
        
        .bg-temp { background: rgba(13, 202, 240, 0.2); color: #0dcaf0; }
        .bg-ph { background: rgba(32, 201, 151, 0.2); color: #20c997; }
        .bg-do { background: rgba(220, 53, 69, 0.2); color: #ff4d4d; }

        /* Animasi darurat berkedip */
        .pulse-danger {
            animation: pulse-animation 1.5s infinite;
            border: 1px solid rgba(220, 53, 69, 0.6);
        }

        @keyframes pulse-animation {
            0% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(220, 53, 69, 0); }
            100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
        }

        /* Teks Data */
        .sensor-value {
            font-size: 3.5rem;
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-custom py-3 mb-5">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="navbar-brand h1 mb-0 fw-bold">
                <i class="fa-solid fa-water me-2 text-info"></i> AquaNode Kepri
            </span>
            <span class="badge bg-success rounded-pill px-3 py-2">
                <i class="fa-solid fa-wifi me-1"></i> Sistem Online
            </span>
        </div>
    </nav>

    <div class="container flex-grow-1">
        <div class="row mb-4 align-items-end">
            <div class="col-md-8">
                <h5 class="text-info text-uppercase tracking-wide mb-1"><i class="fa-solid fa-location-dot me-2"></i>Live Monitoring</h5>
                <h2 class="fw-bold">{{ $sensorData['lokasi'] }}</h2>
            </div>
            <div class="col-md-4 text-md-end text-light" style="opacity: 0.85;">
                <small><i class="fa-regular fa-clock me-1"></i>Update Terakhir: Just Now</small>
            </div>
        </div>
        
        <div class="row g-4">
            
            <div class="col-md-4">
                <div class="glass-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="icon-box bg-temp">
                            <i class="fa-solid fa-temperature-half"></i>
                        </div>
                    </div>
                    <h5 class="text-light fw-normal" style="opacity: 0.9;">Suhu Air Laut</h5>
                    <div class="d-flex align-items-end gap-2">
                        <p class="sensor-value text-info">{{ $sensorData['suhu'] }}</p>
                        <span class="fs-4 mb-2 text-light" style="opacity: 0.7;">°C</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="glass-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="icon-box bg-ph">
                            <i class="fa-solid fa-flask"></i>
                        </div>
                    </div>
                    <h5 class="text-light fw-normal" style="opacity: 0.9;">Kadar Keasaman (pH)</h5>
                    <div class="d-flex align-items-end gap-2">
                        <p class="sensor-value" style="color: #20c997;">{{ $sensorData['ph'] }}</p>
                        <span class="fs-5 mb-2 text-light" style="opacity: 0.7;">Aman</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="glass-card pulse-danger">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="icon-box bg-do">
                            <i class="fa-solid fa-wind"></i>
                        </div>
                        <span class="badge bg-danger p-2"><i class="fa-solid fa-triangle-exclamation me-1"></i>ALERT</span>
                    </div>
                    <h5 class="text-light fw-normal" style="opacity: 0.9;">Oksigen Terlarut (DO)</h5>
                    <div class="d-flex align-items-end gap-2 mb-2">
                        <p class="sensor-value text-danger">{{ $sensorData['oksigen'] }}</p>
                        <span class="fs-5 mb-2 text-light" style="opacity: 0.7;">mg/L</span>
                    </div>
                    <div class="alert alert-danger p-2 mt-3 mb-0 text-center fw-bold" style="background: rgba(220, 53, 69, 0.2); border: none; color: #ff4d4d;">
                        {{ $sensorData['status'] }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="mt-auto py-4 border-top" style="border-color: rgba(255,255,255,0.1) !important;">
        <div class="container text-center text-light" style="opacity: 0.85;">
            <p class="mb-1"><i class="fa-solid fa-microchip me-1"></i> <strong style="opacity: 1;">Proyek UTS Tech-Startup</strong></p>
            <p class="mb-0" style="font-size: 0.9rem;">
                Dikembangkan oleh: <span class="text-info fw-bold" style="opacity: 1;">Rifqi (NIM: 2422047)</span><br>
                Program Studi Teknik Komputer, Institut Teknologi Batam (ITEBA)
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>