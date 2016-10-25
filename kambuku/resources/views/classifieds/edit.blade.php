
@extends('master')

@section('title')
  Edit {{ $classified->title }}
@endsection
@section('middle_header')
    @include('partials.middle_header')
@endsection

@section('bottom_header')
    @include('partials.bottom_header')
@endsection
@section('content')
    <section>
        <div class="container">
            @include('partials.breadcrumbs')
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">



                    @include('partials.adverts.sidebar_ad')
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                {!! Form::open(array('url'=>route('classifieds.update', $classified->id),'method'=>'PATCH', 'files'=>true)) !!}
                    {!! csrf_field() !!}
                <h2 class="title text-center">Edit Your {{ $classified->title }}</H2>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                    <div class=" col-md-6">
                        <input type="text" name="name" value="{{ $classified->title }}" class="form-control" placeholder="Name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                     <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    <div class=" col-md-6">
                        <input type="number" value="{{ $classified->price }}" name="price" min="0" max="10000000" class="form-control" placeholder="Price">
                        @if ($errors->has('price'))
                            <span class="help-block">
                                         <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('decription') ? ' has-error' : '' }}" style="padding-top: 5%">
                    <div class="col-md-12">
                        <textarea name="description" id="descrption"  class="form-control" rows="8" placeholder="Product Description">{{ $classified->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12" style="padding-top: 1.5%">
                    <label>Category</label>
                           <span  class="form-control">
                               <label href="#myModal" style="cursor: pointer;" data-toggle="modal" id="category">{{ $category->name}}</label>

                               <span class="form-group{{ $errors->has('category') ? ' has-error' : '' }} col-md-12">
                               <input type="hidden" name="category" value="{{ $category->id }}" id="category_input"/>
                                   @if ($errors->has('category'))
                                       <span class="help-block">
                                                <strong>{{ $errors->first('category') }}</strong>
                                            </span>
                                   @endif
                               </span>

                                <div class="form-group{{ $errors->has('subcategory') ? ' has-error' : '' }} col-md-12">
                                    <input type="hidden" name="subcategory" value="{{ $sub_category->id }}" id="subcategory_input"/>
                                    @if ($errors->has('subcategory'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('subcategory') }}</strong>
                                            </span>
                                    @endif
                                </div>
                               <label id="subcategory" >:: {{ $sub_category->name }}</label>
                           </span>
                </div>

                <div class="col-md-12" style="padding-top: 1.5%">
                    <div class="info"><span></span></div>
                    <div class="form-group">
                        <h5>Images (Uploaded {{ $classified_images_count }} out of 5)  <small class="text-muted">Select The Images that you want deleted</small></h5>

                        <div class="carousel-inner">
                            <div class="portfolioContainer">
                                @if($classified_images_count != 0)
                                <?php $c = 0 ?>
                                    @foreach($classified_images as $key => $value)
                                        <img src="{{ asset($image_path->value.$value['filename']) }}" class="thumb-img" width="100px" height="100px" alt="">
                                        <input type="checkbox" value="{{ $value['filename'] }}" name="check_box_images_{{$c}}">
                                   <?php $c++ ?>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="padding-top: 1.5%">
                        <h5>Image Upload <small class="text-muted">Upload More {{ 5 - $classified_images_count }} Images</small></h5>
                        <?php $i = 1; ?>
                        <?php $o = $classified_images_count ?>
                        @if($classified_images_count < 5)
                           @while($o < 5)
                                {!! Form::file( 'file'.$i, ['id'=>'file'.$i]) !!}
                               <?php $i++; $o++ ?>
                            @endwhile
                        @else
                            Your image upload max has been reached, delete some pictures before you upload anymore.
                        @endif
                    </div>

                </div>

                <div  class="col-md-4" style="padding-top: 1.5%">
                    <label>Condition</label>
                    <select name="condition" class="form-control" >
                        @foreach($conditions as $key => $value)
                            @if ($value['id'] == $classified->contition)
                                <option value="{{ $value['id'] }}" selected>{{ $value['name'] }}</option>
                            @else
                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div  class="col-md-4" style="padding-top: 1.5%">
                    <label>Status</label>
                    <select name="is_active" class="form-control" >
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>
                </div>

                <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }} col-md-12" style="padding-top: 1.5%">
                    <input type="text" name="tags" class="form-control" value="{{ $classified->keywords }}"  placeholder="tags">
                    @if ($errors->has('category'))
                        <span class="help-block">
                                                <strong>{{ $errors->first('tags') }}</strong>
                                            </span>
                    @endif
                    <span>Please enter keywords separated buy commas(,). Tags help people find your stuff easier</span>
                </div>
                <div class="form-group col-md-12">
                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Update">
                </div>
               {!! Form::close() !!}
            </div>
        </div>
        </div>

    </section>
    @include('classifieds.category_modal')
@endsection


@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/classifieds/create.js') }}" ></script>
@endsection