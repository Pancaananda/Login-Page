const translations = {
    en: {
        sign_in_title: "Sign In",
        show_password: "Show Password",
        sign_in_button: "Sign In",
        forget_password_title: "Forget Password",
        forget_password_instructions: "Enter your email and phone number to reset your password",
        submit_button: "Submit",
        welcome_back: "Welcome Back!",
        login_instructions: "To keep connected with us, please login with your personal info",
        sign_in_button_overlay: "Sign In",
        forgot_password: "Forgot Your Password?",
        recover_account: "Enter your personal details to recover your account",
        forget_password_button: "Forget Password",
        footer_text: "Copyrights © 2024, Panca Code. All rights reserved.",
        language_label: "Choose Language:",
        phone_number_placeholder: "Phone Number (e.g., +(Country Code) 81234567890)"
    },
    id: {
        sign_in_title: "Masuk",
        show_password: "Tampilkan Kata Sandi",
        sign_in_button: "Masuk",
        forget_password_title: "Lupa Kata Sandi",
        forget_password_instructions: "Masukkan email dan nomor telepon Anda untuk mengatur ulang kata sandi",
        submit_button: "Kirim",
        welcome_back: "Selamat Datang Kembali!",
        login_instructions: "Untuk tetap terhubung dengan kami, silakan masuk dengan informasi pribadi Anda",
        sign_in_button_overlay: "Masuk",
        forgot_password: "Lupa Kata Sandi?",
        recover_account: "Masukkan detail pribadi Anda untuk memulihkan akun Anda",
        forget_password_button: "Lupa Kata Sandi",
        footer_text: "Copyrights © 2024, Panca Code. semua hak dilindungi undang-undang",
        language_label: "Pilih Bahasa:",
        phone_number_placeholder: "Nomor Telepon (contoh: +(Kode negara) 81234567890)"
    },
    zh: {
        sign_in_title: "登录",
        show_password: "显示密码",
        sign_in_button: "登录",
        forget_password_title: "忘记密码",
        forget_password_instructions: "输入您的电子邮件和电话号码以重置密码",
        submit_button: "提交",
        welcome_back: "欢迎回来!",
        login_instructions: "要与我们保持联系，请使用您的个人信息登录",
        sign_in_button_overlay: "登录",
        forgot_password: "忘记您的密码?",
        recover_account: "输入您的个人信息以找回您的帐户",
        forget_password_button: "忘记密码",
        footer_text: "Copyrights © 2024, Panca Code. 版权所有",
        language_label: "选择语言:",
        phone_number_placeholder: "电话号码（例如：+(国家代码) 81234567890）"
    }
};

function changeLanguage() {
    const selectedLang = document.getElementById('language').value;
    const elements = document.querySelectorAll('[data-translate]');

    elements.forEach(el => {
        const key = el.getAttribute('data-translate');
        el.textContent = translations[selectedLang][key];
    });

    // Update phone number placeholder dynamically
    document.querySelector('input[name="nope"]').placeholder = translations[selectedLang]["phone_number_placeholder"];
}
