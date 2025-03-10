<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth Arjuna</title>
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
            <h1>Hi Bro, Its Arjuna</h1>
            <p>Mau ngerjain apa hari ini, sini tak bantu</p>
        </div>
        <form id="loginForm" onsubmit="return handleLogin(event)">
            <!-- email -->
            <div class="form-group">
                <input type="email" class="form-input" id="username" placeholder="Nama Surel Kamu" inputmode="text" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                <i class="input-icon fas fa-envelope"></i>
                <span class="error-message" id="emailError"></span>
            </div>

            <!-- password -->
            <div class="form-group">
                <input type="password" class="form-input" id="password" placeholder="Kata sandi" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required>
                <i class="input-icon fas fa-lock"></i>
                <i class="right-input-icon fas fa-eye" id="passwordIcon" onclick="toggleSee()"></i>
                <span class="error-message" id="passwordError"></span>
            </div>

            <button type="submit" class="submit-button">Masuk</button>
        </form>
        <div class="divider">
            <span>atau coba cara lain</span>
        </div>
        <div class="social-login">
            <button class="social-button" onclick="handleSocialLogin('google')">
                <i class="fab fa-google"></i>
            </button>
            <button class="social-button" onclick="handleSocialLogin('apple')">
                <i class="fas fa-qrcode"></i>
            </button>
            <button class="social-button" onclick="handleSocialLogin('github')">
                <i class="fab fa-telegram"></i>
            </button>
        </div>
        <div class="additional-options">
            <a href="#" onclick="handleForgotPassword()">Lupa kata sandi?</a>
            <p style="margin-top: 1rem"> Belum punya akun untuk masuk? <a href="<?=base_url();?>registrasi">Daftar sekarang</a>
            </p>
        </div>
    </div>
</body>
</html>