<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 6/9/16
 * Time: 9:14 PM
 */?>
<div id="slider-carousel" class="carousel slide" data-ride="carousel" >

    <div class="carousel-inner">
        <?php $stripCount = 0 ?>
        @foreach($adDetails as $key => $value)
            <div class="item col-md-12 <?php if($stripCount == 0) echo 'active'; $stripCount = 1?>" style="padding-bottom: 5px; padding-top: 3px;">
                <img src="{{ $value['images_path'] }}" class="col-md-12">
            </div>

        @endforeach
    </div>

</div>
