<?php
    $counter = 0;
    foreach($data['products'] as $row){
        if(in_array($row['P_ID'],  $data['other']['wishlist'])){
        echo("
            <tr>
                <td>".++$counter."</td>
                <td> <img src='".BASE_URL."uploads/$row[P_IMAGE]' alt='{$row['P_IMAGE']}' class='product-img'></td>
                <td> {$row['P_NAME']} </td>
                <td> {$row['B_NAME']} </td>
                <td> {$row['P_DESC']} </td>
                <td>
                  <button class='btn btn-outline-danger btn-sm remove-btn' data-id='{$row['P_ID']}'> <i class='fa fa-trash'></i> </button>
                </td>
          </tr>
        ");
        }
    }
?>