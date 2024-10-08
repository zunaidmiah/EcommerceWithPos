

<script type="text/javascript">

    $(document).on("change", ".check-all", function() {
        if (this.checked) {
            // Iterate each checkbox
            $('.check-one:checkbox').each(function() {
                this.checked = true;
            });
            var selectedData = [];
            var value = $(this).val();
            
            $('.check-one:checked').each(function() {
              
                selectedData.push('<input type="checkbox" hidden="hidden" name="selected_items[]" value="' + $(this).val() + '" checked>'); // Adjust this according to your table structure
            });

            selectedData.forEach(function(value) {
                
           
                $('#order_btn_from').append(value);
                $('#print').append(value);
                $('#delete_all').append(value);
                $('#pathao').append(value);
                $('#stadefast').append(value);
                $('#redx').append(value);

            });


        } else {
            $('.check-one:checkbox').each(function() {
                this.checked = false;
               
                $('#order_btn_from input[type="checkbox"]').remove();
                $('#print input[type="checkbox"]').remove();
                $('#delete_all input[type="checkbox"]').remove();
                $('#pathao input[type="checkbox"]').remove();
                $('#stadefast input[type="checkbox"]').remove();
                $('#redx input[type="checkbox"]').remove();

            });
        }

    });


    // test


            // Change action URL when a button is clicked
            $('#print2_btn').click(function() {
                alert('hello');
                $('#print2').attr('action', '{{ route('orders.print-all') }}');
            });

            $('#changeUrlBtn2').click(function() {
                $('#orderForm').attr('action', '');
            });

            // You can add more buttons to change the action to different URLs








//  add courier export and  print ///
$(document).ready(function() {
        // Function to append selected checkbox to the destination form
        function appendToDestination(value) {
         
            $('#order_btn_from').append('<input type="checkbox" hidden="hidden" name="selected_items[]" value="' + value + '" checked>');
            // $('#print').append('<input type="checkbox" hidden="hidden" name="selected_items[]" value="' + value + '" checked>');
            // $('#delete_all').append('<input type="checkbox" hidden="hidden" name="selected_items[]" value="' + value + '" checked>');
            // //courear export
            // $('#pathao').append('<input type="checkbox" hidden="hidden" name="selected_items[]" value="' + value + '" checked>');
            // $('#stadefast').append('<input type="checkbox" hidden="hidden" name="selected_items[]" value="' + value + '" checked>');
            // $('#redx').append('<input type="checkbox" hidden="hidden" name="selected_items[]" value="' + value + '" checked>');
            // // $('#destination-form5').append('<input type="checkbox" hidden="hidden" name="selected_items[]" value="' + value + '" checked>');
        }

        // Function to remove unchecked checkbox from the destination form
        function removeFromDestination(value) {
           
            $('#order_btn_from input[value="' + value + '"]').remove();

            // $('#print input[value="' + value + '"]').remove();
            // $('#delete_all input[value="' + value + '"]').remove();
            // //courer export
            // $('#pathao input[value="' + value + '"]').remove();
            // $('#stadefast input[value="' + value + '"]').remove();
            // $('#redx input[value="' + value + '"]').remove();
            // $('#destination-form5 input[value="' + value + '"]').remove();
        }

        // Handle checkbox click event
     
        $(document).on("change", ".check-one", function() {
        var value = $(this).val();
            if ($(this).prop("checked")) {
                appendToDestination(value); // Append to destination form
            } else {
                removeFromDestination(value); // Remove from destination form
            }
    });
       
    });

    // count single checkbox
    document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll('.source-checkbox');
        const totalSpan = document.getElementById('total');
        let total = 0;
        
        // Function to update the total
        function updateTotal() {
            totalSpan.textContent = total;
        }
        
        // Function to handle checkbox change event
        function handleCheckboxChange() {
            total = 0;
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    total ++;
                }
            });
            updateTotal();
        }
        
        // Add event listener for checkbox change
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', handleCheckboxChange);
        });
    });
    // count single checkbox




    

    // count multiple checkbox
    document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll('.source-checkbox');
        const checkAllCheckbox = document.querySelector('.check-all');
        const totalCheckedSpan = document.getElementById('total');
        
        // Function to update the total checked count
        function updateTotalChecked() {
            const checkedCount = document.querySelectorAll('.source-checkbox:checked').length;
            totalCheckedSpan.textContent = checkedCount;
        }

        // Add event listener for check-all checkbox
        checkAllCheckbox.addEventListener('change', function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = checkAllCheckbox.checked;
            });
            updateTotalChecked();
        });

        // Add event listeners for individual checkboxes
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                updateTotalChecked();
            });
        });
    });
    // 







//     $(document).on("change", ".checkbox", function() {

// // $('.checkbox').change(function() {
// if ($(this).is(':checked')) {
//     // Get the row data associated with the selected checkbox
//     var rowData = $(this).closest('tr').html();
//     // console.log( rowData );
//     // Append the row data to the second form

//     $('#destination-form').append('<input type="checkbox" name="selected_items[]" value="' + value + '" checked>');
//     // $('#selectedRowsForm').append('<div>' + rowData + '</div>');
// } else {
//     // If the checkbox is unchecked, remove the corresponding row from the second form
//     var rowId = $(this).val();
//     console.log(rowId);
//     $('#selectedRowsForm').find('input[value="' + rowId + '"]').closest('div').remove();
// }
// // });
// });


// button submit
$('#print_btn').on('click', function() {
    if ($('#order_btn_from input[type="checkbox"]').length === 0) {
        AIZ.plugins.notify('danger', "Please select the item");
        }
        else {
            $('#order_btn_from').attr('action', '{{ route('orders.print-invoice_all') }}');
            $('#order_btn_from').submit();
        }
});
$('#print_all_btn').on('click', function() {
    if ($('#order_btn_from input[type="checkbox"]').length === 0) {
        AIZ.plugins.notify('danger', "Please select the item");
        }
        else {
            $('#order_btn_from').attr('action', '{{ route('orders.print-all') }}');
            $('#order_btn_from').submit();
        }
});
$('#print_label_btn').on('click', function() {
    if ($('#order_btn_from input[type="checkbox"]').length === 0) {
        AIZ.plugins.notify('danger', "Please select the item");
        }
        else {
            $('#order_btn_from').attr('action', '{{ route('orders.label-all') }}');
            $('#order_btn_from').submit();
        }
});
$('#bulk_delete').on('click', function() {
    if (!confirm("Do you want to delete")){
      return false;
    }
    if ($('#order_btn_from input[type="checkbox"]').length === 0) {
        AIZ.plugins.notify('danger', "Please select the item");
        }
        else {
            $('#order_btn_from').attr('action', '{{ route('orders.destroy-all') }}');
            $('#order_btn_from').submit();
        }
});




// $('.order_delete_btn').on('click', function() {
//     if ($('#order_btn_from input[type="checkbox"]').length === 0) {
//         AIZ.plugins.notify('danger', "Please select the item");
//         }
//         else {
//             $('#order_btn_from').attr('action', '{{ route('orders.destroy-all') }}');
//             $('#order_btn_from').submit();
//         }
// });

$('#pathao_btn').on('click', function() {
    if ($('#order_btn_from input[type="checkbox"]').length === 0) {
        $('#exampleModal').modal('hide');
        AIZ.plugins.notify('danger', "Please select the item");
          // Hide the modal
       
        }
      
});


$('#stadefast_btn').on('click', function() {
    if ($('#order_btn_from input[type="checkbox"]').length === 0) {
        AIZ.plugins.notify('danger', "Please select the item");
        }
        else {
            $('#order_btn_from').attr('action', '{{ route('courier.steadfast') }}');
            $('#order_btn_from').submit();
        }
});
$('#redx_btn').on('click', function() {
    if ($('#order_btn_from input[type="checkbox"]').length === 0) {
        AIZ.plugins.notify('danger', "Please select the item");
        }
        else {
            $('#order_btn_from').attr('action', '{{ route('courier.steadfast') }}');
            $('#order_btn_from').submit();
        }
});

$("#pathao_submit").click(function() {
    
    let zone = $('#pathao_zone').val(); 
    let city = $('#pathao_city').val(); 
    let area = $('#pathao_area').val(); 
 if(!zone || !city || !area){
     AIZ.plugins.notify('danger', "Please select the item");
 }
 else{
    $('#order_btn_from').attr('action', '{{ route('courier.pathao_all') }}');
     $('#order_btn_from     ').submit();
 }
 
 
 });



 $('#status_btn').on('click', function() {
    if ($('#order_btn_from input[type="checkbox"]').length === 0) {
        $('#exampleModal').modal('hide');
        AIZ.plugins.notify('danger', "Please select the item");
          // Hide the modal
       
        }
      
});
 $(".delivery_status").change(function() {
    let status = $(this).val(); 
    $('#order_btn_from .change_status').remove();
    $('#order_btn_from').append('<input type="hidden" class="change_status"  name ="change_status" id="change_status" value="' + status + '">');
 });



 $("#status_submit").click(function() {
    let status = $('#change_status').val(); 
 if(!status){
     AIZ.plugins.notify('danger', "Please select the item");
 }
 else{
    $('#order_btn_from').attr('action', '{{ route('orders.change-status') }}');
     $('#order_btn_from').submit();
 }
 
 
 });






//pathao courire
$(document).ready(function() {
    let selectedOption = "pathao";
    $.ajax({
        url: '/admin/courier/pathao_city', // Replace with your Laravel route endpoint
        method: 'GET',
        data: {
            option: selectedOption
        },
        success: function(response) {
            let areas = response.data.data;
            $('.pathao_city').append('<option id="selectArea" value="">' + 'Select Area' + '</option>');
            $.each(areas, function(index, item) {
                $('.pathao_city').append('<option id="selectArea" value="' + item.city_id + '">' + item.city_name + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });




    $('.pathao_city').change(function() {
            let zoneId = $(this).val();
            $('#order_btn_from .pathao_city').remove();
            $('#order_btn_from').append('<input type="hidden" class="pathao_city"  name ="patao_city" id="pathao_city" value="' + zoneId + '">');

        
        $.get('{{ route('pathao.get_zone') }}', {   //  ajex send a zone id to pathao
                _token: '{{ @csrf_token() }}',
                zone_id: zoneId,
            },
            function(response) {    // callback function
               
                let areas = response.data.data;
                console.log( response );
                    $('.pathao_zone').empty();
                    $('.pathao_zone').append('<option id="selectArea" value="">' + 'Select Area' + '</option>');
                    $.each(areas, function(index, item) {
                        $('.pathao_zone').append('<option id="selectArea" value="' + item.zone_id + '">' + item.zone_name + '</option>');
                    });
            }
            );
   
        });


        $('.pathao_zone').change(function() {
            var selectedOption = $(this).val();
            $('#order_btn_from .pathao_zone').remove();
            $('#order_btn_from').append('<input type="hidden" class="pathao_zone" name="pathao_zone" id="pathao_zone" value="' + selectedOption + '">');
        $.get('{{ route('pathao.get_area') }}', {   //  ajex send a zone id to pathao
                _token: '{{ @csrf_token() }}',
                zone_id: selectedOption,
            },
            function(response) {    // callback function
                let areas = response.data.data;
                    $('.pathao_area').append('<option id="selectArea" value="">' + 'Select Area' + '</option>');
                    $.each(areas, function(index, item) {
                        //console.log(response);
                        $('.pathao_area').append('<option id="selectArea" value="' + item.area_id + '">' + item.area_name + '</option>');
                    });
            }
            );
   
        });

        $('.pathao_area').change(function() {
          
      let pathao_area = $(this).val();
      $('#order_btn_from .pathao_area').remove();
      $('#order_btn_from').append('<input type="hidden" class="pathao_area"  name ="pathao_area" id="pathao_area" value="' + pathao_area + '">');
    //   $('#pathao_area').val( pathao_area );
});
   
});




//pathao courire





function bulk_delete() {
        var data = new FormData($('#sort_orders')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('bulk-order-delete') }}",
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 1) {
                    location.reload();
                }
            }
        });
    }
    
    function order_bulk_export (){

        if ($('#order_btn_from input[type="checkbox"]').length === 0) {
        AIZ.plugins.notify('danger', "Please select the item");
        }
        else {
            $('#order_btn_from').attr('action', '{{ route('order-bulk-export') }}');
            $('#order_btn_from').submit();
        }


        // var url = '{{route('order-bulk-export')}}';
        // $("#sort_orders").attr("action", url);
        // $('#sort_orders').submit();
        // $("#sort_orders").attr("action", '');
    }
</script>
