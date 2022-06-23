<!--

    Work in Progress | Template by Nicolas Honrade

-->




<!-- Page Content -->
                    
<button type="button" class="btn btn-primary" style="margin-bottom: 1%;" data-bs-toggle="modal" data-bs-target="#createModal">
    Add Academic Year
</button>

                    
<table id="viewAcadYear" class="display table table-bordered" style="width:100%">
    <thead>
        <tr>
        <th>ID</th>
        <th class="thborderleft">Name</th>
        <th>Year</th>
        <th>startYear</th>
        <th>endYear</th>
        <th>Semester</th>
        <th>Status</th>
        <th>Archived</th>
        <th class="thborderright">Options</th>
        </tr>
    </thead>
</table>                  


<!-- Add Modal -->
<div class="modal fade" id="createModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Academic Year</h5>
                <a class="block2" data-bs-dismiss="modal" aria-label="Close"><span class="material-icons m-1">close</span></a>
            </div>
            <form action="../admin/curriculum/functions/CRUD_functions.php" method="POST" autocomplete="off">
            <div class="modal-body">
                <!-- <label>Year </label>
                <input type="text" required name="year" class="form-control block"/> -->
                <div class="yearpickerstart-container mb-3">
                    <div class="main">
                        <label for="">Start Date</label>
                        <input type="text" required name="startYear" class="yearpicker form-control block" placeholder="Select Year" value="">
                    </div>
                </div>
                <div class="yearpickerend-container mb-3">
                    <div class="main ">
                        <label for="">End Date</label>
                        <input type="text" required name="endYear" class="yearpicker form-control block" placeholder="Select Year" value="">
                    </div>
                </div>
                <div class="mb-3">
                    <label for=sem>Semester:</label>
                    <select class="form-control block" id="sem" name="sem">
                        <option value="" disabled selected>Choose option</option>
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                        <option value="Inter-Semester">Inter-Semester</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--EDIT Modal -->
<div class="modal fade" id="editModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Academic Year</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="../admin/curriculum/functions/CRUD_functions.php" method="POST" autocomplete="off">
            <div class="modal-body p-4">
            <input type="hidden" required name="editID" id="editID" readonly class="form-control"/>
                    <div class="yearpickerstart-container mb-3">
                        <div class="main">
                            <label for="">Start Date</label>
                            <input type="text" id="editStartYear" required name="editStartYear" class="yearpicker form-control block" placeholder="Select Year" value="">
                        </div>
                    </div>
                    <div class="yearpickerend-container mb-3">
                        <div class="main ">
                            <label for="">End Date</label>
                            <input type="text" id="editEndYear" required name="editEndYear" class="yearpicker form-control block" placeholder="Select Year" value="">
                        </div>
                    </div>
                    <div class="mb-3">
                    <label for=editSem>Semester:</label>
                        <select class="form-control block" id="editSem" name="editSem">
                            <option value="" disabled selected>Choose option</option>
                            <option value="1st Semester">1st Semester</option>
                            <option value="2nd Semester">2nd Semester</option>
                            <option value="Inter-Semester">Inter-Semester</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!--DELETE Modal -->
<div class="modal fade" id="deleteModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Academic Year</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../admin/curriculum/functions/CRUD_functions.php" method="POST">
            <div class="modal-body p-4">
                <input type="hidden" required name="delID" id="delID" readonly class="form-control"/>
                <p>Are you want to delete this academic year?</p>
                <h6 class="mb-3"><span class="fw-bold" id="deletingYear"></span></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!--<button type="button" class="btn btn-primary">Delete</button>-->
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--Active Confirmation Modal -->
<div class="modal fade" id="activeConfirmModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Active Academic Year</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../admin/curriculum/functions/CRUD_functions.php" method="POST">
            <div class="modal-body p-4">
                <input type="hidden" required name="activeID" id="activeID" readonly class="form-control"/>
                <p>Are you want to set this academic year as active?</p>
                <h6 class="mb-3"><span class="fw-bold" id="activatingYear"></span></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!--<button type="button" class="btn btn-primary">Delete</button>-->
                <button type="submit" class="btn btn-primary">Activate</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src= '../resources/js/yearpicker.js'></script>
<script>
var tableYear = $('#viewAcadYear').DataTable(
        {
        "processing": true,
        "serverside": true,
        "ajax": "../admin/curriculum/functions/server_processing.php",

        order: [[6, 'desc']],
        //order: [[2, 'asc']],
        "columnDefs":[
        {             // toggle visiblity of status and archived column
            "targets": [0,3,4,6,7] ,
            "visible": false ,
            "searchable": false
        },
        {             // centers column header and row data
            "targets": [0,1,2,3,5] ,
            className: "dt-center",
        },
        {             // disables ordering of certain columns
            "targets": [1,2,5],
            "orderable": false,
        },
        {
            "targets": [8] ,    // populate options column
            "orderable": false, 
            className: "dt-center",
            "data":6,
            "render": function(data,type,row){
                var active = 
                "<button type='button' disabled class='btn btn-success'>Currently Active</button>";
                // edit either variable to add things
                var inactive = 
                "<button type='button' id='activeBtn' class='btn btn-success' style='margin-bottom: 1%;' data-bs-toggle='modal' data-bs-target='#activeConfirmModal'>Set as Active</button>"+
                "<button type='button' id='deleteBtn' class='btn btn-danger' style='margin-bottom: 1%;' data-bs-toggle='modal' data-bs-target='#deleteModal'>Delete</button>"+
                "<button type='button' id='editBtn' class='btn btn-primary' style='margin-bottom: 1%;' data-bs-toggle='modal' data-bs-target='#editModal'>Edit</button>";
                if(data==1){
                    $('#currentActive').text(row[1]);
                    $('#currentActiveYear').text(row[1]);
                    return active 
                }
                else{
                    return inactive
                }
            }
        }],

        }
    );
    //gets row data on where the clicked button is located and assigns it
    $('#viewAcadYear').on('click','#deleteBtn',function()
    {
        var data = tableYear.row($(this).parents('tr')).data();
        document.getElementById("delID").value = data[0];
        $('#deletingYear').text(data[1]);
    }
    );
    $('#viewAcadYear').on('click','#editBtn',function()
    {
        var data = tableYear.row($(this).parents('tr')).data();
        document.getElementById("editStartYear").value = data[3];
        document.getElementById("editEndYear").value = data[4];
        document.getElementById("editSem").value = data[5];
        document.getElementById("editID").value = data[0];
    }
    );
    $('#viewAcadYear').on('click','#activeBtn',function()
    {
        var data = tableYear.row($(this).parents('tr')).data();
        document.getElementById("activeID").value = data[0];
        $('#activatingYear').text(data[1]);
    }
    );
    //resets form inside modal on close
    $('#createModal').on('hidden.bs.modal', function () {
        $('#createModal form')[0].reset();
    });

    $('#editModal').on('hidden.bs.modal', function () {
        $('#editModal form')[0].reset();
    });

    $(".yearpicker").yearpicker(
        {
        startYear: get_year(),
        selectedClass:'selected',
        disabledClass:'disabled',
        }
    );
    function get_year(){
        const getDate = new Date();
        let year = getDate.getFullYear();
        return year;

    }

</script>
