<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
    <script>
        $(document).ready(function(){
            $('#SubmitForm').submit(function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "/crud/store",
                    data: formData,
                    success: function(response){
                        $('#myModal').modal('hide');
                        appendRow(response);
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                    }
                });
            });

            $(document).on('click', '.btn-edit', function() {
                var name = $(this).closest('tr').find('.name').text();
                var age = $(this).closest('tr').find('.age').text();
                var phone = $(this).closest('tr').find('.phone').text();
                var email = $(this).closest('tr').find('.email').text();
                $('#name').val(name);
                $('#age').val(age);
                $('#phone').val(phone);
                $('#email').val(email);
                $('#myModal').modal('show');
            });

            $(document).on('click', '.btn-delete', function() {
                if (confirm('Are you sure you want to delete this record?')) {
                    $(this).closest('tr').remove();
                    alert('Record deleted successfully');
                }
            });

            function appendRow(data) {
                var newRow = `
                    <tr>
                        <td class="name">${data.name}</td>
                        <td class="age">${data.age}</td>
                        <td class="phone">${data.phone}</td>
                        <td class="email">${data.email}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-edit">Edit</button>
                                <button class="btn btn-danger btn-delete">Delete</button>
                            </div>
                        </td>
                    </tr>
                `;
                $('tbody').append(newRow);
            }
        });
    </script>
    <style>
        /* Custom CSS for table */
        .container {
            margin-top: 20px;
        }
        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }
        .custom-table th,
        .custom-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .custom-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .custom-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .custom-table tbody tr:hover {
            background-color: #ddd;
        }
        .btn-group {
            display: flex;
        }
        .btn-group .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <h3>Kubic Assignment</h3>
        <p>Click on the button for Crud Operations.</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Click for Crud</button>
    </div>
    <br><br>
    <div class="container">
        <h3>Students Data</h3>
        <table class="custom-table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="name">Vinay Kumar</td>
                    <td class="age">22</td>
                    <td class="phone">9004173181</td>
                    <td class="email">vinymahto999@gmail.com</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-edit">Edit</button>
                            <button class="btn btn-danger btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="name">Ravi</td>
                    <td class="age">21</td>
                    <td class="phone">9004173283</td>
                    <td class="email">ravi@gmail.com</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-edit">Edit</button>
                            <button class="btn btn-danger btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="name">Sandeep Kumar</td>
                    <td class="age">24</td>
                    <td class="phone">8884173181</td>
                    <td class="email">sandeeep999@gmail.com</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-edit">Edit</button>
                            <button class="btn btn-danger btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="name">Sachin Kumar</td>
                    <td class="age">24</td>
                    <td class="phone">9004173181</td>
                    <td class="email">sachinKumar@gmail.com</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary btn-edit">Edit</button>
                            <button class="btn btn-danger btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crud Operations</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-3">
                        <h2>Crud form</h2>
                        <form id="SubmitForm">
                            <div class="mb-3 mt-3">
                                <label for="text">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="age">Age:</label>
                                <input type="date" class="form-control" id="age" placeholder="Enter age" name="age">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone:</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
