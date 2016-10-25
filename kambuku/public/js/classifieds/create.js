/**
 * Created by cheza on 2/16/16.
 */

    function get_subcategory($id, $name){

    set_category_element($id, $name);
    clear_element();
        // alert ($country);
    $.ajax({
        type: 'POST',
        url: main_link+'api/subcategory/'+$id,
        datatype: 'json',
        timeout: 10000,
        success: function(data, status){
            display_data(data);
            console.log(data);
        },
        error: function(){
            alert('failed');
        }
    });
}

function display_data(data)
{
    $.each(data, function(i, item){
        var subcategory = '<li  style="cursor: pointer; list-style: none" onclick="set_subcategory_element(\''+item.name+'\',\''+item.id+'\')">'+item.name+'</li>';
        document.getElementById('subcategorylist').innerHTML += subcategory;
    });
}

function clear_element()
{
    document.getElementById('subcategorylist').innerHTML = "";
}

function set_category_element($id, $name)
{
    document.getElementById('category').innerHTML = $name+' ::';
    document.getElementById('category_input').value = $id;
}

function set_subcategory_element($name, $id)
{
    document.getElementById('subcategory').innerHTML = $name;
    document.getElementById('subcategory_input').value = $id;
    $('#myModal').modal('hide');
}

