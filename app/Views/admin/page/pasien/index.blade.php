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
                    <a href="{{ base_url }}pasien/create" class="btn btn-success"><i class="menu-icon ti-plus"></i> Tambah Pasien</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table-responsive">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Suku</th>
                                    <th>Agama</th>
                                    <th>Pendidikan</th>
                                    <th>Alamat</th>
                                    <th>Suami</th>
                                    <th>Dibuat pada</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{ $d['nama'] }}</td>
                                        <td>{{ $d['umur'] }}</td>
                                        <td>{{ $d['suku'] }}</td>
                                        <td>{{ $d['agama'] }}</td>
                                        <td>{{ $d['pendidikan'] }}</td>
                                        <td>{{ $d['alamat'] }}</td>
                                        <td>{{ $d['suami'] }}</td>
                                        <td>{{ $d['created_at'] }}</td>
                                        <td>
                                            <a href="{{ base_url }}pasien/detail/{{ $d['id'] }}" class="btn btn-warning"><i class="menu-icon ti-search"></i> Detail</a>
                                            <a href="{{ base_url }}pasien/detail/{{ $d['id'] }}|edit-pasien" class="btn btn-primary"><i class="menu-icon ti-pencil"></i> Ubah</a>
                                            <button class="btn btn-danger"><i class="menu-icon ti-trash"></i> Hapus</button>
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
        $table.columns(7)
        .order('desc')
        .draw()

    </script>
@endsection