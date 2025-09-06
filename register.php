<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WeHealth - Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-cyan-400 to-blue-600 flex items-center justify-center min-h-screen p-4">

  <div class="bg-white shadow-xl rounded-lg flex flex-col md:flex-row w-full max-w-4xl h-auto md:h-[550px] overflow-hidden">

    <!-- Doctor Image Section -->
    <div class="w-full md:w-1/2 bg-gradient-to-tr from-blue-500 to-cyan-400 flex items-center justify-center relative p-4 order-1 md:order-2">
      <img src="./images/logo-doctor.png" alt="Doctor" class="h-[220px] md:h-[380px] object-contain">
      <div class="absolute bottom-6 left-6 bg-white shadow-md p-2 rounded-lg text-sm hidden md:block">
        <p class="font-semibold">Create Account</p>
        <p class="text-gray-500">Join WeHealth and start now...</p>
      </div>
    </div>

    <!-- Registration Form Section -->
<div class="w-full md:w-1/2 flex justify-center items-center order-2 md:order-1 p-4">
  <div class="bg-white shadow-md rounded-lg p-6 md:p-8 w-full max-w-md">
    <div class="mb-6 text-center md:text-left">
      <img src="./images/logo.svg" alt="WeHealth Logo" class="h-10 mb-2 mx-auto md:mx-0">
      <h2 class="text-2xl font-bold text-gray-700">Create Your Account</h2>
    </div>

    <form class="space-y-3">
      <input type="text" placeholder="Full Name" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <input type="email" placeholder="Email Address" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <input type="text" placeholder="Username" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

      <!-- Password with Eye Icon -->
      <div class="relative">
        <input type="password" id="password" placeholder="Password" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10">
        <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer" onclick="togglePassword('password', this)"></i>
      </div>

      <button class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition">Register</button>
    </form>

    <p class="mt-4 text-sm text-gray-500 text-center md:text-left">
      Already have an account? <a href="http://localhost/core2-hospital" class="text-blue-500 hover:underline">Login</a>
    </p>
  </div>
</div>


  </div>

<script>
function togglePassword(id, icon) {
  let input = document.getElementById(id);
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
</script>

</body>
</html>
