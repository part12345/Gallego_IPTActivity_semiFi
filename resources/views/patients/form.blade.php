<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Student ID</label>
        <input type="text" name="student_id" class="form-control"
               value="{{ old('student_id', $patient->student_id ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Patient Name</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $patient->name ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Course</label>
        <input type="text" name="course" class="form-control"
               value="{{ old('course', $patient->course ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Year Level</label>
        <input type="number" name="year_level" class="form-control"
               value="{{ old('year_level', $patient->year_level ?? '') }}" min="1" max="10" required>
    </div>
</div>
