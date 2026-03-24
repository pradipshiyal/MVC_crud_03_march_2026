<?php
    foreach($data['products'] as $row){
        echo("
            <div class='col-md-4 mb-3'>
                <div class='card h-100 product-card'>
                    <img src='".BASE_URL."uploads/$row[P_IMAGE]' class='img-fluid mx-auto mb-3 product-image'>
                    <div class='card-body text-center'>
                        <h5 class='card-title'>{$row['B_NAME']} {$row['P_NAME']}</h5>
                        <p class='card-text'> {$row['P_DESC']}</p>
                        <div class='row'>
                            <div class='col-6'> Price: {$row['P_PRICE']} </div>
                            <div class='col-6'> "
                                .($data['other']['isAdmin'] 
                                    ? "Status: ".($row['P_STATUS'] ? "Active" : "Inactive") 
                                    : "<i class='".(in_array($row['P_ID'], $data['other']['wishlist']) ? "fa-solid" : "fa-regular")." 
                                        fa-heart h5 wishlist-icon' data-id='".$row['P_ID']."'></i>"
                                ).
                            "</div>
                        </div>
                    </div>
                    ".($data['other']['isAdmin'] ? "
                    <div class='card-footer'> 
                        <div class='row'>
                            <div class='col text-center'> 
                                <a href='".BASE_URL."admin/action/edit/product/{$row['P_ID']}'> <i class='fa-solid fa-pen-to-square me-3 text-white'></i> </a>
                                <a href='".BASE_URL."admin/action/delete/product/{$row['P_ID']}'> <i class='fa-solid fa-trash text-white'></i> </a>
                            </div>
                        </div>
                    </div>
                    " : "")." 
                </div>
            </div>          
        ");
    }
?>