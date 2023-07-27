 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="../css/adminPanel.css">
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
 </head>

 <?php
    @include '../database/config.php';

    $select_users = mysqli_query($conn, "SELECT * FROM user");
    ?>

 <body>

     <div class="navbar">
         <div class="navbar-container">
             <h3 class="title">Admin Panel</h3>
             <ul class="nav-links">
                 <li><a href="../user/userlist.php">Users</a></li>
                 <li><a href="../admin/adminPanel.php">Products</a></li>
             </ul>
             <form action="" method="post">
                 <input type="submit" value="Logout" name="adminlogout" class="btn logout-btn">
             </form>
         </div>
     </div>

     <div class="container">
         <div id="user-section">
             <!-- User Section -->
             <div class="user-display product-display">
                 <h1 class="user_title">User List</h1>
                 <table class="user-display-table product-display-table">
                     <thead>
                         <tr>
                             <th>User ID</th>
                             <th>First Name</th>
                             <th>Last Name</th>
                             <th>Email</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php while ($user_row = mysqli_fetch_assoc($select_users)) { ?>
                             <tr>
                                 <td><?php echo $user_row['id']; ?></td>
                                 <td><?php echo $user_row['first_name']; ?></td>
                                 <td><?php echo $user_row['last_name']; ?></td>
                                 <td><?php echo $user_row['email']; ?></td>
                             </tr>
                         <?php } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 </body>

 </html>