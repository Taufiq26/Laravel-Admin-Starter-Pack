<script>
    var no=1;
    $( document ).ready(function() {
        var view_access = "{{ $access['view'] }}";
        var create_access = "{{ $access['create'] }}";
        var update_access = "{{ $access['update'] }}";
        var delete_access = "{{ $access['delete'] }}";

        $('#dataTableMenus').DataTable({
			"bLengthChange":true,
			"pageLength":10,
			"ajax" : "{{ url('api/menu-access') }}",
			"columns": 
			[
			{ 
				targets:[0], 
				render: function(data, type, full, meta){
					return no++;
				}
			},
			{ targets:[1],data: "menu.name" },
			{ targets:[2],data: "view" },
            { targets:[3],data: "create" },
            { targets:[4],data: "update" },
            { targets:[5],data: "delete" },
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
				url = "{{ url('api/menu-access/create') }}";
			}else{
                url = "{{ url('api/menu-access/update') }}/"+_selectedID;
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
                autoReload('#dataTableMenus', '{{ url("api/menu-access") }}')
				
				document.getElementById("form").reset();
			});
		});

		$('#dataTableMenus tbody').on('click','button[name="btn_edit"]',function(event){
			event.preventDefault()
			_selectRowObj=$(this);
			_selectedID=_selectRowObj[0].value;

			$.ajax({
				url: "{{ url('api/menu-access') }}/"+_selectedID,
				type: 'GET',
				dataType: 'json',
			})
			.done(function(res) {
				$('#postType').val('update')
				$('#form-menus').modal('show')

				_selectedID = res.data.id;
                
                document.getElementById('id').value = res.data.id;
                document.getElementById('parent_id').value = res.data.parent_id ?? "";
                document.getElementById('name').value = res.data.name;
                document.getElementById('prefix').value = res.data.prefix;
                document.getElementById('url').value = res.data.url;
                document.getElementById('icon').value = res.data.icon;
                document.getElementById('order_num').value = res.data.order_num;
                document.getElementById('status').value = res.data.status;
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
                        url: "{{ url('api/menu-access/delete') }}/"+_selectedID,
                        type: 'DELETE',
                        dataType: 'json',
                    })
                    .done(function(res) {
                        notificationSuccess(res.message);
                        
                        autoReload('#dataTableMenus', '{{ url("api/menu-access") }}')
                    });
                } else {
                    notificationSuccess('Deleted Menu Failed, Data is Save')
                }
            })
		});

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