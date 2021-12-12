<p>index.php - MobilesController</p>
<?php
if (count($allMobiles) >= 1){
    echo "<table class='table'>
    <thead>
      <tr>
        <th>Model</th>
        <th>Brand</th>
        <th>Price</th>
        <th>Stock (Qty)</th>
        <th>Sold (Qty)</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      </thead>
      <tbody>";
        foreach($allMobiles as $mobile){
            echo "<tr>";
            echo "<td>$mobile->model</td>";
            echo "<td>$mobile->brand_id</td>";
            echo "<td>$mobile->price</td>";
            echo "<td>$mobile->stock_qty</td>";
            echo "<td>$mobile->sold_qty</td>";
            echo "<td>Edit Button</td>";
            echo "<td>Delete Button</td>";
            echo "</tr>";
        }
    echo "</tbody>
  </table>";
}