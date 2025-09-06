<?php
include '../layout/adminLayout.php';

// Sample queue data (replace with DB queries)
$queue = [
  ['id' => 1, 'patient' => 'Juan Dela Cruz', 'department' => 'Cardiology', 'doctor' => 'Dr. Maria Santos', 'status' => 'Waiting'],
  ['id' => 2, 'patient' => 'Ana Reyes', 'department' => 'Pediatrics', 'doctor' => 'Dr. Carlos Reyes', 'status' => 'In Progress'],
  ['id' => 3, 'patient' => 'Mark Lopez', 'department' => 'Dermatology', 'doctor' => 'Dr. Ana Lopez', 'status' => 'Completed'],
  ['id' => 4, 'patient' => 'Sophia Fernandez', 'department' => 'Orthopedics', 'doctor' => 'Dr. Luis Fernandez', 'status' => 'Waiting'],
];

$content = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Queue Management</span>
  </nav>

  <!-- Page Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Queue Management</h1>
    <button onclick="openAddModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
      <i class="bx bx-plus text-xl"></i> Add to Queue
    </button>
  </div>

  <!-- Queue Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Queue #</th>
          <th class="px-6 py-3">Patient</th>
          <th class="px-6 py-3">Department</th>
          <th class="px-6 py-3">Doctor</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($queue as $q) {
  $statusColor = match($q['status']) {
    'Waiting' => 'bg-yellow-100 text-yellow-700',
    'In Progress' => 'bg-blue-100 text-blue-700',
    'Completed' => 'bg-green-100 text-green-700',
    default => 'bg-gray-100 text-gray-700',
  };

  $content .= '
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-semibold text-gray-900">#'.$q['id'].'</td>
          <td class="px-6 py-4">'.$q['patient'].'</td>
          <td class="px-6 py-4">'.$q['department'].'</td>
          <td class="px-6 py-4">'.$q['doctor'].'</td>
          <td class="px-6 py-4"><span class="px-3 py-1 rounded-full text-xs font-semibold '.$statusColor.'">'.$q['status'].'</span></td>
          <td class="px-6 py-4 text-center space-x-2">
            <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded" title="Mark In Progress"><i class="bx bx-play"></i></button>
            <button class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded" title="Complete"><i class="bx bx-check"></i></button>
            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded" title="Remove"><i class="bx bx-x"></i></button>
          </td>
        </tr>
  ';
}

$content .= '
      </tbody>
    </table>
  </div>
</div>

<!-- Add to Queue Modal -->
<div id="addModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold mb-4">Add to Queue</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Patient Name</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter patient name">
      </div>
      <div>
        <label class="block text-sm font-medium">Department</label>
        <select class="w-full border rounded-lg px-3 py-2">
          <option>Cardiology</option>
          <option>Pediatrics</option>
          <option>Dermatology</option>
          <option>Orthopedics</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium">Doctor</label>
        <select class="w-full border rounded-lg px-3 py-2">
          <option>Dr. Maria Santos</option>
          <option>Dr. Carlos Reyes</option>
          <option>Dr. Ana Lopez</option>
          <option>Dr. Luis Fernandez</option>
        </select>
      </div>
      <div class="flex justify-end gap-2 mt-4">
        <button type="button" onclick="closeAddModal()" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add</button>
      </div>
    </form>
  </div>
</div>

<script>
function openAddModal() {
  document.getElementById("addModal").classList.remove("hidden");
}
function closeAddModal() {
  document.getElementById("addModal").classList.add("hidden");
}
</script>
';

adminLayout($content);
?>
