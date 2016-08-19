<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $listActive = 0 ?>
                        <?php $dataTo = 0 ?>
                        @foreach($slides as $slide)

                        <li data-target="#slider-carousel" data-slide-to="<?php echo $dataTo; $dataTo += 1; ?>" <?php  if ($listActive == 0) echo 'class="active"'; $listActive = 1 ?>></li>

                        @endforeach
                    </ol>

                    <div class="carousel-inner">
                        <?php $active = 0 ?>
                        @foreach($slides as $slide)

                            <div class="item <?php if ($active == 0) echo 'active'; $active = 1 ?>">
                                <div class="col-sm-6">
                                    <h1>{{ $slide->header }}</h1>
                                    <h2>{{ $slide->sub_header }}</h2>
                                    <p>{{ $slide->description }}</p>
                                    @if($slide->web_link != '')
                                        <a type="button" class="btn btn-internet get" href="{{ $slide->web_link }}" target="_blank">
                                         <i class="fa fa-globe fa-2x"></i>   Find Out More
                                        </a>
                                    @endif

                                    @if($slide->facebook_link != '')
                                        <a type="button" class="btn btn-facebook get" href="{{ $slide->facebook_link }}" target="_blank">
                                           <i class="fa fa-facebook fa-2x"></i> Find Out More
                                        </a>
                                    @endif

                                    @if($slide->twitter_link != '')
                                        <a type="button" class="btn btn-twitter get" href="{{ $slide->twitter_link }}" target="_blank">
                                           <i class="fa fa-twitter fa-2x"></i> Find Out More
                                        </a>
                                    @endif


                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ $slide->image_path }}" class="girl img-responsive" alt="" />

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->