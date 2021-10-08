@extends('admin.main-page')
@section('content')
	@php
		$agama = ['Islam', 'Kristen', 'Protestan', 'Hindu', 'Buddha', 'Khonghucu'];
		$pendidikan = ['SD', 'SMP', 'SMA/SMK Sederajat', 'Sarjana', 'Magister', 'Doktor'];
	@endphp
	<a href="{{ base_url }}pasien" class="btn btn-danger">Kembali</a>

	<form action="#" id="form-pasien" class="form-horizontal">
	    <div class="row">
	        <div class="col-lg-6">
	            <div class="panel filterable" style="overflow:auto;">
	                <div class="panel-heading">
	                    <h3 class="panel-title">
	                        <i class="ti-server"></i> Data {{ $title }}
	                    </h3>
	                </div>
	                <div class="panel-body">
            			<div class="form-group">
					        <div class="col-sm-11">
						        <label for="nama" class="control-label">Nama</label>
					            <input type="text" class="form-control" id="pasien-nama" name="pasien[nama]" placeholder="Nama" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="umur" class="control-label">Umur</label>
					            <input type="number" class="form-control" id="pasien-umur" name="pasien[umur]" placeholder="Umur" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="suku" class="control-label">Suku/Kebangsaan</label>
					            <input type="text" class="form-control" id="pasien-suku" name="pasien[suku]" placeholder="Suku" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="agama" class="control-label">Agama</label>
						        <select class="form-control" id="pasien-agama" name="pasien[agama]" required>
						        	<option value="">--Pilih Agama--</option>
						        	@foreach($agama as $ag)
							        	<option value="{{ $ag }}">{{ $ag }}</option>
						        	@endforeach
						        </select>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="pendidikan" class="control-label">Pendidikan</label>
					            <select class="form-control" id="pasien-pendidikan" name="pasien[pendidikan]" required>
						        	<option value="">--Pilih Pendidikan--</option>
						        	@foreach($pendidikan as $pend)
							        	<option value="{{ $pend }}">{{ $pend }}</option>
						        	@endforeach
						        </select>
					        </div>
					    </div>	
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="pekerjaan" class="control-label">Pekerjaan</label>
					            <input type="text" class="form-control" id="pasien-pekerjaan" name="pasien[pekerjaan]" placeholder="Pekerjaan" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="alamat" class="control-label">Alamat</label>
						        <textarea class="form-control" id="pasien-alamat" name="pasien[alamat]" placeholder="Alamat" required></textarea>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="telepon" class="control-label">No telepon</label>
					            <input type="number" class="form-control" id="pasien-telepon" name="pasien[telepon]" placeholder="No telepon" required>
					        </div>
					    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-6">
			    <div class="panel filterable" style="overflow:auto;">
			        <div class="panel-heading">
			            <h3 class="panel-title">
			                <i class="ti-server"></i> Data Suami {{ $title }}
			            </h3>
			        </div>
			        <div class="panel-body">
		    			<div class="form-group">
					        <div class="col-sm-11">
						        <label for="nama" class="control-label">Nama</label>
					            <input type="text" class="form-control" id="suami-nama" name="suami[nama]" placeholder="Nama" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="umur" class="control-label">Umur</label>
					            <input type="number" class="form-control" id="suami-umur" name="suami[umur]" placeholder="Umur" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="suku" class="control-label">Suku/Kebangsaan</label>
					            <input type="text" class="form-control" id="suami-suku" name="suami[suku]" placeholder="Suku" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="agama" class="control-label">Agama</label>
						        <select class="form-control" id="suami-agama" name="suami[agama]" required>
						        	<option value="">--Pilih Agama--</option>
						        	@foreach($agama as $ag)
							        	<option value="{{ $ag }}">{{ $ag }}</option>
						        	@endforeach
						        </select>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="pendidikan" class="control-label">Pendidikan</label>
					            <select class="form-control" id="suami-pendidikan" name="suami[pendidikan]" required>
						        	<option value="">--Pilih Pendidikan--</option>
						        	@foreach($pendidikan as $pend)
							        	<option value="{{ $pend }}">{{ $pend }}</option>
						        	@endforeach
						        </select>
					        </div>
					    </div>	
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="pekerjaan" class="control-label">Pekerjaan</label>
					            <input type="text" class="form-control" id="suami-pekerjaan" name="suami[pekerjaan]" placeholder="Pekerjaan" required>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="alamat" class="control-label">Alamat</label>
						        <textarea class="form-control" id="suami-alamat" name="suami[alamat]" placeholder="Alamat" required></textarea>
					        </div>
					    </div>
					    <div class="form-group">
					        <div class="col-sm-11">
						        <label for="telepon" class="control-label">No telepon</label>
					            <input type="number" class="form-control" id="suami-telepon" name="suami[telepon]" placeholder="No telepon" required>
					        </div>
					    </div>
			        </div>
			    </div>
			</div>
	    </div>
	    <div class="text-center">
		    <button type="submit" class="btn btn-lg btn-primary">
		    	<i class="menu-icon ti-plus"></i> Simpan
		    </button>
	    </div>
	    <br>
	    <br>
	    <br>
	</form>
	<script type="text/javascript">
    	$('#form-pasien').submit(ev =>
    	{
			ev.preventDefault()

			let fd = $('#form-pasien').serialize()

			$.ajax({
				method: 'post',
				url: '{{ base_url }}pasien/store',
				data: fd,
				success(data)
				{
					swal({
                        title: "Success",
                        text: "Data pasien berhasil disimpan !",
                        type: "success",
                        confirmButtonColor: "#66cc99"
                    })

                    setTimeout(() => { location.href = '{{ base_url }}pasien' }, 500)
				}
			})
		})
	</script>
@endsection