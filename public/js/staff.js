$(document).ready(function() {
    const csrfToken = $('meta[name="csrf-token"]').attr('content');;
    const $table = $('table');

    function show(response) {
        // console.log(response);
        if (response.success) {
            toastr["success"](response.msg);
            $('#insert').modal('hide');

            if (response.role) {
                console.log(response.role.status);
                $('#addRole').trigger('reset');
                let status = (response.role.status == 1) ? 'checked' : '';
                let html = '';
                html += '<label class="switch">';
                html += '<input class="switch-input" type="checkbox"' + status + ' />';
                html += '<span class="switch-label" data-on="active" data-off="inactive"></span>';
                html += '<span class="switch-handle"></span>';
                html += '</label>';
                let deletebtn = '<button type="button" class="btn btn-danger btn-sm delete" title="Delete" data-href="/staff/roles/'+response.role.id+'" data-id="'+response.role.id+'">';
                deletebtn += '<i class="glyphicon glyphicon-trash"></i>';
                deletebtn += '</button>';
                let created_at = new Intl.DateTimeFormat('en', {month: 'long', day: 'numeric',year: 'numeric', hour: '2-digit', minute: '2-digit'}).format(new Date(response.role.created_at));
                response.role.created_at = created_at;
                let updated_at = new Intl.DateTimeFormat('en', {month: 'long', day: 'numeric',year: 'numeric', hour: '2-digit', minute: '2-digit'}).format(new Date(response.role.updated_at));
                response.role.updated_at = updated_at;
                response.role.status = html;
                response.role.state = null;
                response.role.operate = deletebtn;
                response.role._id_data = {
                    href: '/staff/roles/'+response.role.id,
                    id: response.role.id
                }
                $table.bootstrapTable('insertRow', {
                    index: 0,
                    row: response.role
                });
            }

        } else {
            $.each(response.errors, function(key, value) {
                toastr["error"](value);
            });

        }

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }

    $(document).on('click','.delete',function() {
        let success = confirm("Are you sure you want to delete it?");

        if(success){
            let url = $(this).attr('data-href');
            let id = $(this).attr('data-id');
            let data = {
                url: url,
                method: 'delete',
                csrfToken: csrfToken
            };

            requestProcess(data, show);
            var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
                return row.id
              })
              console.log(ids);
            $table.bootstrapTable('remove', {
                field: 'id',
                values: ids
            })
            
        }else {
            alert('Your canceled delete process');
        }

    });

    $table.on('editable-save.bs.table', function(e, field, row, oldValue, $el) {
        let data = {
            url: row._id_data.href,
            method: 'put',
            csrfToken: csrfToken,
        };
        data[field] = row[field];
        requestProcess(data, show);
    });

    $('#addRole,#addRolePermission').on('submit', function(event) {
        event.preventDefault();
        const form = $(this);
        const url = form.attr('action');
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        console.log(form.serializeArray());
        $.post(url,  form.serializeArray())
        .done(response => { show(response) })
        .fail((function(e) 
        { 
            const error = e.responseJSON;
            show(error);
        }));
     });

    $(document).on('change','.switch-input',function(e){
        var url = $(this).attr('data-href');

        let data = {
            url: url,
            method: 'put',
            status: $(this).is(':checked'),
            csrfToken: csrfToken
        };
        requestProcess(data, show);
    });
});