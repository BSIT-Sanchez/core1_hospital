<?php
include '../layout/adminLayout.php';

// Sample emergency queue data (replace with DB queries)
$queue = [
  ['id' => 1, 'patient' => 'Juan Dela Cruz', 'priority' => 'Critical', 'symptoms' => 'Severe chest pain', 'time' => '2025-09-04 10:15 AM', 'status' => 'Waiting'],
  ['id' => 2, 'patient' => 'Maria Santos', 'priority' => 'High', 'symptoms' => 'Head trauma, unconscious', 'time' => '2025-09-04 10:05 AM', 'status' => 'In Treatment'],
  ['id' => 3, 'patient' => 'Pedro Ramirez', 'priority' => 'Moderate', 'symptoms' => 'Fractured arm', 'time' => '2025-09-04 09:50 AM', 'status' => 'Waiting'],
];

$queueContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Emergency Queue</span>
  </nav>

  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Emergency Queue</h1>
    <button onclick="openModal()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
      <i class="bx bx-plus mr-1"></i> Add Patient
    </button>
  </div>

  <!-- Emergency Queue Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Patient</th>
          <th class="px-6 py-3">Priority</th>
          <th class="px-6 py-3">Symptoms</th>
          <th class="px-6 py-3">Arrival Time</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($queue as $q) {
  $priorityColor = match($q['priority']) {
    'Critical' => 'text-red-600 font-bold',
    'High' => 'text-yellow-600 font-semibold',
    'Moderate' => 'text-blue-600 font-semibold',
    default => 'text-gray-600',
  };

  $statusColor = match($q['status']) {
    'Waiting' => 'text-orange-600',
    'In Treatment' => 'text-green-600',
    default => 'text-gray-600',
  };

  $queueContent .= '
    <tr class="border-b hover:bg-gray-50">
      <td class="px-6 py-4 font-medium text-gray-900">'.$q['patient'].'</td>
      <td class="px-6 py-4 '.$priorityColor.'">'.$q['priority'].'</td>
      <td class="px-6 py-4">'.$q['symptoms'].'</td>
      <td class="px-6 py-4">'.$q['time'].'</td>
      <td class="px-6 py-4 '.$statusColor.'">'.$q['status'].'</td>
      <td class="px-6 py-4 text-center space-x-2">
        <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded"><i class="bx bx-show"></i></button>
        <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"><i class="bx bx-edit"></i></button>
        <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-trash"></i></button>
      </td>
    </tr>
  ';
}

$queueContent .= '
      </tbody>
    </table>
  </div>
</div>

<!-- New Patient Modal -->
<div id="queueModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Add Patient to Queue</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-gray-700">Patient Name</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Priority</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>Critical</option>
          <option>High</option>
          <option>Moderate</option>
          <option>Low</option>
        </select>
      </div>
      <div>
        <label class="block text-gray-700">Symptoms</label>
        <textarea class="w-full px-3 py-2 border rounded-lg" rows="2" required></textarea>
      </div>
      <div>
        <label class="block text-gray-700">Arrival Time</label>
        <input type="datetime-local" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Status</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>Waiting</option>
          <option>In Treatment</option>
        </select>
      </div>
      <div class="flex justify-end space-x-2 pt-4">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">Add</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openModal() {
    document.getElementById("queueModal").classList.remove("hidden");
  }
  function closeModal() {
    document.getElementById("queueModal").classList.add("hidden");
  }
</script>
';

adminLayout($queueContent);
?>
