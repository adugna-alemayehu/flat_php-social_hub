<?php
require 'db.php';
if (isset($_POST['emp_id'])) {
    $id = $_POST['emp_id'];
    $sql = "select *from account where id='" . $id . "'";
    $result = $connection->query($sql);
    $output = "";
    $output .= '
    <div class="table_responsive">
    <table class="table table-border">
    ';
    while ($detail = $result->fetch_assoc()) {
        $output .= '
        <tr>
            <th width="30"><label>Id</label></th>  
            <td width="70">' . $detail['id'] . '</td>
         </tr>
         <tr>
            <th width="30"><label>Name</label></th>  
            <td width="70">' . $detail['first_name'] . '</td>
         </tr>
          <tr>
            <th width="30"><label>L.name</label></th>  
            <td width="70">' . $detail['last_name'] . '</td>
         </tr>
          <tr>
            <th width="30"><label>E-mail</label></th>  
            <td width="70">' . $detail['email'] . '</td>
         </tr>
        ';
    }
    $output .= "</table></div>";
    echo $output;
}
?>