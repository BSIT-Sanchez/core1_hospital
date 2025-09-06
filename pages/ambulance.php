<?php
include '../layout/adminLayout.php';

// Sample ambulance dispatch data (replace with DB queries)
$ambulances = [
  ['id' => 1, 'plate' => 'ABC-123', 'driver' => 'Mark Reyes', 'status' => 'Available', 'location' => 'Hospital A', 'last_used' => '2025-09-02'],
  ['id' => 2, 'plate' => 'XYZ-456', 'driver' => 'Anna Santos', 'status' => 'On Dispatch', 'location' => 'Accident Site', 'last_used' => '2025-09-04'],
  ['id' => 3, 'plate' => 'LMN-789', 'driver' => 'Juan Dela Cruz', 'status' => 'Under Maintenance', 'location' => 'Garage', 'last_used' => '2025-08-30'],
];

$ambulanceContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Ambulance Management</span>
  </nav>

  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Ambulance Dispatch</h1>
    <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
      <i class="bx bx-plus mr-1"></i> New Dispatch
    </button>
  </div>

  <!-- Ambulance Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Plate Number</th>
          <th class="px-6 py-3">Driver</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3">Location</th>
          <th class="px-6 py-3">Last Used</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($ambulances as $amb) {
  $statusColor = match($amb['status']) {
    'Available' => 'text-green-600',
    'On Dispatch' => 'text-blue-600',
    'Under Maintenance' => 'text-yellow-600',
    default => 'text-gray-600',
  };

  $ambulanceContent .= '
    <tr class="border-b hover:bg-gray-50">
      <td class="px-6 py-4 font-medium text-gray-900">'.$amb['plate'].'</td>
      <td class="px-6 py-4">'.$amb['driver'].'</td>
      <td class="px-6 py-4 '.$statusColor.' font-semibold">'.$amb['status'].'</td>
      <td class="px-6 py-4">'.$amb['location'].'</td>
      <td class="px-6 py-4">'.$amb['last_used'].'</td>
      <td class="px-6 py-4 text-center space-x-2">
        <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded"><i class="bx bx-show"></i></button>
        <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"><i class="bx bx-edit"></i></button>
        <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-trash"></i></button>
      </td>
    </tr>
  ';
}

$ambulanceContent .= '
      </tbody>
    </table>
  </div>
</div>

<!-- New Dispatch Modal -->
<div id="ambulanceModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">New Ambulance Dispatch</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-gray-700">Plate Number</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Driver Name</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Status</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>Available</option>
          <option>On Dispatch</option>
          <option>Under Maintenance</option>
        </select>
      </div>
      <div>
        <label class="block text-gray-700">Location</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Last Used</label>
        <input type="date" class="w-full px-3 py-2 border rounded-lg" required>
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
    document.getElementById("ambulanceModal").classList.remove("hidden");
  }
  function closeModal() {
    document.getElementById("ambulanceModal").classList.add("hidden");
  }
</script>
';

adminLayout($ambulanceContent);
?>
