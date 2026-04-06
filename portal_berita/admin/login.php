<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffdde1, #ee9ca7);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
            overflow: hidden;
        }

        /* ANIMASI BACKGROUND */
        body::before {
            content: "";
            position: absolute;
            width: 300%;
            height: 300%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 10%, transparent 10%);
            background-size: 50px 50px;
            animation: moveBg 20s linear infinite;
        }

        @keyframes moveBg {
            from { transform: translate(0,0); }
            to { transform: translate(-100px,-100px); }
        }

        /* LOGIN BOX */
        .login-box {
            position: relative;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(15px);
            padding: 35px;
            border-radius: 20px;
            width: 360px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        h3 {
            font-weight: bold;
            color: #d63384;
        }

        /* INPUT */
        .form-control {
            border-radius: 10px;
            transition: 0.3s;
        }

        .form-control:focus {
            box-shadow: 0 0 10px #ff7eb3;
            border-color: #ff7eb3;
        }

        /* BUTTON */
        .btn-login {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            border: none;
            border-radius: 10px;
            transition: 0.3s;
            color: white;
        }

        .btn-login:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* CAPTCHA */
        .captcha-img {
            cursor: pointer;
            border-radius: 10px;
            transition: 0.3s;
        }

        .captcha-img:hover {
            transform: scale(1.05);
        }

        /* ICON PASSWORD */
        .input-group-text {
            cursor: pointer;
        }

    </style>
</head>

<body>

<div class="login-box text-center">
    <h3>CIU News</h3>
    <h6>Admin login</h6>

    <!-- ERROR -->
    <?php 
    session_start();
    if(isset($_SESSION['error'])) { 
        if($_SESSION['error'] == 'captcha'){
            echo "<div class='alert alert-danger'>Captcha salah!</div>";
        } else {
            echo "<div class='alert alert-danger'>Username atau password salah!</div>";
        }
        unset($_SESSION['error']);
    }
    ?>

    <form method="POST" action="proses_login.php">

        <!-- USERNAME -->
        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

        <!-- PASSWORD + TOGGLE -->
        <div class="input-group mb-3">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <span class="input-group-text" onclick="togglePassword()">
                <i class="bi bi-eye"></i>
            </span>
        </div>

        <!-- CAPTCHA -->
        <img src="captcha.php" class="captcha-img mb-2" id="captchaImg"
            onclick="refreshCaptcha()">

        <input type="text" name="captcha" class="form-control mb-3" placeholder="Masukkan captcha" required>

        <!-- BUTTON -->
        <button class="btn btn-login w-100">Login</button>

    </form>
</div>

<script>
    function refreshCaptcha() {
        document.getElementById("captchaImg").src = "captcha.php?" + Math.random();
    }

    function togglePassword() {
        let pass = document.getElementById("password");
        pass.type = pass.type === "password" ? "text" : "password";
    }
</script>

</body>
</html>