<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#btnAdd').click(function(){
            $('#addUpdateModal').modal('show');
            $('#headerAddUpdateModal').html("Add Rooms");
            $('#btnSave').val('Create');
            $('#addUpdateForm').trigger("reset");
        });

        $('#btnSave').click(function(){
            buttonType = ($(this).val());
            $('form').find('.help-block').remove();
            $('form').find('.form-group').removeClass('has-error');

            $.ajax({
                data: $('#addUpdateForm').serialize(),
                url: "{{ route('users.store')}}",
                type: "POST",

                success: function(data){
                    $('#addUpdateModal').modal('hide');
                    /* console.log(data.id + data.lastName); */
                    newData =  '<tr id="record_id_'+ data.id +'">'; 
                    newData += '<td>'+ data.idNumber + '</td>'
                    newData += '<td>'+ data.lastName + '</td>'
                    newData += '<td>'+ data.firstName + '</td>'
                    newData += '<td>'+ data.email + '</td>'
                    newData += '<td>'+ data.is_admin + '</td>'
                    newData += '<td>'
                    newData += '<button type="button" id="btnEdit" class="btn btn-primary" btn-lg btn-block" data-id="' + data.id + '"><i class="far fa-edit"></i></button>'
                    newData += '<button type="button" id="btnDelete" class="btn btn-danger" btn-lg btn-block" data-id="'+ data.id +'"><i class="far fa-trash-alt"></i></button>'
                    newData += '</td>'
                    newData += '</tr>'

                    if(buttonType == "Create"){
                        $('#addUpdateModal').modal('hide');
                        $('tbody').prepend(newData); //prepends the data after creating without refresh
                        swal("Success", "User was Created Successfully!", "success");
                        
                    }
                    else if (buttonType == "Update"){
                        $('#record_id_' + data.id).replaceWith(newData); //updating the data without refresh
                        swal("Success", "User was Updated Successfully!", "success");
                    }
                },

                error: function(data){
                    console.log('Error', data);
                    
                    /* validation */
                    var errors = data.responseJSON;
                    if ($.isEmptyObject(errors) == false) {
                        $.each(errors.errors, function (key, value) {
                            $('#' + key)
                                .closest('.form-group')
                                .addClass('has-error')
                                .append('<span class="help-block"><strong>' + value + '</strong></span>');
                        });
                    }
                },
            });
        });
        
        $('body').on('click', '#btnEdit', function(){
            $('#addUpdateModal').modal('show');
            $('#headerAddUpdateModal').html("Update User Details");
            $('#btnSave').val('Update');
            $('#addUpdateForm').trigger("reset");

            data_id = $(this).attr('data-id');

            $.get("{{ route('users.index') }}" + '/' + data_id + '/edit', function(data){ //gets the fields of data using the id 
                console.log(data.lastName + " " + data.firstName) 
                $('#id').val(data.id);
                $('#idNumber').val(data.idNumber);
                $('#lastName').val(data.lastName);
                $('#firstName').val(data.firstName);
                $('#email').val(data.email);
                $('#is_admin').val(data.is_admin);
            });
        });

        $('body').on('click', '#btnDelete', function(){
            swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        data_id = $(this).attr('data-id');
                        $.ajax({
                        type: "DELETE", 
                        url: "{{ route('users.index')}}" + '/' + data_id,
                            
                        success: function(){
                            swal("Success", "Goodbye User Data", "success");
                            $('#record_id_' + data_id).remove();
                        },
                        error: function(data){
                            console.log('Error', data);
                        }
                    });
                } 
            });
                
        });
    });

    
    
</script>
