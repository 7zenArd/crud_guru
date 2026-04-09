<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Manajemen Data Guru</h2>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Form Input --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">{{ $edit ? 'Edit Data Guru' : 'Tambah Data Guru' }}</h5>
            </div>
            <div class="card-body">
                @if($edit)
                    <form action="{{ route('guru.update', $edit->nip) }}" method="POST">
                        @csrf
                        @method('PUT')
                @else
                    <form action="{{ route('guru.store') }}" method="POST">
                        @csrf
                @endif

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                   id="nip" name="nip"
                                   value="{{ $edit ? $edit->nip : old('nip') }}"
                                   maxlength="20"
                                   {{ $edit ? 'readonly' : '' }}>
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="nama_guru" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control @error('nama_guru') is-invalid @enderror"
                                   id="nama_guru" name="nama_guru"
                                   value="{{ $edit ? $edit->nama_guru : old('nama_guru') }}"
                                   maxlength="50">
                            @error('nama_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                   id="tgl_lahir" name="tgl_lahir"
                                   value="{{ $edit ? $edit->tgl_lahir->format('Y-m-d') : old('tgl_lahir') }}">
                            @error('tgl_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                   id="jabatan" name="jabatan"
                                   value="{{ $edit ? $edit->jabatan : old('jabatan') }}"
                                   maxlength="50">
                            @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control @error('mata_pelajaran') is-invalid @enderror"
                                   id="mata_pelajaran" name="mata_pelajaran"
                                   value="{{ $edit ? $edit->mata_pelajaran : old('mata_pelajaran') }}"
                                   maxlength="50">
                            @error('mata_pelajaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="sosmed" class="form-label">Sosial Media</label>
                            <input type="text" class="form-control @error('sosmed') is-invalid @enderror"
                                   id="sosmed" name="sosmed"
                                   value="{{ $edit ? $edit->sosmed : old('sosmed') }}"
                                   maxlength="50">
                            @error('sosmed')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            {{ $edit ? 'Update' : 'Simpan' }}
                        </button>
                        @if($edit)
                            <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- Tabel Data --}}
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Data Guru</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Tanggal Lahir</th>
                            <th>Jabatan</th>
                            <th>Mata Pelajaran</th>
                            <th>Sosial Media</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($gurus as $index => $guru)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $guru->nip }}</td>
                                <td>{{ $guru->nama_guru }}</td>
                                <td>{{ $guru->tgl_lahir->format('d-m-Y') }}</td>
                                <td>{{ $guru->jabatan }}</td>
                                <td>{{ $guru->mata_pelajaran }}</td>
                                <td>{{ $guru->sosmed }}</td>
                                <td>
                                    <a href="{{ route('guru.index', ['edit' => $guru->nip]) }}"
                                       class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('guru.destroy', $guru->nip) }}" method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data guru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
