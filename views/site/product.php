<table class="table">
 <tr><th>ID</th><th>Name</th><th>Price</th><th>Unit</th></tr>
<?php 
foreach($rows as $row){
 echo "<tr>
 <td>{$row['id']}</td>
 <td>{$row['name']}</td>
 <td>{$row['price']}</td>
 <td>{$row['unit']}</td>
 </tr>";
}
?>
</table>