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
            background: linear-gradient(135deg, #4F46E5, #22D3EE);
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 1rem;
            backdrop-filter: blur(10px);
        }
        .btn-primary {
            background: #22D3EE;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #1FB7D1;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .illustration {
            max-width: 150px;
            margin-bottom: 20px;
        }
        h1 {
            font-weight: 700;
            font-size: 2rem;
        }
        p {
            font-weight: 400;
            font-size: 1rem;
        }
    </style>
</head>
<body>

<div class="card text-center shadow p-5" style="max-width: 450px;">
    <div class="card-body">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Saving Illustration" class="illustration">
        <h1 class="mb-3">Welcome to Saving App</h1>
        <p class="mb-4">Kelola tabunganmu dengan mudah dan aman. Klik tombol di bawah untuk masuk ke aplikasi.</p>
        <a href="{{ url('/savings') }}" class="btn btn-primary btn-lg px-5 py-2">Masuk ke Saving App</a>
    </div>
</div>

</body>
</html>
