<script>
    var no=1;
    $( document ).ready(function() {
        var view_access = "{{ $access['view'] }}";
        var create_access = "{{ $access['create'] }}";
        var update_access = "{{ $access['update'] }}";
        var delete_access = "{{ $access['delete'] }}";

        setDataTable($('#role').val());
        

        $('#btn_insert').click(function(event) {
			$('#form-menus').modal('show');
			$('#postType').val('create')
		});

        $('#btn_close').click(function(event) {
            $('#form-menus').modal('hide')
            document.getElementById("form").reset();
        })

		$('#form').submit(function(event) {

			event.preventDefault();

            var _selectedID = $('#id').val();
			var params = $('#form').serializeArray();
            var url = '';
			
			if($('#postType').val() == 'create'){
				url = "{{ url('api/menus-access/create') }}";
			}else{
                url = "{{ url('api/menus-access/update') }}/"+_selectedID;
			}

			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: params,
			})
			.done(function(res) {
                $('#form-menus').modal('hide')
				notificationSuccess(res.message)
                // autoReload('#dataTableMenus', '{{ url("api/menus-access") }}')
                $('#refresh').click()
				
				document.getElementById("form").reset();
			});
		});

		$('#dataTableMenus tbody').on('click','button[name="btn_edit"]',function(event){
			event.preventDefault()
			_selectRowObj=$(this);
			_selectedID=_selectRowObj[0].value;

			$.ajax({
				url: "{{ url('api/menus-access') }}/"+_selectedID,
				type: 'GET',
				dataType: 'json',
			})
			.done(function(res) {
				$('#postType').val('update')
				$('#form-menus').modal('show')

				_selectedID = res.data.id;
                
                document.getElementById('id').value = res.data.id;
                document.getElementById('role_id').value = res.data.role_id ?? "";
                document.getElementById('menu_id').value = res.data.menu_id ?? "";
                if (res.data.view == 1) {
                    document.getElementById('view1').checked = true;
                    document.getElementById('view2').checked = false;
                } else {
                    document.getElementById('view1').checked = false;
                    document.getElementById('view2').checked = true;
                }

                if (res.data.create == 1) {
                    document.getElementById('create1').checked = true;
                    document.getElementById('create2').checked = false;
                } else {
                    document.getElementById('create1').checked = false;
                    document.getElementById('create2').checked = true;
                }

                if (res.data.update == 1) {
                    document.getElementById('update1').checked = true;
                    document.getElementById('update2').checked = false;
                } else {
                    document.getElementById('update1').checked = false;
                    document.getElementById('update2').checked = true;
                }

                if (res.data.delete == 1) {
                    document.getElementById('delete1').checked = true;
                    document.getElementById('delete2').checked = false;
                } else {
                    document.getElementById('delete1').checked = false;
                    document.getElementById('delete2').checked = true;
                }
			});
		});

		$('#dataTableMenus tbody').on('click', 'button[name="btn_hapus"]', function(event) {
			event.preventDefault();
			_selectRowObj=$(this);
			_selectedID=_selectRowObj[0].value;
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ url('api/menus-access/delete') }}/"+_selectedID,
                        type: 'DELETE',
                        dataType: 'json',
                    })
                    .done(function(res) {
                        notificationSuccess(res.message);
                        
                        // autoReload('#dataTableMenus', '{{ url("api/menus-access") }}')
                        $('#refresh').click()
                    });
                } else {
                    notificationSuccess('Deleted Menu Failed, Data is Save')
                }
            })
		});

        $('#refresh').on('click',function(event){
			event.preventDefault()
            // destroy data table first
            $('#dataTableMenus').DataTable().destroy();
            // re-init the data table
            no = 1;
            setDataTable($('#role').val());
		});

        function setDataTable(role_id){
            $('#dataTableMenus').DataTable({
                "bLengthChange":true,
                "pageLength":10,
                "ajax" : "{{ url('api/menus-access/by-role') }}/" + role_id,
                "columns": 
                [
                { 
                    targets:[0], 
                    render: function(data, type, full, meta){
                        return no++;
                    }
                },
                { 
                    targets:[1],
                    render: function (data, type, full, meta){
                        if(full.menu.parent_id == null){
                            return full.menu.name + ' [Parent]';
                        }else{
                            return full.menu.name + ' [in '+full.menu.parent.name+']';
                        }
                    } 
                },
                { 
                    targets:[2],
                    render: function (data, type, full, meta){
                        if(full.view == 1){
                            return '<span class="badge badge-primary">Allowed</span>';
                        }else{
                            return '<span class="badge badge-danger">Denied</span>';
                        }
                    } 
                },
                { 
                    targets:[3],
                    render: function (data, type, full, meta){
                        if(full.create == 1){
                            return '<span class="badge badge-primary">Allowed</span>';
                        }else{
                            return '<span class="badge badge-danger">Denied</span>';
                        }
                    }
                },
                { 
                    targets:[4],
                    render: function (data, type, full, meta){
                        if(full.update == 1){
                            return '<span class="badge badge-primary">Allowed</span>';
                        }else{
                            return '<span class="badge badge-danger">Denied</span>';
                        }
                    }
                },
                { 
                    targets:[5],
                    render: function (data, type, full, meta){
                        if(full.delete == 1){
                            return '<span class="badge badge-primary">Allowed</span>';
                        }else{
                            return '<span class="badge badge-danger">Denied</span>';
                        }
                    }
                },
                {
                    targets:[6],
                    render: function (data, type, full, meta){
                        if(update_access == 1){
                            var btn_edit='<button class="btn btn-warning btn-sm" name="btn_edit" title="Edit" value="'+full.id+'"><i class="fa fa-pencil"></i> Edit</button>';
                        }else{
                            var btn_edit = '';
                        }

                        if(delete_access == 1){
                            var btn_hapus='<button class="btn btn-danger btn-sm" name="btn_hapus" title="Hapus" value="'+full.id+'"><i class="fa fa-trash"></i> Hapus</button>';
                        }else{
                            var btn_hapus = '';
                        }

                        return '<center>'+btn_edit+'&nbsp;'+btn_hapus+'</center>';
                    }
                }
                ]
            })
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
    })
</script>