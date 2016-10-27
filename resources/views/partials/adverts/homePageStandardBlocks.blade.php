<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 6/9/16
 * Time: 8:36 PM
 */ ?>

@if($adDetails != null)
    @foreach($adDetails as $key => $value)
        <div class="advertside text-center"><!--ads-->
            <img src="{{ $value['images_path'] }}" alt="" />
        </div><!--/ads-->
    @endforeach
@endif

