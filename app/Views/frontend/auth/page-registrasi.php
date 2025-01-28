<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth Aswatama</title>
    <link rel="stylesheet" href="<?=base_url();?>public/assets/auth.css">
    <script src="<?=base_url();?>public/assets/auth.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <div class="animated-background">
        <div class="gradient-sphere sphere-1"></div>
        <div class="gradient-sphere sphere-2"></div>
        <div class="gradient-sphere sphere-3"></div>
        <div class="particles" id="particles"></div>
    </div>
    <div class="login-container">
        <div class="login-header">
            <img src="<?=base_url();?>public/assets/image/logo_flow.png" alt="Logo" width="46" height="48" class="d-inline-block align-text-top">
            <h1>Mau bikin akun ?</h1>
            <p>Ini dilengkapi dulu ya, dan tunggu verifikasi</p>
        </div>
        <form id="loginForm" onsubmit="return handleLogin(event)">
            <div class="form-group">
                <input type="email" class="form-input" id="email" placeholder="Nama Surel Kamu" required>
                <i class="input-icon fas fa-envelope"></i>
                <span class="error-message" id="emailError"></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-input" id="nama" placeholder="Diisi namamu" required>
                <i class="input-icon fas fa-user"></i>
                <span class="error-message" id="namaError"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-input" id="password" placeholder="Kata sandi" required>
                <i class="input-icon fas fa-lock"></i>
                <i class="right-input-icon fas fa-eye" id="passwordIcon" onclick="toggleSee()"></i>
                <span class="error-message" id="passwordError"></span>
            </div>
            <button type="submit" class="submit-button">Daftar</button>
        </form>
        <div class="divider">
            <span>Sudah pernah registrasi akun sebelumnya?</span>
        </div>
        <div class="additional-options">
            <p style="margin-top: 1rem"><a href="<?=base_url();?>" >Masuk dengan Akun</a></p>
        </div>
    </div>
</body>
</html>