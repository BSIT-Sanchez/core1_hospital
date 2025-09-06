<?php
include '../layout/adminLayout.php';
?>

<?php
$triageContent = '
<div class="p-6 max-w-6xl mx-auto">

  <!-- Breadcrumb -->
  <nav class="mb-6 text-sm text-gray-600" aria-label="breadcrumb">
      <ol class="flex space-x-2">
          <li><a href="dashboard.php" class="text-blue-600 hover:underline">Dashboard</a></li>
          <li>/</li>
          <li><a href="#" class="text-blue-600 hover:underline">Emergency & ER Triage</a></li>
          <li>/</li>
          <li class="text-gray-800">Triage Assessment</li>
      </ol>
  </nav>

  <!-- Header -->
  <div class="bg-red-600 text-white p-4 rounded-lg shadow mb-6">
      <h1 class="text-xl font-bold">Triage Assessment</h1>
      <p class="text-sm">Record patient triage details for emergency prioritization</p>
  </div>

  <!-- Form -->
  <form action="save_triage.php" method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
      
      <!-- Patient Info -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
              <label class="block text-sm font-medium">Patient ID</label>
              <input type="text" name="patient_id" class="mt-1 w-full border rounded p-2" required>
          </div>
          <div>
              <label class="block text-sm font-medium">Full Name</label>
              <input type="text" name="full_name" class="mt-1 w-full border rounded p-2" required>
          </div>
      </div>

      <!-- Symptoms -->
      <div>
          <label class="block text-sm font-medium">Presenting Complaint / Symptoms</label>
          <textarea name="symptoms" rows="3" class="mt-1 w-full border rounded p-2" placeholder="Describe symptoms..." required></textarea>
      </div>

      <!-- Vital Signs -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
              <label class="block text-sm font-medium">Temperature (°C)</label>
              <input type="number" step="0.1" name="temperature" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
              <label class="block text-sm font-medium">Blood Pressure (mmHg)</label>
              <input type="text" name="blood_pressure" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
              <label class="block text-sm font-medium">Heart Rate (bpm)</label>
              <input type="number" name="heart_rate" class="mt-1 w-full border rounded p-2">
          </div>
      </div>

      <!-- Triage Priority -->
      <div>
          <label class="block text-sm font-medium">Triage Category</label>
          <select name="triage_category" class="mt-1 w-full border rounded p-2" required>
              <option value="">-- Select Priority --</option>
              <option value="Immediate (Red)">Immediate (Red) – Life-threatening</option>
              <option value="Urgent (Orange)">Urgent (Orange) – Serious condition</option>
              <option value="Delayed (Yellow)">Delayed (Yellow) – Stable but needs care</option>
              <option value="Minor (Green)">Minor (Green) – Walking wounded</option>
              <option value="Deceased (Black)">Deceased (Black)</option>
          </select>
      </div>

      <!-- Notes -->
      <div>
          <label class="block text-sm font-medium">Additional Notes</label>
          <textarea name="notes" rows="2" class="mt-1 w-full border rounded p-2"></textarea>
      </div>

      <!-- Submit -->
      <div class="flex justify-end">
          <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
              Save Triage Record
          </button>
      </div>
  </form>

  <!-- Recent Triage Records -->
  <div class="mt-10">
      <h2 class="text-lg font-semibold mb-4">Recent Triage Records</h2>
      <div class="overflow-x-auto">
          <table class="min-w-full border rounded-lg">
              <thead class="bg-gray-100">
                  <tr>
                      <th class="px-4 py-2 border">Patient ID</th>
                      <th class="px-4 py-2 border">Name</th>
                      <th class="px-4 py-2 border">Symptoms</th>
                      <th class="px-4 py-2 border">Triage Category</th>
                      <th class="px-4 py-2 border">Date</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td class="px-4 py-2 border">P-1023</td>
                      <td class="px-4 py-2 border">Juan Dela Cruz</td>
                      <td class="px-4 py-2 border">Severe chest pain</td>
                      <td class="px-4 py-2 border text-red-600 font-bold">Immediate (Red)</td>
                      <td class="px-4 py-2 border">2025-09-04</td>
                  </tr>
                  <tr>
                      <td class="px-4 py-2 border">P-1056</td>
                      <td class="px-4 py-2 border">Maria Santos</td>
                      <td class="px-4 py-2 border">Fever, cough</td>
                      <td class="px-4 py-2 border text-yellow-600 font-semibold">Delayed (Yellow)</td>
                      <td class="px-4 py-2 border">2025-09-04</td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>

</div>
';

adminLayout($triageContent);
?>
