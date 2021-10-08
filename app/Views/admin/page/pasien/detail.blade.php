@extends('admin.main-page')
@section('content')
	@php
		$agama = ['Islam', 'Kristen', 'Protestan', 'Hindu', 'Buddha', 'Khonghucu'];
		$pendidikan = ['SD', 'SMP', 'SMA/SMK Sederajat', 'Sarjana', 'Magister', 'Doktor'];
	@endphp
	<a href="{{ base_url }}pasien" class="btn btn-danger">Kembali</a>
	<a href="{{ base_url }}pasien/detail/{{ $data['id'] }}|edit-pasien" class="btn btn-primary"> Ubah Data</a>

	<form action="#" id="form-pasien" class="form-horizontal">
		<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-custom">
                    <li class="active">
                        <a href="#tab-pasien" data-toggle="tab">
                            <strong>Data Pasien</strong>
                        </a>
                    </li>
                    <li>
                        <a href="#tab-suami" data-toggle="tab">
                            <strong>Data Suami</strong>
                        </a>
                    </li>
                    <li>
                        <a href="{{ base_url }}pasien/detail/{{ $data['id'] }}|soap-atenantal">
                            <strong>SOAP Atenantal</strong>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content nopadding noborder">
                    <div id="tab-pasien" class="tab-pane animated fadeInRight fade in active">
                        <div class="form-group">
					        <div class="col-sm-11">
						        <label for="nama" class="control-label">Nama</label>
					            <input readonly type="text" class="form-control" id="pasien-nama" value="{{ $data['nama'] }}" name="pasien[nama]" placeholder="Nama" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="umur" class="control-label">Umur</label>
					            <input readonly type="number" class="form-control" id="pasien-umur" value="{{ $data['umur'] }}" name="pasien[umur]" placeholder="Umur" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="suku" class="control-label">Suku/Kebangsaan</label>
					            <input readonly type="text" class="form-control" id="pasien-suku" value="{{ $data['suku'] }}" name="pasien[suku]" placeholder="Suku" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="agama" class="control-label">Agama</label>
						        <select readonly class="form-control" id="pasien-agama" name="pasien[agama]" required>
						        	<option value="">--Pilih Agama--</option>
						        	@foreach($agama as $ag)
							        	<option value="{{ $ag }}" {{ $data['agama'] == $ag ? 'selected' : '' }}>{{ $ag }}</option>
						        	@endforeach
						        </select>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="pendidikan" class="control-label">Pendidikan</label>
					            <select readonly class="form-control" id="pasien-pendidikan" name="pasien[pendidikan]" required>
						        	<option value="">--Pilih Pendidikan--</option>
						        	@foreach($pendidikan as $pend)
							        	<option value="{{ $pend }}" {{ $data['pendidikan'] == $pend ? 'selected' : '' }}>{{ $pend }}</option>
						        	@endforeach
						        </select>
					        </div>
					    </div>	
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="pekerjaan" class="control-label">Pekerjaan</label>
					            <input readonly type="text" class="form-control" id="pasien-pekerjaan" value="{{ $data['pekerjaan'] }}" name="pasien[pekerjaan]" placeholder="Pekerjaan" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="alamat" class="control-label">Alamat</label>
						        <textarea readonly class="form-control" id="pasien-alamat" name="pasien[alamat]" placeholder="Alamat" required>{{ $data['alamat'] }}</textarea>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="telepon" class="control-label">No telepon</label>
					            <input readonly type="number" class="form-control" id="pasien-telepon" value="{{ $data['telepon'] }}" name="pasien[telepon]" placeholder="No telepon" required>
					        </div>
					    </div>
                    </div>
                    <div id="tab-suami" class="tab-pane animated fadeInRight fade in">
                        <div class="form-group">
					        <div class="col-sm-11">
						        <label for="nama" class="control-label">Nama</label>
					            <input readonly type="text" class="form-control" id="suami-nama" value="{{ $data['suami_nama'] }}" name="suami[nama]" placeholder="Nama" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="umur" class="control-label">Umur</label>
					            <input readonly type="number" class="form-control" id="suami-umur" value="{{ $data['suami_umur'] }}" name="suami[umur]" placeholder="Umur" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="suku" class="control-label">Suku/Kebangsaan</label>
					            <input readonly type="text" class="form-control" id="suami-suku" value="{{ $data['suami_suku'] }}" name="suami[suku]" placeholder="Suku" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="agama" class="control-label">Agama</label>
						        <select readonly class="form-control" id="suami-agama" name="suami[agama]" required>
						        	<option value="">--Pilih Agama--</option>
						        	@foreach($agama as $ag)
							        	<option value="{{ $ag }}" {{ $data['suami_agama'] == $ag ? 'selected' : '' }}>{{ $ag }}</option>
						        	@endforeach
						        </select>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="pendidikan" class="control-label">Pendidikan</label>
					            <select readonly class="form-control" id="suami-pendidikan" name="suami[pendidikan]" required>
						        	<option value="">--Pilih Pendidikan--</option>
						        	@foreach($pendidikan as $pend)
							        	<option value="{{ $pend }}" {{ $data['suami_pendidikan'] == $pend ? 'selected' : '' }}>{{ $pend }}</option>
						        	@endforeach
						        </select>
					        </div>
					    </div>	
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="pekerjaan" class="control-label">Pekerjaan</label>
					            <input readonly type="text" class="form-control" id="suami-pekerjaan" value="{{ $data['suami_pekerjaan'] }}" name="suami[pekerjaan]" placeholder="Pekerjaan" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="alamat" class="control-label">Alamat</label>
						        <textarea readonly class="form-control" id="suami-alamat" name="suami[alamat]" placeholder="Alamat" required>{{ $data['suami_alamat'] }}</textarea>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="telepon" class="control-label">No telepon</label>
					            <input readonly type="number" class="form-control" id="suami-telepon" value="{{ $data['suami_telepon'] }}" name="suami[telepon]" placeholder="No telepon" required>
					        </div>
					    </div>
                    </div>
                </div>	
                <!-- tab-content -->
            </div>
        </div>
	    <br>
	    <br>
	    <br>
	</form>
@endsection