<script>
    var no=1;
    var _selectedID = $('#role_id').val();

    var notif = $('#notif').val();
    if(notif != null && notif != ''){
        notificationSuccess(notif);
    }
    
    $.ajax({
        url: "{{ url('api/access/menus') }}/"+_selectedID,
        type: 'GET',
        dataType: 'json',
    })
    .done(function(res) {
        var html = '';
        var view, create, update, destroy;
        $.each(res.data, function(key, val) {

            if(val.access != null) {
                view =  (val.access.view == '1') ? 'checked' : '';
                create = (val.access.create == '1') ? 'checked' : '';
                update = (val.access.update == '1') ? 'checked' : '';
                destroy = (val.access.delete == '1') ? 'checked' : '';
            }else{
                view = '';
                create = '';
                update = '';
                destroy = '';
            }

            if(val.parent_id == NULL && val.url == '#'){
                html += '<tr class="bg-warning">'+
                    '<td>'+(key+1)+'</td>'+
                    '<td>'+val.name+'</td>'+
                    '<td>'+val.url+'</td>'+
                    '<td>'+val.prefix+'</td>'+
                    '<td><input type="checkbox" class="checked_'+val.id+'" id="view_'+val.id+'" name="view_'+val.id+'" '+view+'></td>'+
                    '<td><input type="checkbox" class="checked_'+val.id+'" id="create_'+val.id+'" name="create_'+val.id+'" '+create+'></td>'+
                    '<td><input type="checkbox" class="checked_'+val.id+'" id="update_'+val.id+'" name="update_'+val.id+'" '+update+'></td>'+
                    '<td><input type="checkbox" class="checked_'+val.id+'" id="delete_'+val.id+'" name="delete_'+val.id+'" '+destroy+'></td>'+
                    '<td>'+
                        '<center>'+
                            '<a href="javascript:void(0)" title="Check All" onclick="checkAll(`'+val.id+'`)" class="btn btn-sm btn-primary"><i class="fa fa-check"></i></a>'+
                            '<a href="javascript:void(0)" title="Uncheck All" onclick="uncheckAll(`'+val.id+'`)" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>'+
                        '</center>'+
                    '</td>'+
                '</tr>';
            }else{
                html += '<tr>'+
                    '<td>'+(key+1)+'</td>'+
                    '<td>'+val.name+'</td>'+
                    '<td>'+val.url+'</td>'+
                    '<td>'+val.prefix+'</td>'+
                    '<td><input type="checkbox" class="checked_'+val.id+'" id="view_'+val.id+'" name="view_'+val.id+'" '+view+'></td>'+
                    '<td><input type="checkbox" class="checked_'+val.id+'" id="create_'+val.id+'" name="create_'+val.id+'" '+create+'></td>'+
                    '<td><input type="checkbox" class="checked_'+val.id+'" id="update_'+val.id+'" name="update_'+val.id+'" '+update+'></td>'+
                    '<td><input type="checkbox" class="checked_'+val.id+'" id="delete_'+val.id+'" name="delete_'+val.id+'" '+destroy+'></td>'+
                    '<td>'+
                        '<center>'+
                            '<a href="javascript:void(0)" title="Check All" onclick="checkAll(`'+val.id+'`)" class="btn btn-sm btn-primary"><i class="fa fa-check"></i></a>'+
                            '<a href="javascript:void(0)" title="Uncheck All" onclick="uncheckAll(`'+val.id+'`)" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>'+
                        '</center>'+
                    '</td>'+
                '</tr>';
            }
        })

        $('#tbodyRoleAccess').html($.parseHTML(html))
    });

    function checkAll(menu_id){
        $(".checked_"+menu_id).attr("checked", "true");
    }

    function uncheckAll(menu_id){
        $(".checked_"+menu_id).removeAttr("checked");
    }

    function notificationSuccess(message){
        $.notify({
            title:'Notification',
            message: message
        },
        {
            type:'primary',
            allow_dismiss:false,
            newest_on_top:false ,
            mouse_over:false,
            showProgressbar:false,
            spacing:10,
            timer:2000,
            placement:{
                from:'top',
                align:'center'
            },
            offset:{
                x:30,
                y:30
            },
            delay:1000 ,
            z_index:10000,
            animate:{
                enter:'animated bounce',
                exit:'animated bounce'
            }
        });
    }
</script>