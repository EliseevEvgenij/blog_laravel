@extends('admin.layouts.main') <!-- путь к файлу -->

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data" >         
            @csrf   <!-- если метод ПОСТ kсрф надо ставить чтобы заработало -->
            <div class="form-group w-25">               <!--  w-25 это ширина столбца(формы) -->
                    <input type="text" class="form-control" name="title" placeholder="Название поста"
                     value="{{old('title')}}">     <!-- old - чтобы при одном не заполненном не сбрасывалось другое поле -->
                    @error('title')
                        <div class="text-danger">Это поле обезательно для заполнения</div>
                    @enderror 
                  </div>

                  <div class="form-group" class="w-25">
                      <textarea id="summernote" name="content">
                        <?php {{old('content');}} ?>  
                      </textarea>
                      @error('content')
                        <div class="text-danger">Это поле обезательно для заполнения</div>
                    @enderror 
                  </div>

                  <div class="form-group w-50">
                    <label for="exampleInputFile">Добавить превью</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="preview_image">
                        <label class="custom-file-label">Выберети изображение</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Загрузить</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group w-50">
                    <label for="exampleInputFile">Добавить главное изображение</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="main_image">
                        <label class="custom-file-label">Выберети изображение</label>
                      </div>
                      
                      <div class="input-group-append">
                        <span class="input-group-text">Загрузить</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group w-50">
                        <label>Выберите категорию</label>
                        <select name="category_id" class="form-control">
                          @foreach($categories as $category)
                          <option value="{{$category->id}}" 
                          {{ $category->id == old('category_id') ? 'selected' : ' ' }} 
                          >{{$category->title}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                  <label>Тэги</label>
                  <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                    @foreach($tags as $tag)
                  <option value="{{$tag->id}}">{{$tag->title}}</option>
                  @endforeach
                  </select>
                </div>

                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Добавить">
                  </div>

            </form>
          </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  @endsection