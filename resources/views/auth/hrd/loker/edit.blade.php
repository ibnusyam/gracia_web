<div class="row" style="margin-top: 15px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="color: #475569; font-weight: 600;">Golongan Obat <small class="text-danger">*</small></label>
                            <select name="golongan_gabungan" class="form-control" required>
                                <option value="">-- Pilih Golongan --</option>
                                @foreach($kategori_product as $kategori)
                                    <option value="{{ $kategori->kode_golongan }}|{{ $kategori->golongan }}" 
                                        {{ ($obat->kode_golongan == $kategori->kode_golongan && $obat->golongan == $kategori->golongan) ? 'selected' : '' }}>
                                        {{ $kategori->golongan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="color: #475569; font-weight: 600;">Still Produced (Status) <small class="text-danger">*</small></label>
                            <select name="status_obat" class="form-control" required>
                                <option value="0" {{ $obat->status_obat == 0 ? 'selected' : '' }}>0 - Yes (Still Produced)</option>
                                <option value="1" {{ $obat->status_obat == 1 ? 'selected' : '' }}>1 - No (Discontinued)</option>
                            </select>
                        </div>
                    </div>
                </div>