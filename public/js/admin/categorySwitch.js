
function get_subcategory(){
    var  $id =  document.getElementById('category').value;

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
        var subcategory = '<option value="'+item.id+'">'+item.name+'</option>';
        document.getElementById('subcategorylist').innerHTML += subcategory;
    });
}

function clear_element()
{
    document.getElementById('subcategorylist').innerHTML = "";
}

