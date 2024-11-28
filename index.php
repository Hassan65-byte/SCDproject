<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="home.css">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="signup-page" style="background-image: url('ban1.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 bg-transparent">
        <div class="card-body p-5">
            <h1 class="text-center text-white fw-bold mb-4" style="font-size:50px;">Signup Form</h1>
            <form action="register.php" method="POST" class="w-75 mx-auto" onsubmit="return validateForm()">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control rounded-3" id="name" name="name" placeholder="John Smith" required>
                    <label for="name">Name</label>
                    <small id="nameError" class="text-danger"></small>
                </div>

                <div class="form-floating mb-4">
                    <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="info@example.com" required>
                    <label for="email">Email</label>
                    <small id="emailError" class="text-danger"></small>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" class="form-control rounded-3" id="contact" name="contact" placeholder="923001234567" required>
                    <label for="contact">Contact</label>
                    <small id="contactError" class="text-danger"></small>
                </div>

                <div class="form-floating mb-4">
                    <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    <small id="passwordError" class="text-danger"></small>
                </div>

                <div class="form-floating mb-4">
                    <input type="password" class="form-control rounded-3" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    <label for="confirm_password">Confirm Password</label>
                </div>

                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-primary btn-lg rounded-3">Sign Up</button>
                </div>
            </form>
            <div class="style.css">
            <p class="style.css">Already registered? <a href="login.php" class="text-decoration-none fw-bold white-link">Login here</a></p>

            </div>
        </div>
    </div>
</div>

    

   

    <!-- JavaScript Form Validation -->
    <script>
function validateForm() {
    // Get form fields
    const nameField = document.getElementById('name');
    const emailField = document.getElementById('email');
    const contactField = document.getElementById('contact');
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirm_password');

    const name = nameField.value;
    const email = emailField.value;
    const contact = contactField.value;
    const password = passwordField.value;
    const confirmPassword = confirmPasswordField.value;

    // Error elements
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const contactError = document.getElementById('contactError');
    const passwordError = document.getElementById('passwordError');

    let isValid = true; // Flag to track if form is valid

    // Name validation: Alphabetic characters only and between 3 and 25 characters
    const nameRegex = /^[A-Za-z\s]+$/;
    if (!nameRegex.test(name)) {
        nameError.textContent = 'Name must contain only alphabetic characters.';
        nameField.style.borderColor = 'red';
        isValid = false;
    } else if (name.length < 3 || name.length > 25) {
        nameError.textContent = 'Name must be between 3 and 25 characters';
        nameField.style.borderColor = 'red';
        isValid = false;
    } else {
        nameError.textContent = '';
        nameField.style.borderColor = 'green';
    }

    // Email validation: Check if "@" is present
    if (!email.includes("@")) {
        emailError.textContent = 'Email should contain "@" sign';
        emailField.style.borderColor = 'red';
        isValid = false;
    } else {
        // Check email availability
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'check_email.php', true); // Asynchronous request
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.exists) {
                    emailError.textContent = 'User with this email is already registered';
                    emailField.style.borderColor = 'red';
                    isValid = false;
                } else {
                    emailError.textContent = ''; // Clear error if valid
                    emailField.style.borderColor = 'green';
                }
            } else {
                emailError.textContent = 'Error checking email availability. Please try again.';
                emailField.style.borderColor = 'red';
                isValid = false;
            }
        };

        // Send the email data to the server
        xhr.send('email=' + encodeURIComponent(email));
    }

    // Contact validation
    if (contact.length < 11 || isNaN(contact)) {
        contactError.textContent = 'Contact number should be at least 11 digits and numeric';
        contactField.style.borderColor = 'red';
        isValid = false;
    } else {
        contactError.textContent = '';
        contactField.style.borderColor = 'green';
    }

    // Password validation
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>[\]\\/~`_+=-]).{8,}$/;

    if (!passwordRegex.test(password)) {
        passwordError.textContent = 'Password must be at least 8 characters long, contain at least one number, one uppercase letter, one lowercase letter, and one special character.';
        passwordField.style.borderColor = 'red';
        isValid = false;
    } else if (password !== confirmPassword) {
        passwordError.textContent = 'Passwords do not match!';
        confirmPasswordField.style.borderColor = 'red';
        isValid = false;
    } else {
        passwordError.textContent = '';
        passwordField.style.borderColor = 'green';
        confirmPasswordField.style.borderColor = 'green';
    }

    return isValid; // Submit the form only if all fields are valid
}

</script>
 <!-- Bootstrap JS and Popper.js -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

