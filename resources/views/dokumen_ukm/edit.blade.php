@extends('layout.layout')
@section('page-title', 'Perbarui Dokumen UKM')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Perbarui Surat Keluar</h6>
                </div>
                <div class="card-body p-3">
                    <form action="{{ route('dokumen_ukm.update',$dokumen_ukm->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Token CSRF untuk keamanan Laravel -->
                        @method("PUT")
                        <div class="row">
                            <div class="form-group col-lg-6 mb-0">
                                <div class="form-group">
                                    <label for="nama_ketua">Nama Ketua UKM</label>
                                    <input type="text" name="nama_ketua" class="form-control"
                                        placeholder="masukkan nama ketua" value="{{ old('nama_ketua', $dokumen_ukm->nama_ketua)  }}">
                                    @error('nama_ketua')
                                        <div class="text-danger font-weight-bold text-xs mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="status">Periode</label>
                                <select name="periode" class="form-control " required>
                                    <option value="{{ $dokumen_ukm->id_periode }}" selected>
                                        {{ $dokumen_ukm->periode->tahun }}</option>
                                    @foreach ($periode as $p)
                                        <option value="{{ $p->id }}">{{ $p->tahun }}</option>
                                    @endforeach
                                </select>
                                @error('periode')
                                    <div class="text-danger font-weight-bold text-xs mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="rka">File RKA</label>
                                <input type="file" class="form-control" name="rka">
                                <p class="text-secondary font-weight-bold text-xs mt-2">Dokumen saat Ini : <a href="{{ asset("dokumen/ukm/rka/". $dokumen_ukm->rka) }}" target="_blank">Klik Disini</a></p>

                                <p class="text-secondary font-weight-bold text-xs mt-2"> Note : Maksimal ukuran file 2MB
                                </p>

                                @error('rka')
                                    <div class="text-danger font-weight-bold text-xs mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="adart">File AD/ART</label>
                                <input type="file" class="form-control" name="adart">
                                <p class="text-secondary font-weight-bold text-xs mt-2">Dokumen saat Ini : <a href="{{ asset('dokumen/ukm/adart/'. $dokumen_ukm->adart) }}" target="_blank">Klik Disini</a></p>
                                <p class="text-secondary font-weight-bold text-xs mt-2"> Note : Maksimal ukuran file 2MB
                                </p>
                                @error('adart')
                                    <div class="text-danger font-weight-bold text-xs mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            class="btn bg-gradient-success mb-0 font-weight-bold text-xs text-white">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection