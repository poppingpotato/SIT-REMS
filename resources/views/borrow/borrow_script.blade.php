<script>
    //bootstrap datepicker start and end
    $(document).ready(function(){
    $('#date-end').bootstrapMaterialDatePicker
    ({
        weekStart: 0, format: 'YYYY/MM/DD HH:mm', shortTime : true
    });
    $('#date-start').bootstrapMaterialDatePicker
    ({
        weekStart: 0, format: 'YYYY/MM/DD HH:mm', shortTime : true
    }).on('change', function(e, date)
    {
    $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
    });

    $('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });
    });

    /* // for showing and hiding fields
    $("#showFields").change(function() {
        if ($(this).val() == "1") {
            $('#roomField').show();
            $('#eq_r_idField').hide(); 
            $('#quantityField').hide();

        } else if($(this).val() == "2"){
            $('#eq_r_idField').show(); 
            $('#quantityField').show(); 
            $('#roomField').hide(); 

        } else if($(this).val() == "3"){
            $('#roomField').show();
            $('#eq_r_idField').show(); 
            $('#quantityField').show(); 

        } else {
            $('#roomField').hide(); 
            $('#eq_r_idField').hide(); 
            $('#quantityField').hide();
        }
        });
        
    $("#showFields").trigger("change"); */


</script>