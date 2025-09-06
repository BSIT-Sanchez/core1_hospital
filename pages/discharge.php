<?php
include '../layout/adminLayout.php';

// Sample discharge list (replace with DB queries)
$discharges = [
  ['id' => 1, 'patient' => 'Juan Dela Cruz', 'ward' => 'General Ward', 'doctor' => 'Dr. John Doe', 'status' => 'Pending'],
  ['id' => 2, 'patient' => 'Maria Santos', 'ward' => 'ICU', 'doctor' => 'Dr. Alice Brown', 'status' => 'In Progress'],
  ['id' => 3, 'patient' => 'Pedro Ramirez', 'ward' => 'Private Room', 'doctor' => 'Dr. Emily Davis', 'status' => 'Completed'],
];

$dischargeContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Discharge Management</span>
  </nav>

  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Patient Discharge Management</h1>
    <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
      <i class="bx bx-plus mr-1"></i> Process Discharge
    </button>
  </div>

  <!-- Discharge Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Patient</th>
          <th class="px-6 py-3">Ward</th>
          <th class="px-6 py-3">Attending Doctor</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($discharges as $d) {
  $statusColor = $d['status'] === 'Completed' ? 'text-green-600 font-semibold' : 
                 ($d['status'] === 'In Progress' ? 'text-yellow-600 font-semibold' : 'text-gray-600');

  $dischargeContent .= '
    <tr class="border-b hover:bg-gray-50">
      <td class="px-6 py-4 font-medium text-gray-900">'.$d['patient'].'</td>
      <td class="px-6 py-4">'.$d['ward'].'</td>
      <td class="px-6 py-4">'.$d['doctor'].'</td>
      <td class="px-6 py-4 '.$statusColor.'">'.$d['status'].'</td>
      <td class="px-6 py-4 text-center space-x-2">
        <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded"><i class="bx bx-check-circle"></i></button>
        <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"><i class="bx bx-edit"></i></button>
        <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-trash"></i></button>
      </td>
    </tr>
  ';
}

$dischargeContent .= '
      </tbody>
    </table>
  </div>
</div>

<!-- Discharge Modal -->
<div id="dischargeModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Process Patient Discharge</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-gray-700">Patient Name</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter patient name" required>
      </div>
      <div>
        <label class="block text-gray-700">Ward</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>General Ward</option>
          <option>ICU</option>
          <option>Private Room</option>
        </select>
      </div>
      <div>
        <label class="block text-gray-700">Attending Doctor</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" placeholder="Enter doctor name" required>
      </div>
      <div>
        <label class="block text-gray-700">Discharge Notes</label>
        <textarea class="w-full px-3 py-2 border rounded-lg" placeholder="Enter discharge summary" rows="3"></textarea>
      </div>
      <div>
        <label class="block text-gray-700">Status</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>Pending</option>
          <option>In Progress</option>
          <option>Completed</option>
        </select>
      </div>
      <div class="flex justify-end space-x-2 pt-4">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Save</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openModal() {
    document.getElementById("dischargeModal").classList.remove("hidden");
  }
  function closeModal() {
    document.getElementById("dischargeModal").classList.add("hidden");
  }
</script>
';

adminLayout($dischargeContent);
?>
