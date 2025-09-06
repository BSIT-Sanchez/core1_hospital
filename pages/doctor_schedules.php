<?php
include '../layout/adminLayout.php';

// Sample doctor schedules (replace with DB queries later)
$doctorSchedules = [
  ['id' => 1, 'name' => 'Dr. Maria Santos', 'specialty' => 'Cardiology', 'days' => 'Mon, Wed, Fri', 'time' => '09:00 AM - 12:00 PM'],
  ['id' => 2, 'name' => 'Dr. Carlos Reyes', 'specialty' => 'Pediatrics', 'days' => 'Tue, Thu', 'time' => '10:00 AM - 01:00 PM'],
  ['id' => 3, 'name' => 'Dr. Ana Lopez', 'specialty' => 'Dermatology', 'days' => 'Mon - Fri', 'time' => '01:00 PM - 04:00 PM'],
  ['id' => 4, 'name' => 'Dr. Luis Fernandez', 'specialty' => 'Orthopedics', 'days' => 'Sat, Sun', 'time' => '08:00 AM - 12:00 PM'],
];

$content = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Doctor Schedules</span>
  </nav>

  <!-- Page Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Doctor Schedules</h1>
    <button onclick="openAddModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
      <i class="bx bx-user-plus text-xl"></i> Add Schedule
    </button>
  </div>

  <!-- Schedules Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Doctor</th>
          <th class="px-6 py-3">Specialty</th>
          <th class="px-6 py-3">Available Days</th>
          <th class="px-6 py-3">Available Time</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($doctorSchedules as $doc) {
  $content .= '
        <tr class="border-b hover:bg-gray-50">
          <td class="px-6 py-4 font-medium text-gray-900">'.$doc['name'].'</td>
          <td class="px-6 py-4">'.$doc['specialty'].'</td>
          <td class="px-6 py-4">'.$doc['days'].'</td>
          <td class="px-6 py-4">'.$doc['time'].'</td>
          <td class="px-6 py-4 text-center space-x-2">
            <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded"><i class="bx bx-show"></i></button>
            <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"><i class="bx bx-edit"></i></button>
            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-x"></i></button>
          </td>
        </tr>
  ';
}

$content .= '
      </tbody>
    </table>
  </div>
</div>

<!-- Add Doctor Schedule Modal -->
<div id="addModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold mb-4">Add Doctor Schedule</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Doctor Name</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter doctor name">
      </div>
      <div>
        <label class="block text-sm font-medium">Specialty</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="Enter specialty">
      </div>
      <div>
        <label class="block text-sm font-medium">Available Days</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="e.g. Mon, Wed, Fri">
      </div>
      <div>
        <label class="block text-sm font-medium">Available Time</label>
        <input type="text" class="w-full border rounded-lg px-3 py-2" placeholder="e.g. 09:00 AM - 12:00 PM">
      </div>
      <div class="flex justify-end gap-2 mt-4">
        <button type="button" onclick="closeAddModal()" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
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
