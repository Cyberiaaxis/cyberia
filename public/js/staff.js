$(document).ready(function() {
    const csrfToken = $('meta[name="csrf-token"]').attr('content');;
    const $table = $('table');

    function message (text, status = 'error'){
       toastr.options = { 
            "closeButton": true, "debug": false,  "newestOnTop": true, "progressBar": true,
            "positionClass": "toast-top-right", "preventDuplicates": true,  "onclick": null,  "showDuration": "300",
            "hideDuration": "1000",  "timeOut": "5000",  "extendedTimeOut": "1000",  "showEasing": "swing",
            "hideEasing": "linear",  "showMethod": "fadeIn",  "hideMethod": "fadeOut"
            }
    return toastr[status](text);
    }

    function showMessage(response, hide = false) {
        console.log(response);
        if (response.errors) 
        {
            $.each(response.errors, function(key, value) {
                 $('input[name="'+key+'"]').parent().addClass('has-error');
            message(value);
            });
    
        return false;    
        }

        $('table').bootstrapTable('refresh');
        $(hide).modal('hide');
        $('#addModel').trigger('reset');
    return message(response.msg, "success");
    }

    $(document).on('click','.delete',function() {
        let success = confirm("Are you sure you want to delete it?");

        if(success){
            let url = $(this).attr('data-href');
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');
            let data = {
                url: url,
                method: 'delete',
                csrfToken: csrfToken
            };
            if (name) {
                data['name'] = name;
             }
            requestProcess(data, showMessage);
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

    $(document).on('click','.edit',function(){
        var url = $(this).attr('data-href');
        $('#update').load(url);
    });
    
    $table.on('editable-save.bs.table', function(e, field, row, oldValue, $el) {
        let data = {
            url: row._id_data.href,
            method: 'put',
            csrfToken: csrfToken,
        };
        data[field] = row[field];
        console.log(data);
        requestProcess(data, showMessage);
    });

     $(document).on('submit','#addModel,#updateModel',function(event) {
        event.preventDefault();
        const form = $(this);
        const url = form.attr('action');
        const modalId = '#'+form.parent().parent().parent().attr('id');
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        // console.log(form.serializeArray());
        $.post(url,  form.serializeArray())
        .done(response => { 
           showMessage(response, modalId) 
        })
        .fail((function(e) 
        { 
            const error = e.responseJSON;
            showMessage(error);
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
        requestProcess(data, showMessage);
    });


   
});

function selectfetch(selector, url, addrecord = false){ 

    if(!selector) return 'Selector is required';

    if(!url) return 'URL is required';

       $.getJSON(url,function(data) {
        var items = $.map(data, function (item) {
            return {
                text: item.name,
                id: item.name
            }
        });
        $(selector).select2({
            width: '100%',
            tags:  addrecord,
            data: items
        });
    });
}

