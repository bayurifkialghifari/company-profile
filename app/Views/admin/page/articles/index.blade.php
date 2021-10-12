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
                    <a href="{{ base_url }}admin/article/add" class="btn btn-success" ><i class="menu-icon ti-plus"></i> Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-responsive">
                            <thead>
                                <tr>
                                    <th>Penulis</th>
                                    <th>Judul</th>
                                    <th>Sub Judul</th>
                                    <th>Pengunjung</th>
                                    <th>Dibuat pada</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{ $d['user_id'] }}</td>
                                        <td>{{ $d['judul'] }}</td>
                                        <td>{{ $d['sub_judul'] }}</td>
                                        <td>{{ $d['visit'] }}</td>
                                        <td>{{ $d['created_at'] }}</td>
                                        <td>
                                            <a href="{{ base_url }}admin/article/edit?id={{ $d['id'] }}" class="btn btn-primary"><i class="menu-icon ti-pencil"></i> Ubah</a>
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

    <script type="text/javascript">
        $table = $('#table-responsive').DataTable()
        $table.columns(4)
        .order('asc')
        .draw()

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
                    url: `{{ base_url }}admin/banner/delete`,
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

    </script>
@endsection