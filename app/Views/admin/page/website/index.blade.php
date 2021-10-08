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
                                    <th>Nama</th>
                                    <th>Content</th>
                                    <th>Deskripsi</th>
                                    <th>Dibuat pada</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{ $d['name'] }}</td>
                                        <td>{{ $d['content'] }}</td>
                                        <td>{{ $d['deskripsi'] }}</td>
                                        <td>{{ $d['created_at'] }}</td>
                                        <td>
                                            <button onclick="update(`{{ $d['id'] }}|{{ $d['name'] }}|{{ $d['content'] }}|{{ $d['deskripsi'] }}`)" class="btn btn-primary" data-toggle="modal" data-target="#modal"><i class="menu-icon ti-pencil"></i> Ubah</button>
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
                                    <label for="nama" class="control-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="name" placeholder="Nama" required>
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
            $('#nama').val('')
            $('#content').val('')
            $('#deskripsi').val('-')
        }

        function update(val)
        {
            $type = 'EDIT'
            val = val.split('|')

            $('#modal-title').html('Ubah Data')
            $('#id').val(val[0])
            $('#nama').val(val[1])
            $('#content').val(val[2])
            $('#deskripsi').val(val[3])
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
                url: `{{ base_url }}admin/website/${url}`,
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