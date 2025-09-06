<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WeHealth - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
  <!-- Toastify CSS & JS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>
<body class="bg-gradient-to-r from-cyan-400 to-blue-600 flex items-center justify-center min-h-screen p-4">

  <div class="bg-white shadow-xl rounded-lg flex flex-col md:flex-row w-full max-w-4xl h-auto md:h-[500px] overflow-hidden">

    <!-- Doctor Image Section -->
    <div class="w-full md:w-1/2 bg-gradient-to-tr from-blue-500 to-cyan-400 flex items-center justify-center relative p-4 order-1 md:order-2">
      <img src="./images/logo-doctor.png" alt="Doctor" class="h-[220px] md:h-[380px] object-contain">
      <div class="absolute bottom-6 left-6 bg-white shadow-md p-2 rounded-lg text-sm hidden md:block">
        <p class="font-semibold">Secure Login</p>
        <p class="text-gray-500">Access your account anytime...</p>
      </div>
    </div>

    <!-- Login Form Section -->
    <div class="w-full md:w-1/2 flex justify-center items-center order-2 md:order-1 p-4">
      <div class="bg-white shadow-md rounded-lg p-6 md:p-8 w-full max-w-md">
        <div class="mb-6 text-center md:text-left">
          <img src="./images/logo.svg" alt="WeHealth Logo" class="h-10 mb-2 mx-auto md:mx-0">
          <h2 class="text-2xl font-bold text-gray-700">Welcome Back</h2>
        </div>

        <form id="loginForm" class="space-y-3">
          <input type="text" id="email" placeholder="Email" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>

          <!-- Password with Eye Icon -->
          <div class="relative">
            <input type="password" id="password" placeholder="Password" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10" required>
            <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer" onclick="togglePassword('password', this)"></i>
          </div>

          <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition">Login</button>
        </form>

        <p class="mt-4 text-sm text-gray-500 text-center md:text-left">
          Don’t have an account? <a href="register.php" class="text-blue-500 hover:underline">Register</a>
        </p>
      </div>
    </div>

  </div>

<script>
function togglePassword(id, icon) {
  const input = document.getElementById(id);
  if (input.type === "password") {
    input.type = "text";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    input.type = "password";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}

// Toast helper
function showToast(message, type) {
  Toastify({
    text: message,
    style: {
      background: type === 'success' ? 
        "linear-gradient(to right, #00b09b, #96c93d)" : 
        "linear-gradient(to right, #ff5f6d, #ffc371)"
    },
    duration: 3000,
    close: true
  }).showToast();
}

// Sample front-end authentication
document.getElementById('loginForm').addEventListener('submit', function(e){
  e.preventDefault(); // prevent form submission

  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();

  // Hardcoded credentials
  const validEmail = "core2@example.com";
  const validPassword = "core123";

  if(email === validEmail && password === validPassword){
    showToast("Login successful!", "success");
    // Redirect to dashboard after a short delay
    setTimeout(() => {
      window.location.href = "pages/dashboard.php"; // change this to your actual dashboard
    }, 1000);
  } else {
    showToast("Invalid email or password", "error");
  }
});
</script>

</body>
</html>
