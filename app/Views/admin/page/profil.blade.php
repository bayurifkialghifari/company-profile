@extends('admin.main-page')
@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="panel ">
                <div class="panel-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="text-center mbl m-t-10">
                                <img src="{{ $user('foto') == '' ? base_url . 'assets/img/authors/avatar1.jpg' : base_url }}" alt="img" class="img-circle img-bor" id="image-preview" width="150px" />
                            </div>
                        </div>
                        <div class="profile_user">
                            <h3 class="user_name_max">{{ $user('nama') }}</h3>
                            <p>{{ $user('email') }}</p>
                        </div>
                        &nbsp;&nbsp;
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-custom">
                                    <li class="active">
                                        <a href="#tab-activity" data-toggle="tab">
                                            <strong>Data Pengguna</strong>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content nopadding noborder">
                                    <div id="tab-activity" class="tab-pane animated fadeInRight fade in active">
                                        <form action="#" id="form" class="form-horizontal">
                                        	<br>
                                            <div class="form-group">
			                                    <label for="nama" class="col-sm-2 control-label">Nama</label>
			                                    <div class="col-sm-10">
			                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $user('nama') }}"
			                                               placeholder="Nama" required>
			                                    </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="foto" class="col-sm-2 control-label">Foto</label>
			                                    <div class="col-sm-10">
			                                        <input type="file" accept="image/*" class="form-control" id="foto" name="foto">
			                                    </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="email" class="col-sm-2 control-label">Email</label>
			                                    <div class="col-sm-10">
			                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user('email') }}"
			                                               placeholder="Email" required>
			                                    </div>
			                                </div>
			                                <div class="form-group">
			                                    <label for="password" class="col-sm-2 control-label">Password</label>
			                                    <div class="col-sm-10">
			                                        <input type="password" class="form-control" id="password" name="password" value="" 
			                                               placeholder="Password">
			                                    </div>
			                                </div>
			                                <div class="form-group text-right">
			                                    <div class="col-sm-12">
			                                        <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Simpan" >
			                                    </div>
			                                </div>
                                        </form>
                                    </div>
                                </div>	
                                <!-- tab-content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ base_url }}assets/js/jquery.min.js"></script>
    <script type="text/javascript">
    	// File Review Function
		function readURL(input, id)
	    {
	        if (input.files && input.files[0]) 
	        {
	        
	            let reader = new FileReader()

	            reader.onload = function (e) 
	            {
	                $(`#${id}`).attr('src', e.target.result)
	            }

	            reader.readAsDataURL(input.files[0])
	        }
	    }

	    $("#foto").change(function () {
	        readURL(this, 'image-preview')
	    })


    	$('#form').submit(ev =>
    	{
    		ev.preventDefault()

    		let fd = new FormData()

	    	let nama = $('#nama').val()
	    	let email = $('#email').val()
	    	let password = $('#password').val()
	    	let foto = $('#foto')[0].files[0]
	    	

	    	// Form data append
	    	fd.append('nama', nama)
	    	fd.append('email', email)
	    	fd.append('password', password)

	    	// Check if image not change
	        if(foto !== undefined)
	        {
	        	fd.append('foto', foto)
	        }

	        $.ajax({
    			method: 'post',
    			url: '{{ base_url }}profil/update',
    			data: fd,
    			processData: false,
	            contentType: false,
	            cache: false,
	            async: false,
	            success(data)
	            {
	            	swal({
                        title: "Success",
                        text: "Profil berhasil diubah !",
                        type: "success",
                        confirmButtonColor: "#66cc99"
                    })

                    setTimeout(() => { location.reload() }, 500)
	            }
    		})
    	})
    </script>
@endsection