/**
 * Created by cheza on 6/9/16.
 */

function get_subcategory_admin(){
    var id = document.getElementById('category_id').value;
    clear_element_subcat();
    set_element_loading_subcat();
    // alert ($country);
    $.ajax({
        type: 'POST',
        url: main_link+'api/subcategory/'+id,
        datatype: 'json',
        timeout: 10000,
        success: function(data, status){
            clear_element_subcat();
            display_data_subcat(data);
            console.log(data);
        },
        error: function(){
            set_element_failed_subcat();
            // alert('failed');
        }
    });
}




function clear_element_subcat()
{
    document.getElementById('sub_category_id').innerHTML = '';
}

function set_element_loading_subcat()
{
    document.getElementById('sub_category_id').innerHTML = '<option>Loading Sub Categories....</option>';
}

function set_element_failed_subcat()
{
    document.getElementById('sub_category_id').innerHTML = '<option>Failed To Load Categories</option>';
}

function display_data_subcat(data)
{
    $.each(data, function(i, item){
        document.getElementById('sub_category_id').innerHTML += '<option value ="'+item.id+'">'+item.name+'</option>';
    });
}
