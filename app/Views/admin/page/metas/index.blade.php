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
                                    <th>Halaman</th>
                                    <th>Nama</th>
                                    <th>Content</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Dibuat pada</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{ $d['page'] }}</td>
                                        <td>{{ $d['nama'] }}</td>
                                        <td>{{ $d['content'] }}</td>
                                        <td>{{ $d['deskripsi'] }}</td>
                                        <td>{{ $d['status'] }}</td>
                                        <td>{{ $d['created_at'] }}</td>
                                        <td>
                                            <button onclick="update(`{{ $d['id'] }}|{{ $d['page_id'] }}|{{ $d['nama'] }}|{{ $d['content'] }}|{{ $d['deskripsi'] }}|{{ $d['status'] }}`)" class="btn btn-primary" data-toggle="modal" data-target="#modal"><i class="menu-icon ti-pencil"></i> Ubah</button>
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
                                    <label for="halaman" class="control-label">Halaman</label>
                                    <select class="form-control" id="halaman" name="page_id" required>
                                        <option value="">--Pilih Halaman--</option>
                                        @foreach($pages as $p)
                                            <option value="{{ $p['id'] }}">{{ $p['nama'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <label for="nama" class="control-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <label for="content" class="control-label">Content</label>
                                    <input type="text" class="form-control" id="content" name="content" placeholder="Content" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <label for="deskripsi" class="control-label">Deskripsi</label>
                                    <textarea id="deskripsi" class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <label for="status" class="control-label">Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="">--Pilih Status--</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
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
        $table.columns(3)
        .order('asc')
        .draw()

        function add()
        {
            $type = 'ADD'
            $('#modal-title').html('Tambah Data')
            $('#halaman').val('')
            $('#nama').val('')
            $('#content').val('')
            $('#deskripsi').val('')
            $('#status').val('')
        }

        function update(val)
        {
            $type = 'EDIT'
            val = val.split('|')

            $('#modal-title').html('Ubah Data')
            $('#id').val(val[0])
            $('#halaman').val(val[1])
            $('#nama').val(val[2])
            $('#content').val(val[3])
            $('#deskripsi').val(val[4])
            $('#status').val(val[5])
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
                    url: `{{ base_url }}admin/metas/delete`,
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

        $('#form').submit(ev =>
        {
            ev.preventDefault()

            let data = $('#form').serialize()
            let url = ''
            let method = ''
            let message = ''

            if($type == 'ADD')
            {
                url = 'create'
                method = 'post'
                message = 'Data berhasil dibuat !'
                data = data.split('&')
                data.splice(0, 1)
                data = data.join('&')
            }
            else
            {
                url = 'update'
                method = 'put'
                message = 'Data berhasil diubah !'
            }

            $.ajax({
                url: `{{ base_url }}admin/metas/${url}`,
                method: method,
                data: data,
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