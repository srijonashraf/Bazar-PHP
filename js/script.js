(function() {
  const SignUpForm = document.querySelector('.register-form');
  const Password = document.getElementsByName('password')[0];
  const passwordError = document.getElementById('password-error');
  const passwordSuccess = document.getElementById('password-success');

  Password.addEventListener('input', function() {
    const passwordValue = Password.value;
    const passwordLength = passwordValue.length;
    const repeatedCharacters = /(.)\1/.test(passwordValue);
    const hasSpecialCharacter = /[!@#$%^&*(),.?":{}|<>]/.test(passwordValue);
    const hasNumber = /\d/.test(passwordValue);

    let errorMessage = '';
    let successMessage = '';

    if (passwordLength < 8) {
      errorMessage = 'Password should be at least 8 characters long.';
    } else if (repeatedCharacters) {
      errorMessage = 'Password should not contain repeated characters.';
    } else if (!hasSpecialCharacter) {
      errorMessage = 'Password should contain at least one special character.';
    } else if (!hasNumber) {
      errorMessage = 'Password should contain at least one number.';
    } else {
      successMessage = 'Password is secure!';
    }

    if (errorMessage !== '') {
      showError(errorMessage);
    } else {
      hideError();
    }

    if (successMessage !== '') {
      showSuccess(successMessage);
    } else {
      hideSuccess();
    }
  });

  SignUpForm.addEventListener('submit', function(event) {
    if (passwordError.textContent !== '') {
      event.preventDefault(); // Prevent form submission if there is an error
    }
  });

  function showError(message) {
    passwordError.textContent = message;
    passwordError.style.display = 'block';
  }

  function hideError() {
    passwordError.textContent = '';
    passwordError.style.display = 'none';
  }

  function showSuccess(message) {
    passwordSuccess.textContent = message;
    passwordSuccess.style.display = 'block';
  }

  function hideSuccess() {
    passwordSuccess.textContent = '';
    passwordSuccess.style.display = 'none';
  }
})();
