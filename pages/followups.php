<?php
include '../layout/adminLayout.php';

// Sample data (replace with DB queries)
$followups = [
  ['id' => 1, 'patient' => 'John Doe', 'doctor' => 'Dr. Smith', 'reason' => 'Post-surgery checkup', 'date' => '2025-09-05', 'status' => 'Pending'],
  ['id' => 2, 'patient' => 'Jane Smith', 'doctor' => 'Dr. Brown', 'reason' => 'Medication review', 'date' => '2025-09-07', 'status' => 'Completed'],
  ['id' => 3, 'patient' => 'Michael Cruz', 'doctor' => 'Dr. Johnson', 'reason' => 'Lab result discussion', 'date' => '2025-09-09', 'status' => 'Pending'],
];

$followupContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Follow-ups</span>
  </nav>

  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Follow-up Appointments</h1>
    <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
      <i class="bx bx-plus mr-1"></i> Add Follow-up
    </button>
  </div>

  <!-- Follow-ups Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Patient</th>
          <th class="px-6 py-3">Doctor</th>
          <th class="px-6 py-3">Reason</th>
          <th class="px-6 py-3">Date</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($followups as $fup) {
  $statusColor = $fup['status'] === 'Completed' ? 'text-green-600' : 'text-yellow-600';
  $followupContent .= '
    <tr class="border-b hover:bg-gray-50">
      <td class="px-6 py-4 font-medium text-gray-900">'.$fup['patient'].'</td>
      <td class="px-6 py-4">'.$fup['doctor'].'</td>
      <td class="px-6 py-4">'.$fup['reason'].'</td>
      <td class="px-6 py-4">'.$fup['date'].'</td>
      <td class="px-6 py-4 '.$statusColor.' font-semibold">'.$fup['status'].'</td>
      <td class="px-6 py-4 text-center space-x-2">
        <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded"><i class="bx bx-show"></i></button>
        <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"><i class="bx bx-edit"></i></button>
        <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-trash"></i></button>
      </td>
    </tr>
  ';
}

$followupContent .= '
      </tbody>
    </table>
  </div>
</div>

<!-- Add Follow-up Modal -->
<div id="followupModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Add Follow-up</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-gray-700">Patient Name</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Doctor</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Reason</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Date</label>
        <input type="date" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Status</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>Pending</option>
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
    document.getElementById("followupModal").classList.remove("hidden");
  }
  function closeModal() {
    document.getElementById("followupModal").classList.add("hidden");
  }
</script>
';

adminLayout($followupContent);
?>
