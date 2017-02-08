@extends('master')

@section('title')
    Create
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
                    @include('partials.category_sidebar')

                    @include('partials.most_searched')

                    @include('partials.adverts.sidebar_ad')
                </div>
                </div>
                <div class="col-sm-9 padding-right">
                    <h2 class="title text-center">Post an Ad</H2>
                    {!! Form::open(array('url'=>'classifieds','method'=>'POST', 'files'=>true)) !!}
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class=" col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                     <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <div class=" col-md-6">
                            <input type="number" name="price" min="0" max="0" class="form-control" placeholder="Price" required>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('originalPrice') ? ' has-error' : '' }}" style="padding-top: 5%">
                            <div class=" col-md-6">
                                <input type="number" name="originalPrice" min="0" max="0" class="form-control" placeholder="Original Price" required>
                                @if ($errors->has('originalPrice'))
                                    <span class="help-block">
                                             <strong>{{ $errors->first('originalPrice') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('decription') ? ' has-error' : '' }}" style="padding-top: 5%">
                                <div class="col-md-12">
                                <textarea name="description" id="descrption"  class="form-control" rows="8" placeholder="Product Description" required></textarea>
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
                               <label href="#myModal" style="cursor: pointer;" data-toggle="modal" id="category">Category</label>

                               <span class="form-group{{ $errors->has('category') ? ' has-error' : '' }} col-md-12">
                               <input type="hidden" name="category" value="" id="category_input"/>
                                   @if ($errors->has('category'))
                                       <span class="help-block">
                                                <strong>{{ $errors->first('category') }}</strong>
                                            </span>
                                   @endif
                               </span>

                                <div class="form-group{{ $errors->has('subcategory') ? ' has-error' : '' }} col-md-12">
                               <input type="hidden" name="subcategory" value="" id="subcategory_input"/>
                                    @if ($errors->has('subcategory'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('subcategory') }}</strong>
                                            </span>
                                    @endif
                                </div>
                               <label id="subcategory" ></label>
                           </span>
                        </div>

                        <div class="col-md-12" style="padding-top: 1.5%">
                            <div class="info"><span></span></div>
                            <div class="form-group">
                                {!! Form::label('image', 'Select Your Pictures (5MB Max/per Image)') !!}

                                {!! Form::file('file1', ['id'=>'file1', 'class' => 'form-control']) !!}
                                {!! Form::file('file2', ['id'=>'file2', 'class' => 'form-control']) !!}
                                {!! Form::file('file3', ['id'=>'file3', 'class' => 'form-control']) !!}
                                {!! Form::file('file4', ['id'=>'file4', 'class' => 'form-control']) !!}
                                {!! Form::file('file5', ['id'=>'file5', 'class' => 'form-control']) !!}
                            </div>

                        </div>

                    <div  class="col-md-4" style="padding-top: 1.5%">
                        <label>Condition</label>
                        <select name="condition" class="form-control" >
                            @foreach($condition as $key => $value)
                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
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
                            <input type="text" name="tags" class="form-control"  placeholder="tags" required>
                            @if ($errors->has('category'))
                                <span class="help-block">
                                                <strong>{{ $errors->first('tags') }}</strong>
                                            </span>
                            @endif
                            <span>Please enter keywords separated buy commas(,). Tags help people find your stuff easier</span>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
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
    <script type="text/javascript" src="https://kambuku.com/public/js/classifieds/create.js" ></script>
@endsection
