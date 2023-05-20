@extends('admin.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Update Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="/admin/blog/update">
                @csrf
                <input hidden type="text" value="{{ $blog->id }}" name="id">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title Arabic</label>
                    <input type="text" name="title_ar" value="{{ $blog->title_ar }}" class="form-control" id="exampleInputEmail1" placeholder="Enter your arabic title">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Title Duetch</label>
                    <input type="text" name="title_du" value="{{ $blog->title_du }}" class="form-control" id="exampleInputEmail1" placeholder="Enter your dutech title">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Description Arabic</label>
                    <textarea name="description_ar" class="form-control" id="exampleInputEmail1" cols="30" rows="10">{{ $blog->descriptioni->ar }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Description Duetch</label>
                    <textarea name="description_du" class="form-control" id="exampleInputEmail1" cols="30" rows="10">{{ $blog->descriptioni->du }}</textarea>
                  </div>

                  <div class="form-group">
                    <img width="400" height="400" src="{{ $blog->image }}" alt="">
                    <label for="exampleInputFile">Choose new image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
