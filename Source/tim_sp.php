<?php
    include "connect.php";
    $tensp = $_POST['tensp'];
    $sql = "SELECT * FROM `sp` WHERE lower(TENSP) LIKE lower('%{$tensp}%') LIMIT 2";
    $results = $connect->query($sql);
    if ($results->num_rows > 0) 
    {
      while($rows = $results->fetch_assoc())
      {
        echo '<a href="product_detail.php?masp=' . $rows['MASP'] . '">';
        echo '<div class="card_mini">';
        echo '<img src="' . $rows['HINHANH'] . '" alt="">';
        echo '<div class="cardmini_body">';
        echo '<p class="cardmini_title">' . $rows['TENSP'] . '</p>';
        echo '<p class="cardmini_value">' . number_format($rows['GIA'], 0, ',', '.') . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</a>';
      }
    }
    else 
    {
      echo "0";
    }
    $connect->close();
?>