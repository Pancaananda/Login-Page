const signInButton = document.getElementById('signIn');
const forgetPasswordButton = document.getElementById('forgetPassword');
const container = document.getElementById('container');

// Add right-panel-active class when Forget Password link is clicked
forgetPasswordButton.addEventListener('click', (event) => {
    event.preventDefault(); 
    container.classList.add("right-panel-active");
});

// Remove right-panel-active class when Sign In button is clicked
signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

// Show/Hide Password
const showPasswordCheckbox = document.getElementById('show-password');
const passwordInput = document.getElementById('password');

showPasswordCheckbox.addEventListener('change', () => {
    if (showPasswordCheckbox.checked) {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
});
