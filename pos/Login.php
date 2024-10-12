<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Login</title>
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
    <div class="container" id="container">
        <!-- Sign In Form -->
        <div class="form-container sign-in-container">
            <form method="post" action="login_process.php">
                <h1 data-translate="sign_in_title">Sign In</h1>
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" id="password" placeholder="Password" required />
                <input type="checkbox" id="show-password"> <span data-translate="show_password">Show Password</span>
                <button type="submit" data-translate="sign_in_button">Sign In</button>
            </form>
        </div>

        <!-- Forget Password Form -->
        <div class="form-container forget-password-container">
            <form method="post" action="forget_password_process.php">
                <h1 data-translate="forget_password_title">Forget Password</h1>
                <span data-translate="forget_password_instructions">Enter your email and phone number to reset your password</span>
                <input type="email" name="email" placeholder="Email" required />
                <input type="tel" name="nope" placeholder="" required pattern="^\+\d{9,13}$" title="Format: +Kode negara diikuti 9 hingga 13 digit." data-translate="phone_number_placeholder" />
                <button type="submit" data-translate="submit_button">Submit</button>
            </form>
        </div>

        <!-- Overlay Panel -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 data-translate="welcome_back">Welcome Back!</h1>
                    <p data-translate="login_instructions">To keep connected with us, please login with your personal info</p>
                    <button class="ghost" id="signIn" data-translate="sign_in_button_overlay">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 data-translate="forgot_password">Forgot Your Password?</h1>
                    <p data-translate="recover_account">Enter your personal details to recover your account</p>
                    <button class="ghost" id="forgetPassword" data-translate="forget_password_button">Forget Password</button>
                </div>
            </div>
        </div>
        
        <footer>
            <div class="language-selector">
                <label for="language" data-translate="language_label">Choose Language:</label>
                <select id="language" onchange="changeLanguage()">
                    <option value="en">English</option>
                    <option value="id">Bahasa Indonesia</option>
                    <option value="zh">中文 (Chinese)</option>
                </select>
            </div>
            <p data-translate="footer_text">Copyrights © 2024, Panca Code. All rights reserved.</p>
        </footer>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/translations.js"></script> 
</body>
</html>
