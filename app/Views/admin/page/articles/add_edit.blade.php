@extends('admin.main-page')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel filterable" style="overflow:auto;">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ti-server"></i> {{ $title }}
                    </h3>
                </div>
                <div class="panel-body">
                    <form id="form">
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
                                    <label for="isi" class="control-label">Deskripsi</label>
                                    <textarea id="isi" class="form-control" name="isi" placeholder="Isi Artikel"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-11">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ base_url }}admin/article" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>

    <script type="text/javascript">
        $type = '{{ $type }}'

        let myEditor = ClassicEditor
        .create( document.querySelector( '#isi' ), {
            ckfinder: {
                uploadUrl: '<?= base_url ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
        } )
        .then( editor => {
            myEditor = editor
        })
        .catch( error => {
            console.error( error )
        })

        if($type == 'EDIT')
        {
            $url = window.location.search
            $url = new URLSearchParams($url)
            $id = $url.get('id')
            
            $.ajax({
                url: '{{ base_url }}admin/article/get',
                method: 'post',
                data: {
                    id: $id
                },
                success(data)
                {
                    data = JSON.parse(data)

                    $('#id').val(data.id)
                    $('#judul').val(data.judul)
                    $('#sub_judul').val(data.sub_judul)
                    myEditor.data.set(data.isi)
                }
            })
        }

        $('#form').submit(ev =>
        {
            ev.preventDefault()

            let data = new FormData($('#form')[0])
            let url = ''
            let method = ''
            let message = ''
            
            if($type == 'ADD')
            {
                url = 'create'
                method = 'post'
                message = 'Data berhasil dibuat !'
            }
            else
            {
                url = 'update'
                method = 'post'
                message = 'Data berhasil diubah !'
            }

            $.ajax({
                url: `{{ base_url }}admin/article/${url}`,
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

                    setTimeout(() => { location.href = '{{ base_url }}admin/article' }, 500)
                }
            })
        })
    </script>
@endsection