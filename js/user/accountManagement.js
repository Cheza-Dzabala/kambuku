/**
 * Created by cheza on 6/8/16.
 */


function deactivate(id)
{
   // alert(id);

    $.ajax({
        type: 'POST',
        url: main_link+'api/deactivate/'+id,
        datatype: 'json',
        timeout: 10000,
        success: function(data, status){
            $.Notification.notify('warning', 'bottom center', 'Successfully Deactivated Listing');
            document.getElementById('activeButton_'+id).innerHTML = '<a class="userad_quantity_delete" onclick="activate('+id+')"><i class="fa fa-check"></i></a>';
            document.getElementById('activeStatus_'+id).innerHTML = '<span>Inactive</span>';
            console.log(data);
        },
        error: function(data){
            $.Notification.notify('danger', 'bottom center', 'Unable To Deactivate Listing');
            console.log(data);
        }
    });
}

function activate(id)
{
  //  alert(id)

    $.ajax({
        type: 'POST',
        url: main_link+'api/activate/'+id,
        datatype: 'json',
        timeout: 10000,
        success: function(data, status){
            $.Notification.notify('success', 'bottom center', 'Successfully Activated Listing');
            document.getElementById('activeButton_'+id).innerHTML = '<a class="userad_quantity_delete" onclick="deactivate('+id+')"><i class="fa fa-power-off"></i></a>';
            document.getElementById('activeStatus_'+id).innerHTML = '<span style="color: darkgreen">Active </span>';
            console.log(data);
        },
        error: function(data){
            $.Notification.notify('danger', 'bottom center', 'Unable To Activate Listing');
            console.log(data);
        }
    });
}