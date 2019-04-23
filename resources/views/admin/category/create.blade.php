@extends('layouts.backend.app')

@section('title','Category')

@push('css')
    <link href="{{ asset('assets/backend/css/image.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ADD NEW Category
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name">
                                    <label class="form-label">Category Name</label>
                                </div>
                            </div>
                            <div class="form-group ">
                            <table>
                            <thead>
                              <tr class="info">
                               <th class="photo-id">{{ sprintf('%05d',$category_id+1) }}</th>  
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

                            <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->

    </div>
@endsection

@push('js')
   <script src="{{ asset('assets/backend/js/image.js') }}"></script>
 
@endpush