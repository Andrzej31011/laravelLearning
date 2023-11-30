import './bootstrap';
import zxcvbn from 'zxcvbn';

document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');

    if (passwordInput) {
        passwordInput.addEventListener('input', function () {
            const passwordStrength = zxcvbn(passwordInput.value);
            const strengthMeter = document.getElementById('password-strength-meter');
            const strengthText = document.getElementById('password-strength-text');

            // Usuń wszystkie istniejące klasy Tailwind
            strengthMeter.classList.remove('bg-red-500', 'bg-yellow-500', 'bg-blue-500', 'bg-green-500');

            // strengthMeter.value ranges from 0 to 4 (0 = weakest, 4 = strongest)
            strengthMeter.value = passwordStrength.score;

            // Dodaj klasę Tailwind koloru w zależności od siły hasła
            switch (passwordStrength.score) {
                case 0:
                    strengthText.innerText = 'Very Weak';
                    strengthMeter.classList.add('bg-red-500');
                    break;
                case 1:
                    strengthText.innerText = 'Weak';
                    strengthMeter.classList.add('bg-red-500');
                    break;
                case 2:
                    strengthText.innerText = 'Fair';
                    strengthMeter.classList.add('bg-yellow-500');
                    break;
                case 3:
                    strengthText.innerText = 'Good';
                    strengthMeter.classList.add('bg-blue-500');
                    break;
                case 4:
                    strengthText.innerText = 'Strong';
                    strengthMeter.classList.add('bg-green-500');
                    break;
                default:
                    strengthText.innerText = '';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const flashMessage = document.getElementById('flash-message');
    if (flashMessage) {
        flashMessage.style.display = 'block';
        setTimeout(function() {
            flashMessage.style.display = 'none';
        }, 3000); // Komunikat zostanie ukryty po 3 sekundach
    }
});

