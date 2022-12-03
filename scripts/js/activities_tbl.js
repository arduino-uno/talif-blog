// fetch data from MySQL
var table_activities = $('#activity_data').DataTable({
    "processing":true,
    "serverSide":false,
    "order":[],
    "ajax":{
        url:"./scripts/fetch_activities.php",
        type:"POST"
    },
    "columnDefs": [
        {data: 'act_id', className: 'text-center', name: 'activity_id', targets:0, orderable: true, searchable: true},
        {data: {user_id:'user_id', user_fullname:'user_fullname', user_role:'user_role', user_image:'user_image'}, className: 'font-weight-bold', name: 'user_login', targets:1,
            render: function(data,type,full,meta) {
                return '<div class="media">' +
                    '<img class="d-flex m-2 rounded border border-light" src="./images/' + data.user_image + '" width="60" alt="Generic placeholder image">' +
                    '<div class="media-body">' +
                      '<span class="font-weight-bold"><a href="./media.php?module=user-profile"' + data.user_fullname + '</a></span>' +
                      '<p class="font-weight-normal">' + data.user_role + '</p>' +
                    '</div></div>';
            }
        },
        {data: 'ip_address', className: 'font-weight-bold text-center', name: 'ip_address', targets:2},
        {data: {icon:'icon', message:'message'}, className: 'font-weight-normal', name: 'message', targets:3,
            render: function(data,type,full,meta) {
                return '<div class="info-box" style="min-height:40px;">' +
                    '<span class="info-box-icon bg-info elevation-1" style="height:40px;width:40px;"><i class="' + data.icon + '"></i></span>' +
                    '<span class="info-box-text justify-content-center align-self-center m-2">' + data.message + '</span>' +
                    '</div>';
            }
        },
        {data: 'created', className: 'font-weight-normal', name: 'created', targets:4},
        {data: 'act_id', className: 'text-center', name: 'action', targets:-1,
            render: function(data,type,full,meta) {
                return "<div class='btn-group' role='group'>" +
                          "<button type='button' class='btn btn-warning btn-sm' onclick='delete_activity(\"" + data + "\")' data-toggle='tooltip' data-placement='top' title='Remove Data'><i class='fas fa-trash'></i>&nbsp;Delete</button>" +
                       "</div>";
            }
        }
    ],
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

function delete_activity(act_id){
    // alert("Delete Post: " + act_id);
    $('#hid_act_id').val(act_id);
    $('#modal_delactivity').modal('show');
};

$('#btn_delete').on('click', function (e) {

     var act_id = $('#hid_act_id').val();
     $.ajax({
         method: 'POST',
         url: './scripts/delete_activity.php',
         data: { 'act_id': act_id },
         success: function ( response ) {
             if ( response.indexOf("Deleted") !== -1 ) {
                 $('#success').trigger("play");
                 toastr.info('Data Anda berhasil dihapus.');
             } else {
                 $('#error').trigger("play");
                 toastr.error('Something went wrong.');
             }
         }

    });

    window.setTimeout(function(){
        table_activities.ajax.reload();
        $('#modal_delactivity').modal('hide');
    }, 3000);

});

$('#modal_delactivity').on('show.bs.modal', function () {
    $('#dialog_appear').trigger("play");
});

$('#modal_delactivity').on('hidden.bs.modal', function () {
    $('#dialog_disappear').trigger("play");
});
