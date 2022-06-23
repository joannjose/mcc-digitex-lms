<table id="viewArchivedYear" class="display table table-bordered" style="width:100%">
    <thead>
        <tr>
        <th>ID</th>
        <th class="thborderleft">Name</th>
        <th>Year</th>
        <th>Semester</th>
        <th>Archived</th>
        <th class="thborderright">Options</th>
        </tr>
    </thead>
</table>

<div class="modal fade" id="restoreConfirmModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Restore Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../admin/settings/functions/restore_function.php" method="POST">
            <div class="modal-body p-4">
                <input type="hidden" required name="restoreID" id="restoreID" readonly class="form-control"/>
                <p>Are you want to restore this item?</p>
                <h6 class="mb-3"><span class="fw-bold" id="restoringYear"></span></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!--<button type="button" class="btn btn-primary">Delete</button>-->
                <button type="submit" class="btn btn-primary">Restore</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
var tableYear = $('#viewArchivedYear').DataTable(
        {
        "processing": true,
        "serverside": true,
        "ajax": "../admin/settings/functions/server_archive.php",

        "columnDefs":[
        {             // toggle visiblity of status and archived column
            "targets": [0,4] ,
            "visible": false ,
            "searchable": false,
            "orderable": false
        },
        {             // centers column header and row data
            "targets": [1,2,3] ,
            className: "dt-center",
        },
        {             // disables ordering of certain columns
            "targets": [1,3] ,
            "orderable": false
        },
        {
            "targets": [5] ,    // populate options column
            "orderable": false, 
            className: "dt-center",
            "render": function(data,type,row){
                // edit variable to add things
                var archived = 
                "<button type='button' id='restoreBtn' class='btn btn-success' style='margin-bottom: 1%;' data-bs-toggle='modal' data-bs-target='#restoreConfirmModal'>Restore</button>";
                return archived;
            }
        }],

        }
    );

$('#viewArchivedYear').on('click','#restoreBtn',function()
{
    var data = tableYear.row($(this).parents('tr')).data();
    document.getElementById("restoreID").value = data[0];
    $('#restoringYear').text(data[1]);
}
);
</script>