<?php
include '../layout/adminLayout.php';

// Sample admissions data (replace with DB queries)
$admissions = [
  ['id' => 1, 'patient' => 'John Doe', 'ward' => 'General Ward', 'doctor' => 'Dr. Smith', 'date' => '2025-09-02', 'status' => 'Admitted'],
  ['id' => 2, 'patient' => 'Jane Smith', 'ward' => 'ICU', 'doctor' => 'Dr. Brown', 'date' => '2025-09-03', 'status' => 'Under Observation'],
  ['id' => 3, 'patient' => 'Michael Cruz', 'ward' => 'Private Room', 'doctor' => 'Dr. Johnson', 'date' => '2025-09-04', 'status' => 'Discharged'],
];

$admissionsContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Admissions</span>
  </nav>

  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Patient Admissions</h1>
    <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
      <i class="bx bx-plus mr-1"></i> New Admission
    </button>
  </div>

  <!-- Admissions Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Patient</th>
          <th class="px-6 py-3">Ward</th>
          <th class="px-6 py-3">Doctor</th>
          <th class="px-6 py-3">Admission Date</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($admissions as $adm) {
  $statusColor = match($adm['status']) {
    'Admitted' => 'text-blue-600',
    'Under Observation' => 'text-yellow-600',
    'Discharged' => 'text-green-600',
    default => 'text-gray-600',
  };

  $admissionsContent .= '
    <tr class="border-b hover:bg-gray-50">
      <td class="px-6 py-4 font-medium text-gray-900">'.$adm['patient'].'</td>
      <td class="px-6 py-4">'.$adm['ward'].'</td>
      <td class="px-6 py-4">'.$adm['doctor'].'</td>
      <td class="px-6 py-4">'.$adm['date'].'</td>
      <td class="px-6 py-4 '.$statusColor.' font-semibold">'.$adm['status'].'</td>
      <td class="px-6 py-4 text-center space-x-2">
        <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded"><i class="bx bx-show"></i></button>
        <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"><i class="bx bx-edit"></i></button>
        <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-trash"></i></button>
      </td>
    </tr>
  ';
}

$admissionsContent .= '
      </tbody>
    </table>
  </div>
</div>

<!-- New Admission Modal -->
<div id="admissionModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">New Admission</h2>
    <form class="space-y-4">
      <div>
        <label class="block text-gray-700">Patient Name</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Ward</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>General Ward</option>
          <option>Private Room</option>
          <option>ICU</option>
        </select>
      </div>
      <div>
        <label class="block text-gray-700">Doctor</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Admission Date</label>
        <input type="date" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Status</label>
        <select class="w-full px-3 py-2 border rounded-lg" required>
          <option>Admitted</option>
          <option>Under Observation</option>
          <option>Discharged</option>
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
    document.getElementById("admissionModal").classList.remove("hidden");
  }
  function closeModal() {
    document.getElementById("admissionModal").classList.add("hidden");
  }
</script>
';

adminLayout($admissionsContent);
?>
