<?php
include '../layout/adminLayout.php';

// Sample patient list (replace with DB query)
$patients = [
  ['id' => 1, 'name' => 'John Doe', 'age' => 32, 'gender' => 'Male', 'contact' => '09171234567'],
  ['id' => 2, 'name' => 'Jane Smith', 'age' => 28, 'gender' => 'Female', 'contact' => '09179876543'],
  ['id' => 3, 'name' => 'Michael Cruz', 'age' => 45, 'gender' => 'Male', 'contact' => '09221234567'],
];

$content = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Smart Patient Registration</span>
  </nav>

  <!-- Page Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Patient Registration</h1>
    <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
      <i class="bx bx-user-plus text-xl"></i> Register Patient
    </button>
  </div>

  <!-- Patient List -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Patient Name</th>
          <th class="px-6 py-3">Age</th>
          <th class="px-6 py-3">Gender</th>
          <th class="px-6 py-3">Contact</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($patients as $p) {
  $content .= '
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-medium text-gray-900">'.$p['name'].'</td>
          <td class="px-6 py-4">'.$p['age'].'</td>
          <td class="px-6 py-4">'.$p['gender'].'</td>
          <td class="px-6 py-4">'.$p['contact'].'</td>
          <td class="px-6 py-4 text-center space-x-2">
            <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded"><i class="bx bx-show"></i></button>
            <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"><i class="bx bx-edit"></i></button>
            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-trash"></i></button>
          </td>
        </tr>
  ';
}

$content .= '
      </tbody>
    </table>
  </div>
</div>

<!-- Patient Registration Modal -->
<div id="patientModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold mb-4 text-gray-800">Register New Patient</h2>
    <form action="#" method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" name="name" class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-blue-500 focus:border-blue-500" required>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Age</label>
          <input type="number" name="age" class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Gender</label>
          <select name="gender" class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-blue-500 focus:border-blue-500" required>
            <option value="">Select</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Contact Number</label>
        <input type="text" name="contact" class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-blue-500 focus:border-blue-500" required>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Address</label>
        <textarea name="address" rows="3" class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-blue-500 focus:border-blue-500"></textarea>
      </div>
      <div class="flex justify-end gap-2 mt-4">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Register</button>
      </div>
    </form>
  </div>
</div>

<script>
function openModal() {
  document.getElementById("patientModal").classList.remove("hidden");
}
function closeModal() {
  document.getElementById("patientModal").classList.add("hidden");
}
</script>
';

adminLayout($content);
?>
