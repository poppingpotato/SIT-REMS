<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#btnAdd').click(function(){
            $('#addUpdateModal').modal('show');
            $('#headerAddUpdateModal').html("Add Equipment");
            $('#btnSave').val('Create');
            $('#addUpdateForm').trigger("reset");
        });

        $('#btnSave').click(function(){
            buttonType = ($(this).val());
            $('form').find('.help-block').remove();
            $('form').find('.form-group').removeClass('has-error');

            $.ajax({
                data: $('#addUpdateForm').serialize(),
                url: "{{ route('equipments.store')}}",
                type: "POST",

                success: function(data){
                    $('#addUpdateModal').modal('hide');
                    /* console.log(data.id + data.lastName); */
                    newData =  '<tr id="record_id_'+ data.id +'">'; 
                    newData += '<td>'+ data.equipment_id + '</td>'
                    newData += '<td>'+ data.equipmentName + '</td>'
                    newData += '<td>'+ data.quantity + '</td>'
                    newData += '<td>'
                    newData += '<button type="button" id="btnEdit" class="btn btn-primary" btn-lg btn-block" data-id="' + data.id + '"><i class="far fa-edit"></i></button>'
                    newData += '<button type="button" id="btnDelete" class="btn btn-danger" btn-lg btn-block" data-id="'+ data.id +'"><i class="far fa-trash-alt"></i></button>'
                    newData += '</td>'
                    newData += '</tr>'

                    if(buttonType == "Create"){
                        $('#addUpdateModal').modal('hide');
                        $('tbody').prepend(newData); //prepends the data after creating without refresh
                        swal("Success", "Equipment was Created Successfully!", "success");
                        
                    }
                    else if (buttonType == "Update"){
                        $('#record_id_' + data.id).replaceWith(newData); //updating the data without refresh
                        swal("Success", "Equipment was Updated Successfully!", "success");
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
            $('#headerAddUpdateModal').html("Update Equipment Details");
            $('#btnSave').val('Update');
            $('#addUpdateForm').trigger("reset");

            data_id = $(this).attr('data-id');

            $.get("{{ route('equipments.index') }}" + '/' + data_id + '/edit', function(data){ //gets the fields of data using the id 
                /* console.log(data.lastName + " " + data.firstName) */
                $('#id').val(data.id);
                $('#equipment_id').val(data.equipment_id);
                $('#equipmentName').val(data.equipmentName);
                $('#quantity').val(data.quantity);
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
                        url: "{{ route('equipments.index')}}" + '/' + data_id,
                            
                        success: function(){
                            swal("Success", "Goodbye Equipment", "success");
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