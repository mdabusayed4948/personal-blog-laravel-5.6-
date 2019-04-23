@extends('layouts.backend.app')

@section('title','Post')

@push('css')
    <!-- Bootstrap Select Css -->
   <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/backend/css/image.css') }}" rel="stylesheet">


@endpush

@section('content')
    <div class="container-fluid">

        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ADD NEW POST
                        </h2>

                    </div>
                    <div class="body">

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="title">
                                    <label class="form-label">Post Title</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Featured Image</label>
                               <table>
                            <thead>
                              <tr class="info">
                               <th class="photo-id">{{ sprintf('%05d',$post_id+1) }}</th>  
                              </tr> 
                            </thead>
                            <tbody>
                              <tr>
                                <td class="photo">
                                  <img class="photo-photo" id="showPhoto" src="{{ Storage::disk('public')->url('default/default.png',null) }}"  />   
                                <input type="file" name="image" id="photo" accept="image/x-png,image/png,image/jpg,image/jpeg,">
                                 
                                </td>
                              </tr> 
                              <tr >
                                <td >
                                    <input type="button" name="image" id="browse_file" class="form-control btn-browse" value="Brouse">
                                </td>
                              </tr>
                            </tbody>    
                          </table>   
                           </div>



                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Categories and Tags
                        </h2>

                    </div>
                    <div class="body">

                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                <label for="category">Select Categories</label>
                                <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                                  @foreach($categories as $category)
                                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
                                <label for="tag">Select Tags</label>
                                <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        

                        

                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Categories and Tags
                        </h2>

                    </div>
                    <div class="body">

                        <div class="form-group form-float">
                          <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                             <label for="publish">Publish</label>
                        
                        </div>
                        <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.post.index') }}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>

                    </div>
                </div>
            </div>
            
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            BODY
                        </h2>

                    </div>
                    <div class="body">
                       <textarea id="tinymce" name="body"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <!-- Vertical Layout | With Floating Label -->

    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/backend/js/image.js') }}"></script>
 
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
   <script>
       $(function () {
           //TinyMCE
           tinymce.init({
               selector: "textarea#tinymce",
               theme: "modern",
               height: 300,
               plugins: [
                   'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                   'searchreplace wordcount visualblocks visualchars code fullscreen',
                   'insertdatetime media nonbreaking save table contextmenu directionality',
                   'emoticons template paste textcolor colorpicker textpattern imagetools'
               ],
               toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
               toolbar2: 'print preview media | forecolor backcolor emoticons',
               image_advtab: true
           });
           tinymce.suffix = ".min";
           tinyMCE.baseURL = "{{ asset('assets/backend/plugins/tinymce') }}";
       });
   </script>

@endpush