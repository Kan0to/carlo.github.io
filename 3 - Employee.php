<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>HRM Smart</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Mainbody.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel = " icon " href= "icon.ico" ,  type = " image/x-icon">   
   </head>
<body>
    <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">
        <img src="logo.png" width="40px" height="30px"></div>
        <div class="logo_name">HRM Smart</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <div class="sidenavmenu">Main Menu</div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="  Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="home.html">
          <i class='bx bx-home-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="2 - Dashboard.html">
          <i class='bx bxs-dashboard'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="5 - Payroll.php">
         <i class='bx bxs-parking' ></i>
         <span class="links_name">Payroll</span>
       </a>
       <span class="tooltip">Payroll</span>
     </li>
     <li>
       <a href="3 - Employee.php">
         <i class='bx bxs-user-circle' ></i>
         <span class="links_name">Employee Data</span>
       </a>
       <span class="tooltip">Employee Data</span>
     </li>
     <li>
       <a href="9 - Checklist.html">
         <i class='bx bx-list-check' ></i>
         <span class="links_name">Checklist</span>
       </a>
       <span class="tooltip">Checklist</span>
     </li>
     <li>
       <a href="7 - Attendance.html">
         <i class='bx bxs-calendar' ></i>
         <span class="links_name">Attendance</span>
       </a>
       <span class="tooltip">Attendance</span>
     </li>
     <li>
       <a href="8 - Reports.html">
         <i class='bx bxs-report' ></i>
         <span class="links_name">Reports</span>
       </a>
       <span class="tooltip">Reports</span>
     </li>
     <li>
       <a href="6 - Departments.html">
         <i class='bx bx-building' ></i>
         <span class="links_name">Department</span>
       </a>
       <span class="tooltip">Department</span>
     </li>
     <div class="sidenavmenu2">Support</div>
     <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="links_name">Help</span>
        </a>
        <span class="tooltip">Help</span>
      </li>
     <li>
        <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log In</span>
        </a>
        <span class="tooltip">Log In</span>

     </li>  
    </ul>
  </div>
  <style>
  table {
    font-family: 'Roboto', sans-serif;
    border-collapse: collapse;
    width: 60%;
    margin: 0 auto;
    background-color: #ffffff;
    border: 1px solid #d6d6d6;
    box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
  }

  td,
  th {
    border: 1px solid #d6d6d6;
    text-align: center;
    padding: 10px;
    font-size: 14px;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  th {
    background-color: #22b8cf;
    color: #ffffff;
    font-weight: bold;
    text-transform: uppercase;
    padding: 10px;
  }

  caption {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    text-align: left;
    text-transform: uppercase;
    letter-spacing: 2px;
  }

  .search-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .search-container input[type=text] {
    padding: 6px;
    border: none;
    border-radius: 3px;
    width: 300px;
    font-size: 14px;
  }

  .search-container button {
    padding: 6px 10px;
    background-color: #22b8cf;
    color: #ffffff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
  }
</style>

<section class="home-section">
  <div class="search-container">
    <div class="text">Employees</div>
    
  </div>

  <table>
    <tr>
      <th>Id</th>
      <th>Full name</th>
      <th>Role</th>
      <th>Stage</th>
    </tr>

    <?php
    $host = "localhost";
    $dbname = "register_db";
    $username = "root";
    $password = "";
    
    $conn = mysqli_connect( hostname: $host,
                            username: $username,
                            password: $password,
                            database: $dbname);
    
    if (mysqli_connect_errno()){
    
        die("connection error" . mysqli_connect_error());
    }

    $sql = "SELECT id, name, role, stage from employees";
    $result = $conn->query($sql);

    if($result->num_rows>0) {
      while ($row = $result-> fetch_assoc()) {
        echo"<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["role"] ."</td><td>". $row["stage"] ."</td></tr>";
      }
      echo "</table>";
    }

    $conn->close();
    ?>

    </table>
      </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }


}

  
  </script>
</body>
</html>