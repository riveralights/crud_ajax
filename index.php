<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <title>CRUD AJAX</title>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center my-4">AJAX CRUD</h1>

      <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Create New Data
        </button>
      </div>

      <h2 class="text-secondary">All Records</h2>
      <hr>
      
      <div id="recordBox">

      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create New Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" name="first_name" id="firstName" class="form-control" placeholder="Enter First Name">
              </div>
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" name="last_name" id="lastName" class="form-control" placeholder="Enter Last Name">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="number" min="0" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" name="phone_number" id="phoneNumber" class="form-control" placeholder="Enter Phone Number">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" onclick="addRecord()" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Modal -->
      <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="updateFirstName">First Name</label>
                <input type="text" name="first_name" id="updateFirstName" class="form-control" placeholder="Enter First Name">
              </div>
              <div class="form-group">
                <label for="updateLastName">Last Name</label>
                <input type="text" name="last_name" id="updateLastName" class="form-control" placeholder="Enter Last Name">
              </div>
              <div class="form-group">
                <label for="updateEmail">Email</label>
                <input type="email" name="email" id="updateEmail" class="form-control" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <label for="updatePhoneNumber">Phone Number</label>
                <input type="number" min="0" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" name="phone_number" id="updatePhoneNumber" class="form-control" placeholder="Enter Phone Number">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" onclick="updateUserDetail()" class="btn btn-success">Update</button>
              <input type="hidden" name="" id="hiddenUserId">
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    
    <script>
      $(document).ready(function(){
        readRecord();
        $('#exampleModal').on('show.bs.modal', function (event) {
          $('#firstName').css('border-color', '#ccc');
          $('#lastName').css('border-color', '#ccc');
          $('#email').css('border-color', '#ccc');
          $('#phoneNumber').css('border-color', '#ccc');
        });

        $('#updateUserModal').on('show.bs.modal', function (event) {
          $('#updateFirstName').css('border-color', '#ccc');
          $('#updateLastName').css('border-color', '#ccc');
          $('#updateEmail').css('border-color', '#ccc');
          $('#updatePhoneNumber').css('border-color', '#ccc');
        });
      });

      function readRecord() {
        var readrecord = 'readrecord';
        $.ajax({
          url: 'backend.php',
          method: 'POST',
          data: {
            readrecord: readrecord
          },
          success: function(data, status) {
            $('#recordBox').html(data);
            $('#exampleTable').DataTable();
          }
        });
      }

      function addRecord() {
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var email = $('#email').val();
        var phoneNumber = $('#phoneNumber').val();
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

        if(firstName === "") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please fill First Name Fields!',
          });
          $('#firstName').css('border-color', '#ff0000');
          $('#firstName').focus();
          return false;

        }

        if(lastName === "") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please fill Last Name Fields!',
          });
          $('#lastName').css('border-color', '#ff0000');
          $('#lastName').focus();
          return false;
        }

        if(!pattern.test(email) || email === "") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please Input Valid Email!',
          });
          $('#email').css('border-color', '#ff0000');
          $('#email').focus();
          return false;
        }

        if(phoneNumber === "") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please fill phone number fields!',
          });
          $('#phoneNumber').css('border-color', '#ff0000');
          $('#phoneNumber').focus();
          return false;
        }

        $.ajax({
          url: 'backend.php',
          method: 'POST',
          data: {
            firstName: firstName,
            lastName: lastName,
            email: email,
            phoneNumber: phoneNumber,
          },
          success: function(data) {
            Swal.fire(
              'Good job!',
              'New Data Has Beed Added!',
              'success'
            );

            readRecord();
            $('#exampleModal').modal('hide');
            $('#exampleModal').on('hidden.bs.modal', function (event) {
              $('#firstName').val('');
              $('#lastName').val('');
              $('#email').val('');
              $('#phoneNumber').val('');
            });
          }
        });
      }

      function deleteUser(id) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
              method: "POST",
              url: "backend.php",
              data: {
                deleteId: id
              },
              success: function(data, status) {
                readRecord();
              }
            });
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            );
          }
        })
      }

      function getUserDetails(id)
      {
        $('#hiddenUserId').val(id);
        $.post('backend.php',{
          id: id
        }, function(data, status) {
          var user = JSON.parse(data);

          $('#updateFirstName').val(user.first_name);
          $('#updateLastName').val(user.last_name);
          $('#updateEmail').val(user.email);
          $('#updatePhoneNumber').val(user.phone_number);
        });
        $('#updateUserModal').modal('show');
      }

      function updateUserDetail()
      {
        var userIdUpdate = $('#hiddenUserId').val();
        var firstNameUpdate = $('#updateFirstName').val();
        var lastNameUpdate = $('#updateLastName').val();
        var emailUpdate = $('#updateEmail').val();
        var phoneNumberUpdate = $('#updatePhoneNumber').val();
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

        if(firstNameUpdate === "") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please fill First Name Fields!',
          });
          $('#updateFirstName').css('border-color', '#ff0000');
          $('#updateFirstName').focus();
          return false;

        }

        if(lastNameUpdate === "") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please fill Last Name Fields!',
          });
          $('#updateLastName').css('border-color', '#ff0000');
          $('#updateLastName').focus();
          return false;
        }

        if(!pattern.test(emailUpdate) || emailUpdate === "") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please Input Valid Email!',
          });
          $('#updateEmail').css('border-color', '#ff0000');
          $('#updateEmail').focus();
          return false;
        }

        if(phoneNumberUpdate === "") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please fill phone number fields!',
          });
          $('#phoneNumberUpdate').css('border-color', '#ff0000');
          $('#phoneNumberUpdate').focus();
          return false;
        }


        $.ajax({
          url: 'backend.php',
          method: 'POST',
          data: {
            userIdUpdate: userIdUpdate,
            firstNameUpdate: firstNameUpdate,
            lastNameUpdate: lastNameUpdate,
            emailUpdate: emailUpdate,
            phoneNumberUpdate: phoneNumberUpdate,
          },
          success: function(data, status) {
            Swal.fire(
              'Good job!',
              'New Data Has Beed Updated!',
              'success'
            );
            $('#updateUserModal').modal('hide');
            readRecord();
          }
        });
      }
    </script>
  </body>
</html>