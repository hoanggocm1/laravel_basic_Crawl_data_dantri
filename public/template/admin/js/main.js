

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//dang dung
function removeMenu(id){
    if (confirm('Xóa danh mục, không thể khôi phục?')){
        $.ajax(
            {
                type:'DELETE',
                datatype: 'JSON',
                data: { id },
                url: '/admin/menus/destroy',
                success: function (result){
                    if(result.code == 200){
                        $('#listMenu_'+id).remove();
                        alert(result.message);
                    }
                    else{
                        alert(result.message);
                }
            }
            }
        )

    }
}


function removeproduct(id,url){
    if(confirm('xoa hay khong')){
        $.ajax(
            {
                type:'get',
                datetype:'JSON',
                data:{id},
                url:url,
                success:function(){
                    if(result){
                        alert(result.message);
                        location.reload();
                    } else {
               
                      location.reload();
                  alert(sresult.message1);
                  location.reload();
                  
                  }
                }
            }
        )

    }
}


//upload file

$('#uploadImageProduct').change(function(){
    const form = new FormData();
   var a = form.append('file',$(this)[0].files[0]);

    $.ajax({

        processData: false,
        contentType: false,
        type:'post',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (result){
            if(result.error == false){
                $('#image_show').html('<a href="' + result.url.fullUrl + '  " target="_blank" ><img src="' + result.url.fullUrl + '" width="100px"></a>');
                $('#file').val(result.url.fullUrl);

                $('#image_change_name').html('<p style="float: left;"> Tên của hình ảnh sẽ được lưu thành:'+ '&ensp;' + ' <p  style="color:green; "> ' + result.url.name+ ' </p> </p>');

            }
            else{
                alert('Upload file lỗi!');
            }
        }

    });
   
});



/// up load nhieu image tối đa 4
$('#uploadImageProducts').change(function(){
  
        const form = new FormData();
    form.append('files[]',$(this)[0].files[0]);
    form.append('files[]',$(this)[0].files[1]);
    form.append('files[]',$(this)[0].files[2]);
    form.append('files[]',$(this)[0].files[3]);
    // form.append('files[]',$(this)[0].files[4]);
    // form.append('files[]',$(this)[0].files[5]);

    $.ajax({
        processData: false,
        contentType: false,
        type:'post',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services/images',
        success: function (result){
            if(result.error == false){
                var a = new Array;
                $('#demImages').val(result.url.dem)
             
                for (let i = 0; i < result.url.dem ; i++) {

                    
                $('#block_image').append('<div class="images_show" style="padding-right: 10px;padding-top: 5px;"><a href="' + result.url.fullUrl[i] + '  " target="_blank" ><img src="' + result.url.fullUrl[i] + '" width="100px" height= "150px"; ></a></div>'+
                '<input type="hidden" name="files'+i+'" value="'+result.url.fullUrl[i] +'" id="files'+i+'" >');
               
                a[i] =   result.url.fullUrl[i];
         
                }
            }
            else{
                alert('Upload file lỗi!');
            }
        }

    });
});
//-----------------------------------------------------------------------------------
function updateActive(id,idActive){
    const Active = document.getElementById(id).getAttribute("src");
    $.ajax({
        type:'post',
        dataType:'JSON',
        data:{ id, Active},
        url: 'update_ProductActive/'+id+'/'+Active,
        success:function(result){
           
        if(result.giatri == 0){
            document.getElementById(id).textContent = 'On';
            document.getElementById(id).setAttribute("src",1);
            document.getElementById(id).style.color = 'green';
           
        }
        if(result.giatri == 1)
        {
            document.getElementById(id).textContent = 'Off';
            document.getElementById(id).setAttribute("src",0);
            document.getElementById(id).style.color = 'red';
        }
        }
    })
   

}

function deleteProduct(id){
 var check =  confirm('Xác nhận xóa sản phẩm?')
if(check){
    $.ajax({
        type:'DELETE',
        dataType:'JSON',
        data:{id},
        url:'delete-product',
        success: function(result){
           if(result.code == 200){
            $('#listProducts_'+result.id).remove();
            if(result.status == 0){
                let now = Number($('#count_Reject').text())
                $('#count_Reject').text(now-1)
               }else if(result.status == 1){
                let now = Number($('#count_Pending').text())
                $('#count_Pending').text(now-1)
               }else{
                let now = Number($('#count_Approve').text())
                $('#count_Approve').text(now-1)
               }
              
                alert(result.message)
           }else{
            alert(result.message)
           }
        }
    })
}

}

function deleteImageProduct(id){
       check = confirm('Xóa hình ảnh này?')
        if(check){
            $.ajax({
                type:'post',
                dataType:'JSON',
                data:{id},
                url:'/admin/products/delete-image-product/'+id,
                success: function(result){
                    $('#ImageProduct'+id).css('display','none');
                }

            })
        }

}

function changeImageProduct(id){
    check = confirm('Xác nhận đổi hình ảnh này?')
    const nameImageProduct = $('#file').val();
    const a = $("#show_image_product_img"+id);
  
    if(check){
        $.ajax({
            type:'post',
            dataType:'JSON',
            data:{id,nameImageProduct},
            url:'/admin/products/change-image-product/'+id,
            success: function(result){
                $("#show_image_product_img"+id).attr("src",result.image);
                $("#show_image_product_a"+id).attr("href",result.image);
            }
        })
    }
}

//tim product theo ten 
$(document).on('keyup', '#search_product_byName', function() {
    $('#gender').val('0')
    var keyword_price = $('#search_product_byPrice').val();
    if (keyword_price == '') {
        var keyword_name = $('#search_product_byName').val();
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            data: {
                keyword_name
            },
            url: '/admin/products/search_product_byName',
            success: function(result) {
                $('#bodyListProduct').html(result.html);
            }
        })
    } else {
        var keyword_name = $('#search_product_byName').val();
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            data: {
                keyword_name,
                keyword_price
            },
            url: '/admin/products/search_product_byNameAndPrice',
            success: function(result) {
                $('#bodyListProduct').html(result.html);
            }
        })
    }
});

// tim theo gia Product
$(document).on('keyup', '#search_product_byPrice', function() {
    $('#gender').val('0')
    var keyword_name = $('#search_product_byName').val();
    if (keyword_name == '') {
        var keyword_price = $('#search_product_byPrice').val();
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            data: {
                keyword_price
            },
            url: '/admin/products/search_product_byPrice',
            success: function(result) {
                $('#bodyListProduct').html(result.html);
            }
        })
    } else {
        var keyword_price = $('#search_product_byPrice').val();
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            data: {
                keyword_name,
                keyword_price
            },
            url: '/admin/products/search_product_byNameAndPrice',
            success: function(result) {
                $('#bodyListProduct').html(result.html);
            }
        })
    }
});
function refresh() {
    $('#search_product_byName').val('')
    $('#search_product_byPrice').val('')
    $('#gender').val('0')
    $.ajax({
        type: 'post',
        dataType: 'JSON',
        url: '/admin/products/refresh_listProduct',
        success: function(result) {
            $('#bodyListProduct').html(result.html);
            $('#paginate_list_product').css('display','block');
        }
    })
}
function filter(keyword){
    // console.log(keyword)
    $('#search_product_byName').val('')
    $('#search_product_byPrice').val('')
    $.ajax({
        type: 'post',
        dataType: 'JSON',
        url: '/admin/products/filter',
        data:{
            keyword
        },
        success: function(result) {
            $('#bodyListProduct').html(result.html);
            $('#paginate_list_product').css('display','none');
        }
    })
}
function categoryChanged(id){
// console.log(id.value)
id = id.value
$.ajax({
    type: 'get',
    dataType: 'JSON',
    url: '/admin/posts/filter_category_children',
    data:{
        id
    },
    success: function(result) {
        // $('#div_category_children_post').css('display','block')
 
        // console.log(result.countCategoryChildren)
        html=''
               for(i=0;i<result.countCategoryChildren;i++){
                html+='<option value="'+result.category_children_post[i].name_slug+'">'+result.category_children_post[i].category_post_children_name+'</option>';
                // console.log(result.category_children_post[i].category_post_children_name)
               }
              $('#category_children_post').html(html)
    //    console.log(result.category_children_post[0].category_post_children_name)
    // html=''
    // result.category_children_post.forEach(item => {
    //         console.log(item.name_slug)
    //     });
    }
})
}


function filterPost(){
   
    var keyword = $('#category_children_post').val();
    $.ajax({
        type: 'get',
        dataType: 'JSON',
        url: '/admin/posts/filterPost',
        data:{
            keyword
        },
        success: function(result) {
          var html=''
                   for(i=0;i<result.countPost;i++){
                    var status = ''
                    if(result.Post[i].status == 1){
                        status = 'Publish<label id="' + result.Post[i].id + '"   src="' + result.Post[i].status + '"  style="color: green;"></label>'
                    }else{
                        status = 'Unpublish<label id="' + result.Post[i].id  + '"   src="' + result.Post[i].status + '"  style="color: red;"></label>'
                    }
                    html +='<tr id="idPost_'+result.Post[i].id+'" ><td>'+result.Post[i].id+'</td><td>'+result.Post[i].title+'</td>'
                    html +='<td><a href="'+result.Post[i].image_zoom_post+'" target="_blank">'
                    html+='<img src="'+result.Post[i].image_zoom_post+'" alt="" width="100px"></a></td>'
                    html +='<td><a href="'+result.Post[i].image_thumb_post+'" target="_blank">'
                    html +='<img src="'+result.Post[i].image_thumb_post+'" alt="" width="100px"></a></td>'
                    html +='<td>'+result.Post[i].parent_post_children_slug+'</td><td id="statusPost_'+result.Post[i].id+'">'+status+'<a onclick="updateStatus(' + result.Post[i].id  +  ','  + result.Post[i].status + ');">'
                    html +='<i class="fas fa-retweet" style="color:blue; cursor: pointer;  align-items: center;" alt="' + result.Post[i].id  + '" ></i></a></td>'
                    html +='<td>'+new Date(result.Post[i].created_at).toLocaleString('vi-VN', {timeZone: "UTC"})+'</td><td>'
                   
                    html +='<a style="cursor: pointer;color: red;" onclick="deletePost('+result.Post[i].id+')">Xóa </a>'
                    html +='<a href="viewPost/'+result.Post[i].id+'" style="cursor: pointer; color: blue;"> Xem</a></td></tr>'
                }
                  $('#bodyListPost').html(html)
        }
    })
}

function updateStatus(id,status){
    if(status == 1){
        statusPost = 'Unpublish' 
        idStatus = 2
    }else{
        statusPost = 'Publish' 
        idStatus = 1
    }
 $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: '/admin/posts/updateStatus',
        data:{
            id,status
        },
        success: function(result) {
         if(result.code == 200){
            statusPost +='<a onclick="updateStatus('+id+','+idStatus+');">'
            statusPost +='<i class="fas fa-retweet" style="color:blue; cursor: pointer;  align-items: center;" alt="'+id+'"></i></a>'
            $('#statusPost_'+id).html(statusPost)
            $('#statusPostView_'+id).html(statusPost)
             alert(result.message)
         }
                  
        }
    })
}

function deletePost(id){
    check = confirm('Xác nhận xóa bài viết')
    if(check){
        $.ajax({
            type: 'DELETE',
            dataType: 'JSON',
            url: '/admin/posts/deletePost',
            data:{
                id
            },
            success: function(result) {
             if(result.code == 200){
                 $('#idPost_'+result.id).remove()
                 alert(result.message)
             }
                      
            }
        })
    }
    
}