<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Category Selector</h4>
            </div>
            <div class="modal-body col-md-12">
               <div id="categorylist" class="col-md-4 caret-right">
                   @foreach($categories as $key => $value)
                       <span onclick="get_subcategory('{{ $value['id'] }}', '{{ $value['name'] }}');" style="cursor: pointer;"> {{ $value['name'] }} </span><br/>
                   @endforeach
               </div>
                <div id="subcategorylist" class="col-md-6" style=" border-left: thick solid #d58512;">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


