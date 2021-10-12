@extends('admin.main-page')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel filterable" style="overflow:auto;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ti-server"></i> Data {{ $title }}
                    </h3>
                </div>
                <div class="panel-body">
                    <button onclick="add()" class="btn btn-success" data-toggle="modal" data-target="#modal"><i class="menu-icon ti-plus"></i> Tambah Data</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-responsive">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Sub Judul</th>
                                    <th>Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Dibuat pada</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{ $d['judul'] }}</td>
                                        <td>{{ $d['sub_judul'] }}</td>
                                        <td>{{ $d['foto'] }}</td>
                                        <td>{{ $d['deskripsi'] }}</td>
                                        <td>{{ $d['created_at'] }}</td>
                                        <td>
                                            <button onclick="update(`{{ $d['id'] }}|{{ $d['judul'] }}|{{ $d['sub_judul'] }}|{{ $d['foto'] }}|{{ $d['deskripsi'] }}`)" class="btn btn-primary" data-toggle="modal" data-target="#modal"><i class="menu-icon ti-pencil"></i> Ubah</button>
                                            <button onclick="deletes({{ $d['id'] }})" class="btn btn-danger"><i class="menu-icon ti-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal" class="modal fade animated position_modal" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <form id="form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title" id="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <label for="judul" class="control-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <label for="sub_judul" class="control-label">Sub Judul</label>
                                    <input type="text" class="form-control" id="sub_judul" name="sub_judul" placeholder="Sub Judul" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <label for="foto" class="control-label">Foto</label>
                                    <input type="file" accept="image/*" class="form-control" id="foto" placeholder="Foto">
                                    <div class="form-group">
                                        <label for="tanggal">Preview Image</label>
                                        <br>
                                        <img src="" id="image-preview" width="50%"> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <label for="deskripsi" class="control-label">Deskripsi</label>
                                    <textarea id="deskripsi" class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $type = 'ADD'
        $table = $('#table-responsive').DataTable()
        $table.columns(4)
        .order('asc')
        .draw()

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

        function add()
        {
            $type = 'ADD'
            $('#modal-title').html('Tambah Data')
            $('#judul').val('')
            $('#sub_judul').val('')
            $('#image-preview').attr('src', '')
            $('#deskripsi').val('')
        }

        function update(val)
        {
            $type = 'EDIT'
            val = val.split('|')

            $('#modal-title').html('Ubah Data')
            $('#id').val(val[0])
            $('#judul').val(val[1])
            $('#sub_judul').val(val[2])
            $('#image-preview').attr('src', `{{ base_url }}portofolios/${val[3]}`)
            $('#deskripsi').val(val[4])
        }

        function deletes(val)
        {
            swal({
                title: 'Apakah anda yakin?',
                text: "Data tidak bisa dikembalikan lagi setelah dihapus!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#66cc99',
                cancelButtonColor: '#ff6666',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger'
            }).then(function () {
                $.ajax({
                    method: 'delete',
                    url: `{{ base_url }}admin/portofolio/delete`,
                    data: {
                        id: val,
                    },
                    success(data)
                    {
                        swal({
                            title: "Success",
                            text: 'Data berhasil di hapus',
                            type: "success",
                            confirmButtonColor: "#66cc99"
                        })

                        setTimeout(() => { location.reload() }, 500)
                    }
                })
            }, function (dismiss) {})
        }

        $("#foto").change(function () {
            readURL(this, 'image-preview')
        })

        $('#form').submit(ev =>
        {
            ev.preventDefault()

            let data = new FormData($('#form')[0])
            let url = ''
            let method = ''
            let message = ''
            let foto = $('#foto')[0].files[0]

            if($type == 'ADD')
            {
                url = 'create'
                method = 'post'
                message = 'Data berhasil dibuat !'
                // data = data.split('&')
                // data.splice(0, 1)
                // data = data.join('&')
            }
            else
            {
                url = 'update'
                method = 'post'
                message = 'Data berhasil diubah !'
            }

            if(foto !== undefined)
            {
                data.append('foto', foto)
            }

            $.ajax({
                url: `{{ base_url }}admin/portofolio/${url}`,
                method: method,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success(data)
                {
                    swal({
                        title: "Success",
                        text: message,
                        type: "success",
                        confirmButtonColor: "#66cc99"
                    })

                    setTimeout(() => { location.reload() }, 500)
                }
            })
        })
    </script>
@endsection