<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center" style="background-color: #4c99c9;">ID</th>
        <th class="text-center" style="background-color: #4c99c9;">Username </th>
        <th class="text-center" style="background-color: #4c99c9;">Email</th>
        <th class="text-center" style="background-color: #4c99c9;">Password</th>
   
      </tr>
    </thead>
    <?php
      include_once "../connection.php";
      $sql="SELECT * from users where first_name=0";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["first_name"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["password"]?></td>
     
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>