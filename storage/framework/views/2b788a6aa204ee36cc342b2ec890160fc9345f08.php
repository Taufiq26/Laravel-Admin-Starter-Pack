<script>
    var no=1;
    $( document ).ready(function() {
        var view_access = "<?php echo e($access['view']); ?>";
        var create_access = "<?php echo e($access['create']); ?>";
        var update_access = "<?php echo e($access['update']); ?>";
        var delete_access = "<?php echo e($access['delete']); ?>";

        $('#dataTableUsers').DataTable({
			"bLengthChange":true,
			"pageLength":10,
			"ajax" : "<?php echo e(url('api/users')); ?>",
			"columns": 
			[
			{ 
				targets:[0], 
				render: function(data, type, full, meta){
					return no++;
				}
			},
			{ targets:[1],data: "full_name" },
            { 
                targets:[2],
                render: function (data, type, full, meta){
                    return full.users.roles.name;
                }
            },
			{ targets:[3],data: "email" },
            { targets:[4],data: "phone" },
            { 
                targets:[5],
                render: function (data, type, full, meta){
                    if(full.is_verified == 1){
                        return '<span class="badge badge-primary">Verified</span>';
                    }else{
                        return '<span class="badge badge-danger">Not Verified</span>';
                    }
                }
            },
			{
				targets:[7],
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
			$('#form-users').modal('show');
			$('#postType').val('create')
		});

        $('#btn_close').click(function(event) {
            $('#form-users').modal('hide')
            document.getElementById("form").reset();
        })

		$('#form').submit(function(event) {

			event.preventDefault();

            var _selectedID = $('#id').val();
			var params = $('#form').serializeArray();
            var url = '';
			
			if($('#postType').val() == 'create'){
				url = "<?php echo e(url('api/users/create')); ?>";
			}else{
                url = "<?php echo e(url('api/users/update')); ?>/"+_selectedID;
			}

			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: params,
			})
			.done(function(res) {
                $('#form-users').modal('hide')
                if(res.status == 200){
                    notificationSuccess(res.message)
                }else{
                    notificationError(res.message)
                }
				
                autoReload('#dataTableUsers', '<?php echo e(url("api/users")); ?>')
				
				document.getElementById("form").reset();
			});
		});

		$('#dataTableUsers tbody').on('click','button[name="btn_edit"]',function(event){
			event.preventDefault()
			_selectRowObj=$(this);
			_selectedID=_selectRowObj[0].value;

			$.ajax({
				url: "<?php echo e(url('api/users')); ?>/"+_selectedID,
				type: 'GET',
				dataType: 'json',
			})
			.done(function(res) {
				$('#postType').val('update')
				$('#form-users').modal('show')

				_selectedID = res.data.id;
                
                document.getElementById('id').value = res.data.id;
                document.getElementById('role_id').value = res.data.users.roles.id;
                document.getElementById('username').value = res.data.users.username;

                document.getElementById('full_name').value = res.data.full_name;
                document.getElementById('email').value = res.data.email;
                document.getElementById('address').value = res.data.address;
                document.getElementById('phone').value = res.data.phone;
			});
		});

		$('#dataTableUsers tbody').on('click', 'button[name="btn_hapus"]', function(event) {
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
                        url: "<?php echo e(url('api/users/delete')); ?>/"+_selectedID,
                        type: 'DELETE',
                        dataType: 'json',
                    })
                    .done(function(res) {
                        notificationSuccess(res.message);
                        
                        autoReload('#dataTableUsers', '<?php echo e(url("api/users")); ?>')
                    });
                } else {
                    notificationSuccess('Deleted User Failed, Data is Save')
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

        function notificationError(message){
            $.notify({
                title:'Notification',
                message: message
            },
            {
                type:'danger',
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
</script><?php /**PATH /Applications/MAMP/htdocs/laravel-admin-starter-pack/resources/views/services/users/users.blade.php ENDPATH**/ ?>