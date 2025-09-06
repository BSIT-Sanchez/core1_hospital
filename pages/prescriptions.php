<?php
include '../layout/adminLayout.php';

// Sample data (replace with DB queries)
$prescriptions = [
  ['id' => 1, 'patient' => 'John Doe', 'doctor' => 'Dr. Smith', 'medicine' => 'Amoxicillin 500mg', 'dosage' => '3x a day', 'date' => '2025-09-01'],
  ['id' => 2, 'patient' => 'Jane Smith', 'doctor' => 'Dr. Brown', 'medicine' => 'Paracetamol 500mg', 'dosage' => '2x a day', 'date' => '2025-09-02'],
  ['id' => 3, 'patient' => 'Michael Cruz', 'doctor' => 'Dr. Johnson', 'medicine' => 'Lisinopril 10mg', 'dosage' => '1x a day', 'date' => '2025-09-03'],
];

$prescriptionContent = '
<div class="p-6 max-w-7xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="flex items-center text-gray-500 text-sm mb-6">
    <i class="bx bx-home text-gray-400 mr-1"></i>
    <a href="dashboard.php" class="hover:text-gray-600">Dashboard</a>
    <span class="mx-2">/</span>
    <span class="text-gray-500">Prescriptions</span>
  </nav>

  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Prescriptions</h1>
    <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
      <i class="bx bx-plus mr-1"></i> Add Prescription
    </button>
  </div>

  <!-- Prescriptions Table -->
  <div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
        <tr>
          <th class="px-6 py-3">Patient</th>
          <th class="px-6 py-3">Doctor</th>
          <th class="px-6 py-3">Medicine</th>
          <th class="px-6 py-3">Dosage</th>
          <th class="px-6 py-3">Date</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
';

foreach ($prescriptions as $presc) {
  $prescriptionContent .= '
    <tr class="border-b hover:bg-gray-50">
      <td class="px-6 py-4 font-medium text-gray-900">'.$presc['patient'].'</td>
      <td class="px-6 py-4">'.$presc['doctor'].'</td>
      <td class="px-6 py-4">'.$presc['medicine'].'</td>
      <td class="px-6 py-4">'.$presc['dosage'].'</td>
      <td class="px-6 py-4">'.$presc['date'].'</td>
      <td class="px-6 py-4 text-center space-x-2">
        <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded"><i class="bx bx-show"></i></button>
        <button class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"><i class="bx bx-edit"></i></button>
        <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded"><i class="bx bx-trash"></i></button>
      </td>
    </tr>
  ';
}

$prescriptionContent .= '
      </tbody>
    </table>
  </div>
</div>

<!-- Add Prescription Modal -->
<div id="prescriptionModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Add Prescription</h2>
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
        <label class="block text-gray-700">Medicine</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
      </div>
      <div>
        <label class="block text-gray-700">Dosage</label>
        <input type="text" class="w-full px-3 py-2 border rounded-lg" required>
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
    document.getElementById("prescriptionModal").classList.remove("hidden");
  }
  function closeModal() {
    document.getElementById("prescriptionModal").classList.add("hidden");
  }
</script>
';

adminLayout($prescriptionContent);
?>
