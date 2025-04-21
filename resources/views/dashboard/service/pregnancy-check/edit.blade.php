@extends('layouts.dashboard')

@section('title', 'Ubah Pemeriksaan')

@push('styles')
    <link rel="stylesheet" href="{{ asset('modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/summernote/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('title')</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">@yield('title')</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url("/pregnancy-check-data/{$pregnancy->id}") }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row g-4">
                                    <div class="col-12">
                                        <h5 class="card-title">Biodata</h5>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="parent_id">Nama Ibu <span class="text-danger">*</span></label>
                                        <select name="parent_id" id="parent_id"
                                            class="form-control select2 @error('parent_id') is-invalid @enderror">
                                            <option value="" selected disabled>-- Pilih Nama Ibu --
                                            </option>
                                            @foreach ($parents as $parent)
                                                <option value="{{ $parent->id }}" data-gender="{{ $parent->gender }}"
                                                    data-mother_birth_place="{{ $parent->mother_birth_place }}"
                                                    data-mother_date_of_birth="{{ $parent->mother_date_of_birth }}"
                                                    {{ old('parent_id', $pregnancy->parent_id) == $parent->id ? 'selected' : '' }}>
                                                    {{ $parent->mother_fullname . ' - ' . $parent->nik }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="mother_birth_place">Tempat Lahir <span
                                                class="text-danger">*</span></label>
                                        <input id="mother_birth_place" type="text" class="form-control"
                                            name="mother_birth_place" value="" placeholder="Jakarta" disabled>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="mother_date_of_birth">Tanggal Lahir <span
                                                class="text-danger">*</span></label>
                                        <input id="mother_date_of_birth" type="date" class="form-control dob-input"
                                            name="mother_date_of_birth" value="" disabled>
                                    </div>

                                    <div class="col-12">
                                        <hr>
                                        <h5 class="card-title">Pemeriksaan</h5>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="check_date">Tanggal Pemeriksaan <span
                                                class="text-danger">*</span></label>
                                        <input id="check_date" type="date"
                                            class="form-control @error('check_date') is-invalid @enderror today-input"
                                            name="check_date" value="{{ old('check_date', $pregnancy->check_date) }}">
                                        @error('check_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="age_in_checks">Usia Saat Pemeriksaan <span
                                                class="text-danger">*</span></label>
                                        <input id="age_in_checks" type="text"
                                            class="form-control @error('age_in_checks') is-invalid @enderror"
                                            name="age_in_checks"
                                            value="{{ old('age_in_checks', $pregnancy->age_in_checks) }}"
                                            placeholder="0 tahun, 0 bulan, 0 hari" readonly>
                                        @error('age_in_checks')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="gestational_age">Usia Kehamilan (minggu) <span
                                                class="text-danger">*</span></label>
                                        <input id="gestational_age" type="text"
                                            class="form-control @error('gestational_age') is-invalid @enderror"
                                            name="gestational_age"
                                            value="{{ old('gestational_age', $pregnancy->gestational_age) }}"
                                            placeholder="Contoh: 24">
                                        @error('gestational_age')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="mother_weight">Berat Badan Ibu (kg) <span
                                                class="text-danger">*</span></label>
                                        <input id="mother_weight" type="text"
                                            class="form-control @error('mother_weight') is-invalid @enderror"
                                            name="mother_weight"
                                            value="{{ old('mother_weight', $pregnancy->mother_weight) }}"
                                            placeholder="Contoh: 55.5">
                                        @error('mother_weight')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="blood_pressure">Tekanan Darah <span class="text-danger">*</span></label>
                                        <input id="blood_pressure" type="text"
                                            class="form-control @error('blood_pressure') is-invalid @enderror"
                                            name="blood_pressure"
                                            value="{{ old('blood_pressure', $pregnancy->blood_pressure) }}"
                                            placeholder="Contoh: 120/80">
                                        @error('blood_pressure')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="pulse_rate">Denyut Nadi (bpm) <span
                                                class="text-danger">*</span></label>
                                        <input id="pulse_rate" type="text"
                                            class="form-control @error('pulse_rate') is-invalid @enderror"
                                            name="pulse_rate" value="{{ old('pulse_rate', $pregnancy->pulse_rate) }}"
                                            placeholder="Contoh: 80">
                                        @error('pulse_rate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="blood_sugar">Gula Darah (mg/dL)</label>
                                        <input id="blood_sugar" type="text"
                                            class="form-control @error('blood_sugar') is-invalid @enderror"
                                            name="blood_sugar" value="{{ old('blood_sugar', $pregnancy->blood_sugar) }}"
                                            placeholder="Contoh: 90.5">
                                        @error('blood_sugar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="cholesterol">Kolesterol (mg/dL)</label>
                                        <input id="cholesterol" type="text"
                                            class="form-control @error('cholesterol') is-invalid @enderror"
                                            name="cholesterol" value="{{ old('cholesterol', $pregnancy->cholesterol) }}"
                                            placeholder="Contoh: 200.0">
                                        @error('cholesterol')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="fundus_height">Tinggi Fundus (cm)</label>
                                        <input id="fundus_height" type="text"
                                            class="form-control @error('fundus_height') is-invalid @enderror"
                                            name="fundus_height"
                                            value="{{ old('fundus_height', $pregnancy->fundus_height) }}"
                                            placeholder="Contoh: 30">
                                        @error('fundus_height')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="fetal_heart_rate">Detak Jantung Janin (bpm)</label>
                                        <input id="fetal_heart_rate" type="text"
                                            class="form-control @error('fetal_heart_rate') is-invalid @enderror"
                                            name="fetal_heart_rate"
                                            value="{{ old('fetal_heart_rate', $pregnancy->fetal_heart_rate) }}"
                                            placeholder="Contoh: 140">
                                        @error('fetal_heart_rate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="fetal_presentation">Presentasi Janin <span
                                                class="text-danger">*</span></label>
                                        <select name="fetal_presentation" id="fetal_presentation"
                                            class="form-control @error('fetal_presentation') is-invalid @enderror">
                                            <option value="" selected disabled>-- Pilih Presentasi Janin --</option>
                                            <option value="Kepala"
                                                {{ old('fetal_presentation', $pregnancy->fetal_presentation) == 'Kepala' ? 'selected' : '' }}>
                                                Kepala
                                            </option>
                                            <option value="Bokong"
                                                {{ old('fetal_presentation', $pregnancy->fetal_presentation) == 'Bokong' ? 'selected' : '' }}>
                                                Bokong
                                            </option>
                                            <option value="Lainnya"
                                                {{ old('fetal_presentation', $pregnancy->fetal_presentation) == 'Lainnya' ? 'selected' : '' }}>
                                                Lainnya
                                            </option>
                                        </select>
                                        @error('fetal_presentation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="edema">Edema <span class="text-danger">*</span></label>
                                        <select name="edema" id="edema"
                                            class="form-control @error('edema') is-invalid @enderror">
                                            <option value="" selected disabled>-- Pilih Tingkat Edema --</option>
                                            <option value="Tidak"
                                                {{ old('edema', $pregnancy->edema) == 'Tidak' ? 'selected' : '' }}>Tidak
                                            </option>
                                            <option value="Ringan"
                                                {{ old('edema', $pregnancy->edema) == 'Ringan' ? 'selected' : '' }}>Ringan
                                            </option>
                                            <option value="Sedang"
                                                {{ old('edema', $pregnancy->edema) == 'Sedang' ? 'selected' : '' }}>Sedang
                                            </option>
                                            <option value="Berat"
                                                {{ old('edema', $pregnancy->edema) == 'Berat' ? 'selected' : '' }}>Berat
                                            </option>
                                        </select>
                                        @error('edema')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="notes">Keterangan</label>
                                        <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror summernote-simple"
                                            rows="5" data-placeholder="Jika ada keterangan atau catatan silakan isi">{{ old('notes', $pregnancy->notes) }}</textarea>
                                        @error('notes')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <input type="hidden" name="officer_id" id="officer_id"
                                        value="{{ $pregnancy->officer_id }}">

                                    <div class="col-12">
                                        <div class="d-flex justify-content-center justify-content-md-end align-items-center"
                                            style="gap: .5rem">
                                            <a href="{{ url('/pregnancy-check-data') }}"
                                                class="btn btn-secondary">Kembali</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('modules/summernote/summernote-bs4.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Fungsi untuk mengisi data dan menghitung usia
            function fillChildData() {
                const selected = $('#parent_id option:selected');

                if (selected.length === 0) return;

                $('#mother_birth_place').val(selected.data('mother_birth_place'));
                $('#mother_date_of_birth').val(selected.data('mother_date_of_birth'));

                calculateAndFillAge();
            }

            // Fungsi untuk menghitung dan mengisi usia
            function calculateAndFillAge() {
                const dobInput = document.querySelector('.dob-input')?.value;
                const todayInput = document.querySelector('.today-input')?.value;

                if (!dobInput || !todayInput) return;

                const dob = new Date(dobInput);
                const today = new Date(todayInput);

                const age = calculateAge(dob, today);
                $('#age_in_checks').val(age);
            }

            // Fungsi hitung usia dari dua tanggal
            function calculateAge(dob, today) {
                let years = today.getFullYear() - dob.getFullYear();
                let months = today.getMonth() - dob.getMonth();
                let days = today.getDate() - dob.getDate();

                if (days < 0) {
                    months--;
                    days += new Date(today.getFullYear(), today.getMonth(), 0).getDate();
                }

                if (months < 0) {
                    years--;
                    months += 12;
                }

                return `${years} tahun, ${months} bulan, ${days} hari`;
            }

            // ========== TRIGGERS ==========

            // Saat halaman dimuat (edit mode), isi otomatis jika sudah ada terpilih
            if ($('#parent_id').val()) {
                fillChildData();
            }

            // Saat user memilih (create mode atau edit mode)
            $('#parent_id').change(function() {
                fillChildData();
            });

            // Saat tanggal lahir diubah (input manual atau ganti)
            $('.dob-input').on('change', function() {
                calculateAndFillAge();
            });

            // Saat tanggal Pemeriksaan diubah (opsional, jika field bisa diedit)
            $('.today-input').on('change', function() {
                calculateAndFillAge();
            });
        });
    </script>
@endpush
