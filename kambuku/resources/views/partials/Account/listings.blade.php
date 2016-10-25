@if(isset($empty))
    <div class="table-responsive userad_info">
        <table class="table table-condensed">
            <thead>
            <tr class="userad_menu">
         <td><center>No Listings To Show</center></td>
            </tr>
            </thead>
        </table>
    </div>
    @else
<div class="table-responsive userad_info">
    <table class="table table-condensed">
        <thead>
        <tr class="userad_menu">

            <td class="image">Item</td>
            <td class="description"></td>
            <td class="price">Price</td>
            <td class="quantity">Active</td>
            <td class="viewa">Views</td>
            <td class="viewa">Action</td>
        </tr>
        </thead>
        <tbody>

        @foreach($listings as $key => $value)
        <tr >
            <td class="userad_product" >
                <a href=""><img src="{{ asset($image_path->value.$value['image_path']) }}" alt="Antique Vase" height="100" width=""></a>
            </td>
            <td class="userad_description" style="padding-left: 10%; width: 40%">
                <h4><a href="">{{ $value['title'] }}</a></h4>
                <p
                   style=" overflow: hidden;
                   width: 90%;

                                                   text-overflow: ellipsis;
                                                   display: -webkit-box;
                                                   -webkit-box-orient: vertical;
                                                   -webkit-line-clamp: 1; /* number of lines to show */
                                                   line-height: 25px;        /* fallback */
                                                    max-height: 25px; "
                >{{ $value['description'] }}</p>
            </td>
            <td class="userad_price">
                <p>{{ number_format($value['price'], 2) }}</p>
            </td>
            <td class="userad_quantity">
                <p>
                    <span  id="activeStatus_{{ $value['id'] }}">
                    @if ( $value['is_active'] == '1' )
                       <span style="color: darkgreen">Active </span>
                        @else
                        Inactive
                     @endif
                    </span>
                </p>
            </td>
            <td class="cuserad_total">
                <p class="userad_views">{{ $value['view_count'] }}</p>
            </td>
            <td class="userad_delete" style="display: inline">
                <a class="userad_quantity_delete"  href="{{ route('edit.product', [$value['id']]) }}"><i class="fa fa-pencil"></i></a>
                <span id="activeButton_{{ $value['id'] }}">
                     @if ($value['is_active']=='1')
                        <a class="userad_quantity_delete" onclick="deactivate('{{ $value['id'] }}')"><i class="fa fa-power-off"></i></a>
                    @else
                        <a class="userad_quantity_delete"  onclick="activate('{{ $value['id'] }}')"><i class="fa fa-check"></i></a>
                    @endif
                </span>

                <a class="userad_quantity_delete" href="{{ route('listing.delete', [$value['id']]) }}"><i class="fa fa-times"></i></a>
            </td>


        </tr>
            @endforeach
        </tbody>

    </table>
    {!! $listings->appends(['perPage' => $perPage])->links() !!}
</div>
    @endif