<?php
include '../layout/adminLayout.php';

// Sample bed data (replace with DB queries)
$beds = [
  ['id' => 1, 'ward' => 'General Ward', 'bed_no' => 'G-101', 'patient' => 'John Doe', 'status' => 'Occupied'],
  ['id' => 2, 'ward' => 'General Ward', 'bed_no' => 'G-102', 'patient' => '', 'status' => 'Available'],
  ['id' => 3, 'ward' => 'ICU', 'bed_no' => 'ICU-01', 'patient' => 'Jane Smith', 'status' => 'Occupied'],
  ['id' => 4, 'ward' => 'Private Room', 'bed_no' => 'P-201', 'patient' => '', 'status' => 'Available'],
];

// Summary stats
$totalBeds = count($beds);
$occupied = count(array_filter($beds, fn($b) => $b['status'] === 'Occupied'));
$available = $totalBeds - $occupied;

$bedContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Bed Management</span>
  </nav>

  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Bed Management</h1>
    <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
      <i class="bx bx-plus mr-1"></i> Assign Bed
    </button>
  </div>

  <!-- Bed Availability Summary -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white shadow rounded-xl p-6 text-center">
      <h2 class="text-3xl font-bold text-gray-800">'.$totalBeds.'</h2>
      <p class="text-gray-600">Total Beds</p>
    </div>
    <div class="bg-green-100 shadow rounded-xl p-6 text-center">
      <h2 class="text-3xl font-bold text-green-700">'.$available.'</h2>
      <p class="text-gray-600">Available</p>
    </div>
    <div class="bg-red-100 shadow rounded-xl p-6 text-center">
      <h2 class="text-3xl font-bold text-red-700">'.$occupied.'</h2>
      <p class="text-gray-600">Occupied</p>
    </div>
  </div>

  <!-- Beds Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Ward</th>
          <th class="px-6 py-3">Bed Number</th>
          <th class="px-6 py-3">Patient</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($beds as $bed) {
  $statusColor = $bed['status'] === 'Occupied' ? 'text-red-600' : 'text-green-600';

  $bedContent .= '
    <tr class="border-b hover:bg-gray-50">
      <td class="px-6 py-4">'.$bed['ward'].'</td>
      <td class="px-6 py-4 font-medium text-gray-900">'.$bed['bed_no'].'</td>
      <td class="px-6 py-4">'.($bed['patient'] ?: '-').'</td>
      <td class="px-6 py-4 '.$statusColor.' font-semibold">'.$bed['status'].'</td>
      <td class="px-6 py-4 text-center space-x-2">
        <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded"><i class="bx bx-check"></i></button>
        <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-x"></i></button>
      </td>
    </tr>
  ';
}

$bedContent .= '
      </tbody>
    </table>
  </div>
</div>

<!-- Assign Bed Modal -->
<div id="bedModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Assign Bed</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-gray-700">Ward</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>General Ward</option>
          <option>Private Room</option>
          <option>ICU</option>
        </select>
      </div>
      <div>
        <label class="block text-gray-700">Bed Number</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Patient Name</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Status</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>Available</option>
          <option>Occupied</option>
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
    document.getElementById("bedModal").classList.remove("hidden");
  }
  function closeModal() {
    document.getElementById("bedModal").classList.add("hidden");
  }
</script>
';

adminLayout($bedContent);
?>
