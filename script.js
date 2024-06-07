document.getElementById('registrationForm').addEventListener('submit', function(event) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    
    if (password !== confirmPassword) {
        alert('As senhas não coincidem.');
        event.preventDefault();
    }
});

document.getElementById('confirmPassword').addEventListener('input', function() {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var message = document.getElementById('passwordMessage');
    
    if (password === confirmPassword) {
        message.textContent = 'As senhas coincidem.';
        message.style.color = 'green';
    } else {
        message.textContent = 'As senhas não coincidem.';
        message.style.color = 'red';
    }
});
