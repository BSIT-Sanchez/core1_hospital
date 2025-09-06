<?php
include '../layout/adminlayout.php';
?>

<?php
$profileContent = '
<div class="p-6 max-w-5xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="mb-6 text-sm text-gray-600" aria-label="breadcrumb">
    <ol class="flex space-x-2">
      <li><a href="../dashboard.php" class="text-blue-600 hover:underline">Dashboard</a></li>
      <li>/</li>
      <li class="text-gray-500">Profile</li>
    </ol>
  </nav>

  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">My Profile</h1>
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
      <i class="bx bx-edit"></i> Edit Profile
    </button>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- Profile Sidebar -->
    <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center">
      <img src="https://via.placeholder.com/120" alt="Profile Picture" class="w-28 h-28 rounded-full mb-4 border">
      <h2 class="text-lg font-semibold text-gray-800">Admin User</h2>
      <p class="text-sm text-gray-500 mb-4">System Administrator</p>
      <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm">
        Change Photo
      </button>
    </div>

    <!-- Profile Information -->
    <div class="md:col-span-2 bg-white p-6 rounded-xl shadow">
      <h2 class="text-lg font-semibold text-gray-700 mb-4">Personal Information</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="text-sm text-gray-600">Full Name</label>
          <input type="text" value="Admin User" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm" readonly>
        </div>
        <div>
          <label class="text-sm text-gray-600">Email</label>
          <input type="email" value="admin@hospital.com" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm" readonly>
        </div>
        <div>
          <label class="text-sm text-gray-600">Phone</label>
          <input type="text" value="+63 912 345 6789" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm" readonly>
        </div>
        <div>
          <label class="text-sm text-gray-600">Role</label>
          <input type="text" value="Administrator" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm" readonly>
        </div>
      </div>
    </div>
  </div>

  <!-- Password Update -->
  <div class="bg-white p-6 rounded-xl shadow mt-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Change Password</h2>
    <form class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <div>
        <label class="text-sm text-gray-600">Current Password</label>
        <input type="password" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
      </div>
      <div>
        <label class="text-sm text-gray-600">New Password</label>
        <input type="password" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
      </div>
      <div>
        <label class="text-sm text-gray-600">Confirm Password</label>
        <input type="password" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
      </div>
      <div class="md:col-span-3 flex justify-end">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
          <i class="bx bx-save"></i> Update Password
        </button>
      </div>
    </form>
  </div>
</div>
';

adminLayout($profileContent);
?>
