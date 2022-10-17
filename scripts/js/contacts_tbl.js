// fetch data from MySQL
var table_contacts = $('#contacts_data').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
        url:"./scripts/fetch_contacts.php",
        type:"POST"
    },
    "columnDefs":[
        {data: 'ct_id', className: 'text-center', name: 'contact_id', targets:0, orderable: true, searchable: true},
        {data: 'fullname', className: 'font-weight-bold', name: 'fullname', targets:1},
        {data: 'email', className: 'font-monospace font-weight-normal', name: 'email', targets:2,
              render: function(data,type,full,meta) {
                  return '<a href="mailto:' + data + '">' + data + '</a>';
              }},
        {data: 'subject', className: 'font-weight-normal', name: 'subject', targets:3},
        {data: 'created', className: 'text-center', name: 'created', targets:4,
            render: function(data,type,full,meta) {
                const event = new Date(data);
                const options = { dateStyle: "long" };
                const date = event.toLocaleString("id-ID", options);
                return date;
            }},
        {data: 'ct_id', className: 'text-center', name: 'action', targets:-1,
            render: function(data,type,full,meta) {
                return "<div class='btn-group' role='group'>" +
                          "<button type='button' class='btn btn-primary btn-sm' onclick='view_contact(\"" + data + "\")' data-toggle='tooltip' data-placement='top' title='Update Data'><i class='fas fa-eye'></i>&nbsp;Detail</button>" +
                          "<button type='button' class='btn btn-warning btn-sm' onclick='delete_contact(\"" + data + "\")' data-toggle='tooltip' data-placement='top' title='Remove Data'><i class='fas fa-trash'></i>&nbsp;Delete</button>" +
                       "</div>";
            },
        }],
    "select":{
        style: 'os',
        selector: 'td:first-child'
    },
    order: [[ 1, 'asc' ]],
    dom: 'lBfrtip',
    buttons: [{
        extend: 'copyHtml5',
        className: 'btn btn-primary btn-sm',
        text: '<i class="fas fa-copy"></i> Copy',
        titleAttr: 'Copy'
    },{
        extend: 'excelHtml5',
        className: 'btn btn-primary btn-sm',
        text: '<i class="fas fa-file-excel"></i> Excel',
        titleAttr: 'Excel'
    },{
        extend: 'csvHtml5',
        className: 'btn btn-primary btn-sm',
        text: '<i class="fas fa-file-csv"></i> CSV',
        titleAttr: 'CSV'
    },{
        extend: 'pdfHtml5',
        className: 'btn btn-primary btn-sm',
        text: '<i class="fas fa-file-pdf"></i> PDF',
        titleAttr: 'PDF'
    },{
        extend: 'print',
        className: 'btn btn-primary btn-sm',
        text: '<i class="fas fa-print"></i> Print',
        titleAttr: 'Print'
    },{
        extend: 'colvis',
        className: 'btn btn-primary btn-sm',
        text: '<i class="fas fa-search-plus"></i> Column Visibility',
        titleAttr: 'ColVis'
    }]

});
/*
function edit_contact(contact_id){
    // alert("Update Post: " + contact_id);
    $('#form_editcontact')[0].reset();
    $.ajax({
       method: 'POST',
       url: './scripts/get_contactdetail.php',
       data: { 'contact_id': contact_id },
       datatype: 'JSON',
       success: function ( myData ) {
           $.each( JSON.parse( myData ), function( index, value ) {
               $("#upt_contact_title").val(value.title);
               // $("#upt_contact_body").html(value.body);
               // Set ckeditor value
               CKEDITOR.instances.upt_contact_body.setData(value.body);
               $("#upt_contact_tags").val(value.tags);
               $("#upt_contact_desc").val(value.description);
               // $("#user_image").attr("src", "./images/" + value.user_image);
               if ( value.status == 1 ) {
                   $("#upt_contact_status").prop( "checked", true );
               } else {
                   $("#upt_contact_status").prop( "checked", false );
               }
           });
       }
    });

    $('#hid_contact_id').val(contact_id);
    $('#modal_editcontact').modal('show');
};
*/
function delete_contact(contact_id){
    // alert("Delete contact: " + contact_id);
    $('#hid_contact_id').val(contact_id);
    $('#modal_delcontact').modal('show');
};

$('#btn_delete').on('click', function (e) {
     var contact_id = $('#hid_contact_id').val();
     $.ajax({
         method: 'POST',
         url: './scripts/delete_contact.php',
         data: { 'contact_id': contact_id },
         success: function ( response ) {
             if ( response.indexOf("Deleted") !== -1 ) {
                 $('#success').trigger("play");
                 toastr.info('The data was deleted successfully.');
             } else {
                 $('#error').trigger("play");
                 toastr.error('Something went wrong.');
             }
         }

    });

    window.setTimeout(function(){
        table_contacts.ajax.reload();
        $('#modal_delcontact').modal('hide');
    }, 3000);

});

$('#modal_delcontact').on('show.bs.modal', function () {
    $('#dialog_appear').trigger("play");
});

$('#modal_delcontact').on('hidden.bs.modal', function () {
    $('#dialog_disappear').trigger("play");
});
