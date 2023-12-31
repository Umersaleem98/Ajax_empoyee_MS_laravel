<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Project Laravel </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>


    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="bg-light p-2 m-2">
                        <h3 class="text-dark text-center">Employee Data</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="col-md-8 d-flex my-2">
                            <input type="text" id="search" placeholder="Search Employees" class="form-control">
                            <!-- <button class="btn btn-info btn-sm">Search</button> -->
                            </div>
                        </div>
                        <div class="col-sm-6 my-2">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                            <button class="btn btn-danger btn-xs delete-all mb-3">Remove All Data</button>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <!-- <th>Check <input type="checkbox"   id="selectall" ></th> -->
                            <th>Check <input type="checkbox" id="check_all"></th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="employee_data">
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- <ul id="search-results"></ul> -->
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_epmployee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address_input" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone_input" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" onclick="addEmployee()">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_employee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address_input" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone_input" class="form-control" required>
                        <input type="hidden" id="employee_id" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" onclick="editEmployee()" value="Save">
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal HTML -->
    <div id="viewEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_employee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address_input" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone_input" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" onclick="deleteEmployee()" value="Delete">
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script>
    $(document).ready(function() {
        load_data();

    });

    function render(response){

        console.log(response);
                var tr = '';
                for (var i = 0; i < response.length; i++) {

                    var id = response[i].id;
                    var name = response[i].name;
                    var email = response[i].email;
                    var phone = response[i].phone;
                    var address = response[i].address;


                    tr += '<tr>';
                    tr += '<td> <input type="checkbox" class="checkbox" data-id="' + id + '"> </td>';
                    tr += '<td>' + id + '</td>';
                    tr += '<td>' + name + '</td>';
                    tr += '<td>' + email + '</td>';
                    tr += '<td>' + phone + '</td>';
                    tr += '<td>' + address + '</td>';
                    tr += '<td><div class="d-flex">';
                    
                    tr +=
                        '<a href="#editEmployeeModal" class="m-1 edit" data-toggle="modal" onclick=viewEmployee("' +
                        id +
                        '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                    tr +=
                        '<a href="#deleteEmployeeModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                        id +
                        '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                    tr += '</div></td>';
                    tr += '</tr>';
                }
                $('#employee_data').html(tr);
    }
    
    function employeeList() {
        $.ajax({
            type: 'get',
            url: "{{ url('employee-list') }}",
            success: function(response) {
                render(response);
            }
        });
    }

    function addEmployee() {
        var name = $('.add_epmployee #name_input').val();
        var email = $('.add_epmployee #email_input').val();
        var phone = $('.add_epmployee #phone_input').val();
        var address = $('.add_epmployee #address_input').val();

        $.ajax({
            type: 'post',
            data: {
                name: name,
                email: email,
                phone: phone,
                address: address,
                _token: "{{ csrf_token() }}"
            },
            url: "{{ url('employee-add') }}",
            success: function(response) {
                $('#addEmployeeModal').modal('hide');
                load_data();
                alert(response.message);
            }

        })
    }

    function editEmployee() {
        var name = $('.edit_employee #name_input').val();
        var email = $('.edit_employee #email_input').val();
        var phone = $('.edit_employee #phone_input').val();
        var address = $('.edit_employee #address_input').val();
        var employee_id = $('.edit_employee #employee_id').val();

        $.ajax({
            type: 'post',
            data: {
                name: name,
                email: email,
                phone: phone,
                address: address,
                employee_id: employee_id,
                _token: "{{ csrf_token() }}"
            },
            url: "{{ url('employee-edit') }}",
            success: function(response) {
                $('#editEmployeeModal').modal('hide');
                load_data();
                alert(response.message);
            }

        })
    }

    function viewEmployee(id = 2) {
        $.ajax({
            type: 'get',
            data: {
                id: id,
            },
            url: "{{ url('employee-view') }}",
            success: function(response) {
                console.log(response);
                $('.edit_employee #name_input').val(response.name);
                $('.edit_employee #email_input').val(response.email);
                $('.edit_employee #phone_input').val(response.phone);
                $('.edit_employee #address_input').val(response.address);
                $('.edit_employee #employee_id').val(response.id);
                $('.view_employee #name_input').val(response.name);
                $('.view_employee #email_input').val(response.email);
                $('.view_employee #phone_input').val(response.phone);
                $('.view_employee #address_input').val(response.address);
            }
        })
    }

    function deleteEmployee() {
        var id = $('#delete_id').val();
        $('#deleteEmployeeModal').modal('hide');
        $.ajax({
            type: 'get',
            data: {
                id: id,
            },
            url: "{{ url('employee-delete') }}",
            success: function(response) {

                load_data();
                alert(response.message);
            }
        })
    }

    // delete all 

    $(document).ready(function() {

        $('#check_all').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });

        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#check_all').prop('checked', true);
            } else {
                $('#check_all').prop('checked', false);
            }
        });

        $('.delete-all').on('click', function(e) {


            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });


            if (idsArr.length <= 0) {
                alert("Please select atleast one record to delete.");
            } else {

                if (confirm("Are you sure, you want to delete the selected Employee?")) {

                    var strIds = idsArr.join(",");

                    $.ajax({
                        url: 'multiple-category',
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + strIds,
                        success: function(data) {
                            if (data['status'] == true) {
                                $(".checkbox:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });


                }
            }
        });

    });


    // serach work 

    function load_data(){
          var search = $('#search').val();
                if(search!=""){
                search_helper();
            }
                else {
                employeeList();
            }
    }

    function search_helper(){

        var query = $('#search').val();
            $.ajax({
                url: '/search',
                type: 'GET',
                data: {search: query},
                success: function(response) {
                    render(response);
            }
            });
    }

    $(document).ready(function () {
        $('#search').on('keyup', function () {
            search_helper();
        });
    });

    </script>



</body>

</html>