<?php
session_start();
if (isset($_SESSION['salah'])) {
    echo '<script>alert("Username atau Password yang dimasukan salah")</script>';
}
// destroy the session
session_destroy();
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link rel="stylesheet" href="../skripsispk/assets/login.css">
    <style>
        /* Warna Background */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            /*background: #94D4F3 !important;*/
            background-image: linear-gradient(#94D4F3, #5564D6) !important;
        }

        /* Login Form */
        .login-container {
            width: 400px;
            height: 400px;
            background: #FEFFFF !important;
            background-size: 100%;
            padding: 10px;
            position: absolute;
            /*border-radius:10px;*/
            box-shadow: 2px 2px 2px rgba(255, 173, 78, 0.5);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #icon {
            width: 150px;
        }

        .admin-icon {
            display: table;
            margin: 0 auto;
            border-radius: 50%;
            background-color: white;
        }

        .user-icon {
            display: table;
            margin: 0 auto;
            margin-top: -80px;
        }

        .admin-login-form {
            margin-top: 20px;
        }

        .login-form {
            margin-top: 50px;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 3px solid #ccc;
            outline: none;
            border-radius: 4px;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            border: 3px solid #5564D6;
            border-radius: 4px;
        }

        input[type=submit] {
            width: 100%;
            /*background-color: #FFAD4E;*/
            background-color: #5564D6;
            color: #FEFFFF;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            outline: none;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="admin-icon">
            <img src="admin2.png" id="icon" alt="User Icon" />
        </div>
        <div class="admin-login-form">
            <form name="login" method="post" action="admin_validate.php">
                <div>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <input type="submit" name="submit" value="LOGIN">
                </div>
                <div>
                    <small class="font-weight-bold">Login Lurah disini <a class="text-danger" href="loginlurah.php">Login</a></small>
                </div>
            </form>
        </div>
    </div>
</body>

</html>