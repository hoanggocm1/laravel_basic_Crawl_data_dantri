<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/admin/dist/js/adminlte.min.js"></script>
<script src="/template/admin/js/main.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // function removeAccount(id) {

    //     if (confirm('Xóa tài khoản, không thể khôi phục?')) {
    //         $.ajax({
    //             type: 'DELETE',
    //             datatype: 'JSON',
    //             data: {
    //                 id
    //             },
    //             url: '/admin/accounts/deleteAccount',
    //             success: function(result) {
    //                 if (result.code == 200) {
    //                     $('#account_' + id).remove();
    //                     alert(result.message);
    //                 } else {
    //                     alert(result.message);
    //                 }
    //             }
    //         })

    //     }
    // // }
    // $(document).on('keyup', '#search_product_byName', function() {
    //     $('#gender').val('0')
    //     var keyword_phone = $('#search_product_byPhone').val();
    //     if (keyword_phone == '') {
    //         var keyword_name = $('#search_product_byName').val();
    //         $.ajax({
    //             type: 'post',
    //             dataType: 'JSON',
    //             data: {
    //                 keyword_name
    //             },
    //             url: '/admin/products/search_product_byName',
    //             success: function(result) {
    //                 $('#listAccount').html(result.html);
    //             }
    //         })
    //     } else {
    //         var keyword_name = $('#search_product_byName').val();
    //         $.ajax({
    //             type: 'post',
    //             dataType: 'JSON',
    //             data: {
    //                 keyword_name,
    //                 keyword_phone
    //             },
    //             url: '/admin/accounts/search_account_byNameAndPhone',
    //             success: function(result) {
    //                 $('#listAccount').html(result.html);
    //             }
    //         })
    //     }
    // });

    // $(document).on('keyup', '#search_product_byPhone', function() {
    //     $('#gender').val('0')
    //     var keyword_name = $('#search_product_byName').val();
    //     if (keyword_name == '') {
    //         var keyword_phone = $('#search_product_byPhone').val();
    //         $.ajax({
    //             type: 'post',
    //             dataType: 'JSON',
    //             data: {
    //                 keyword_phone
    //             },
    //             url: '/admin/accounts/search_account_byPhone',
    //             success: function(result) {
    //                 $('#listAccount').html(result.html);
    //             }
    //         })
    //     } else {
    //         var keyword_phone = $('#search_product_byPhone').val();
    //         $.ajax({
    //             type: 'post',
    //             dataType: 'JSON',
    //             data: {
    //                 keyword_name,
    //                 keyword_phone
    //             },
    //             url: '/admin/accounts/search_account_byNameAndPhone',
    //             success: function(result) {
    //                 $('#listAccount').html(result.html);
    //             }
    //         })
    //     }
    // });

    // function genderChanged(id) {
    //     if (id.value == 0) {
    //         var key_min = 0
    //         var key_max = 0
    //         $.ajax({
    //             type: 'post',
    //             dataType: 'JSON',
    //             data: {
    //                 key_min,
    //                 key_max
    //             },
    //             url: '/admin/accounts/filter_account_byAge',
    //             success: function(result) {
    //                 $('#listAccount').html(result.html);
    //             }
    //         })
    //     } else {
    //         var key_min = id.value.slice(0, 2)
    //         var key_max = id.value.slice(3, 5)

    //         $.ajax({
    //             type: 'post',
    //             dataType: 'JSON',
    //             data: {
    //                 key_min,
    //                 key_max
    //             },
    //             url: '/admin/accounts/filter_account_byAge',
    //             success: function(result) {
    //                 $('#listAccount').html(result.html);
    //             }
    //         })
    //     }

    // }

    // function refresh() {
    //     $('#search_product_byName').val('')
    //     $('#search_product_byPhone').val('')
    //     $('#gender').val('0')
    //     $.ajax({
    //         type: 'post',
    //         dataType: 'JSON',
    //         url: '/admin/accounts/refresh_listAccount',
    //         success: function(result) {
    //             $('#listAccount').html(result.html);
    //         }
    //     })
    // }
</script>