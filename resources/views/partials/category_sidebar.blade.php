<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 2/10/16
 * Time: 8:10 PM
 */?>

    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <?php $i = 0 ?>
        @foreach ($categories as $key => $value)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#tab_<?php echo $i; ?>">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            {{ $key}}
                        </a>
                    </h4>
                </div>
                <div id="tab_<?php echo $i; ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach ($value as $k => $v)
                                <li><a href="{{ route('category.browse', ['id'=> $v['id']]).'?page=1&perPage=9' }}">{{ $v['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <?php $i++; ?>
        @endforeach
    </div>
