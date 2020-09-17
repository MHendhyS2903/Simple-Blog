<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Tutorial Laravel #21 : CRUD Eloquent Laravel - www.malasngoding.com</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    CRUD Data Pegawai - <strong>TAMBAH DATA</strong> - <a href="https://www.malasngoding.com/category/laravel" target="_blank">www.malasngoding.com</a>
                </div>
                <div class="card-body">
                    <a href="/pegawai" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="/post/update/{{ $post->postID }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" placeholder="Judul Konten ..." value="{{ $post->judul}}">

                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Label ID</label>
                            <select type="text" name="labelID" class="form-control" placeholder="Label Konten ...">
                              @foreach($label as $data)
                              <option value="{{ $data->labelID }}" selected>{{ $data->nama }}</option>
                              @endforeach
                            </select>
                          </div>

                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" placeholder="User ID Konten ...">

                            @if($errors->has('id'))
                                <div class="text-danger">
                                    {{ $errors->first('id')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Konten</label>
                            <textarea name="konten" class="form-control" placeholder="Konten ..." rows="6">{{ $post->konten }}</textarea>

                             @if($errors->has('konten'))
                                <div class="text-danger">
                                    {{ $errors->first('konten')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                          <label>Foto</label>
                          <input type="file" name="foto" class="form-control" placeholder="Foto Konten ..." value="{{ $post->foto }}">
                          
                          @if($errors->has('foto'))
                          <div class="text-danger">
                            {{ $errors->first('foto')}}
                          </div>
                          @endif
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</html>