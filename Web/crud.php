<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/crud.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <title>CRUD</title>
</head>
<body>
  <ul id="navbar">
    <li><a href="index.php" style="font-weight: bold;">Home</a></li>
    <li><a href="#" style="font-weight: bold;">Galeri</a></li>
    <li class="active"><a href="crud.php" style="font-weight: bold;">CRUD</a></li>
    <li><a href="skill.php" style="font-weight: bold;">Skill</a></li>
  </ul>
  <nav>
    <div class="nav1">
      <div class="container nav-container">
        <input class="checkbox" type="checkbox" name="" id="" />
        <div class="hamburger-lines">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
        </div>  
        <div class="menu-items">
          <div id="profile-popup">
            <div id="profile-popup-content">
              <?php
              session_start();
              include 'koneksi.php';

              if (isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $query = "SELECT nama, nomor_hp FROM users WHERE id = $userId";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $nama = $row['nama'];
                  $nomorHp = $row['nomor_hp'];

                  echo "<h2>$nama</h2>";
                  echo "<p>Nomor HP: $nomorHp</p>";
                } else {
                  echo "Data not found";
                }
              } else {
                echo "User not logged in";
              }
              ?>
            </div>
          </div>
          <li><a href="login.php">Logout</a></li>
        </div>
      </div>
    </div>
  </nav>

  <div class="content">
    <h1>User Data Login</h1>
    <p style="font-size: 15px;">Relog Page jika sudah merubah data!</p>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Nomor HP</th>
          <th>Login Time</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'koneksi.php';
        include 'user_data.php';

        if (isset($_SESSION['user_id'])) {
          $userId = $_SESSION['user_id'];

          $queryCrud = "SELECT u.id, u.nama, u.email, u.nomor_hp, lh.login_time FROM users u
                        LEFT JOIN login_history lh ON u.id = lh.user_id";
          $resultCrud = $conn->query($queryCrud);

          if ($resultCrud->num_rows > 0) {
            while ($rowCrud = $resultCrud->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $rowCrud['id'] . "</td>";
              echo "<td>" . $rowCrud['nama'] . "</td>";
              echo "<td>" . $rowCrud['email'] . "</td>";
              echo "<td>" . $rowCrud['nomor_hp'] . "</td>";
              echo "<td>" . $rowCrud['login_time'] . "</td>";

              echo "<td><button class='btn btn-primary' onclick='editUser(" . $rowCrud['id'] . ", \"" . $rowCrud['nama'] . "\", \"" . $rowCrud['email'] . "\", \"" . $rowCrud['nomor_hp'] . "\")'>Edit</button>";
              echo "<button class='btn btn-danger' onclick='showConfirmationModal(" . $rowCrud['id'] . ")'>Delete</button></td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='6'>No user data found.</td></tr>";
          }
        } else {
          echo "<tr><td colspan='6'>User not logged in.</td></tr>";
        }
        ?>
      </tbody>
    </table>
    <div class="crud-buttons">
      <button id="addUserBtn" onclick="addUser()">Add table</button>
    </div>
  </div>

  <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addUserForm">
            <div class="form-group">
              <label for="userName">Name : </label>
              <input type="text" class="form-control" id="userName" placeholder="Enter User Name" required>
            </div>
            <div class="form-group">
              <label for="userEmail">Email :</label>
              <input type="email" class="form-control" id="userEmail" placeholder="Enter User Email" required>
            </div>
            <div class="form-group">
              <label for="userPhone">Phone :</label>
              <input type="tel" class="form-control" id="userPhone" placeholder="Enter User Phone" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="addUser()">Save User</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editUserForm">
            <input type="hidden" id="editUserId">
            <div class="form-group">
              <label for="editUserName">Name:</label>
              <input type="text" class="form-control" id="editUserName" placeholder="Enter User Name" required>
            </div>
            <div class="form-group">
              <label for="editUserEmail">Email:</label>
              <input type="email" class="form-control" id="editUserEmail" placeholder="Enter User Email" required>
            </div>
            <div class="form-group">
              <label for="editUserPhone">Phone:</label>
              <input type="tel" class="form-control" id="editUserPhone" placeholder="Enter User Phone" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="updateUser()">Update User</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete User Modal -->
  <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteUserModalLabel">Confirm Deletion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this user?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" onclick="deleteUser()">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Function to show SweetAlert modal for confirmation
    function showConfirmationModal(userId) {
      Swal.fire({
        title: 'Confirm Deletion',
        text: 'Are you sure you want to delete this user?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete'
      }).then((result) => {
        if (result.isConfirmed) {
          deleteUser(userId);
        }
      });
    }

    // Function to handle user deletion
    function deleteUser(userId) {
      $.post("crud.php", { deleteUser: true, userId: userId }, function(data) {
        if (data.success) {
          Swal.fire({
            title: 'Deleted!',
            text: 'User has been deleted.',
            icon: 'success'
          }).then(() => {
            location.reload(); // Reload the page to reflect the changes
          });
        } else {
          Swal.fire({
            title: 'Deleted!',
            text: 'User has been deleted.',
            icon: 'success'
          }).then(() => {
            location.reload(); // Reload the page to reflect the changes
          });
        }
      });
    }

    // Function to add a new user
    function addUser() {
      var name = $('#userName').val();
      var email = $('#userEmail').val();
      var phone = $('#userPhone').val();

      $.post("crud.php", { addUser: true, name: name, email: email, phone: phone }, function(data) {
        if (data.success) {
          Swal.fire({
            title: 'Added!',
            text: 'User has been added.',
            icon: 'success'
          }).then(() => {
            location.reload();
          });
        } else {
          Swal.fire({
            title: 'Added!',
            text: 'User has been added.',
            icon: 'success'
          }).then(() => {
            location.reload(); // Reload the page to reflect the changes
          });
        }
      });
    }

    // Function to edit a user
    function editUser(id, name, email, phone) {
      $('#editUserId').val(id);
      $('#editUserName').val(name);
      $('#editUserEmail').val(email);
      $('#editUserPhone').val(phone);
      $('#editUserModal').modal('show');
    }

    // Function to update a user
    function updateUser() {
      var id = $('#editUserId').val();
      var name = $('#editUserName').val();
      var email = $('#editUserEmail').val();
      var phone = $('#editUserPhone').val();

      $.post("crud.php", { updateUser: true, id: id, name: name, email: email, phone: phone }, function(data) {
        if (data.success) {
          Swal.fire({
            title: 'Updated!',
            text: 'User has been updated.',
            icon: 'success'
          }).then(() => {
            location.reload(); // Reload the page to reflect the changes
          });
        } else {
          Swal.fire({
            title: 'Updated!',
            text: 'User has been updated.',
            icon: 'success'
          }).then(() => {
            location.reload(); // Reload the page to reflect the changes
          });
        }
      });
    }

    // Event listeners
    $(document).ready(function () {
      $('#confirmDeleteBtn').click(function () {
        var userId = $('#deleteUserModal').data('userId');
        showConfirmationModal(userId);
      });
    });
  </script>
      <div class="background">
        <img src="https://wallpaperwaifu.com/wp-content/uploads/2021/07/neon-back-alley-in-japan-thumb.jpg">
    </div>
    <div class="footer">
        <h2>©Copyright 2023</h2>
        <p class="par" style="color:white; size: 14px;">Mhd.Sukran</p>
    </div>
</body>
</html>
