<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $mahasiswa->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>NIM</label>
    <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Program Studi</label>
    <input type="text" name="program_studi" class="form-control" value="{{ old('program_studi', $mahasiswa->program_studi ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Fakultas</label>
    <input type="text" name="fakultas" class="form-control" value="{{ old('fakultas', $mahasiswa->fakultas ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Tahun Masuk</label>
    <input type="number" name="tahun_masuk" class="form-control" value="{{ old('tahun_masuk', $mahasiswa->tahun_masuk ?? '') }}" required>
</div>
