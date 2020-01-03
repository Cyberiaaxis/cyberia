const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
$(document).ready(function() {
    const $table = $('table').bootstrapTable();

    function show(response) {
        // console.log(response);
        if (response.success) {
            toastr["success"](response.msg);

            if (response.role) {
                $('#insert').modal('hide');
                $('#addRole').trigger('reset');
                let status = (response.role.status) ? 'checked' : '';
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

    $('.addRole').on('click', function(event) {
        let data = {
            url: '/staff/roles',
            method: 'post',
            csrfToken: csrfToken,
            name: $('#roleName').val(),
            desc: $('#roleDescription').val(),
            status: $('#roleStatus').val()
        };
        requestProcess(data, show);
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

window.operateEvents = {
        'click .delete': function (e, value, row, index) {
            let url = row._id_data.href;
            let data = {
                url: url,
                method: 'delete',
                csrfToken: csrfToken
            };
          $(document).ready(function(){
              $table = $('table');
                $table.bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            })
          });

        }
    }