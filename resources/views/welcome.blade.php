<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving App</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f766e, #059669, #16a34a, #4ade80);
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.5s ease;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .card {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 1rem;
            backdrop-filter: blur(14px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            color: #f0fdf4;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.4);
        }

        .btn-primary {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #16a34a, #15803d);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(21, 128, 61, 0.5);
        }

        .illustration {
            max-width: 120px;
            margin: 20px 0;
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.35));
        }

        h1 {
            font-weight: 700;
            font-size: 2rem;
            color: #bbf7d0;
        }

        p {
            font-weight: 400;
            font-size: 1rem;
            color: #dcfce7;
        }

        /* === Dark Mode Adaptif === */
        @media (prefers-color-scheme: dark) {
            body {
                background: linear-gradient(135deg, #064e3b, #065f46, #047857, #059669);
            }

            .card {
                background: rgba(0, 0, 0, 0.4);
                border: 1px solid rgba(255, 255, 255, 0.1);
                color: #d1fae5;
            }

            h1 {
                color: #a7f3d0;
            }

            p {
                color: #6ee7b7;
            }

            .btn-primary {
                background: linear-gradient(135deg, #16a34a, #15803d);
            }

            .btn-primary:hover {
                background: linear-gradient(135deg, #22c55e, #15803d);
            }
        }
    </style>
</head>

<body>

    <div class="card text-center shadow-lg p-5" style="max-width: 460px;">
        <div class="card-body">

            <h1 class="mb-3">Welcome to Saving App</h1>

            <!-- Illustration -->
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Saving Illustration"
                class="illustration">

            <p class="mb-4">Manage your savings in a modern, secure, and efficient way. Click below to start.</p>
            <a href="{{ url('/savings') }}" class="btn btn-primary btn-lg px-5 py-2">
                Enter Saving App
            </a>
        </div>
    </div>

</body>

</html>
