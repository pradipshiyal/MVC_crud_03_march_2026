<?php 
    require "header.php"; 
    require_once ROOT_PATH."/app/helpers/show-message.php";    
?>
    <div class="container mt-5">
        <div class="text-center mb-4 fw-bold h2"> Products </div>
        <div class="row g-4">
            <?php  
                if(isset($data) && !empty($data)): 
                    foreach($data as $row):
                        echo("
                            <div class='col-md-4'>
                                <div class='card h-100 product-card'>
                                    <img src='../uploads/$row[P_IMAGE]' class='img-fluid mx-auto mb-3 product-image'>
                                    <div class='card-body text-center'>
                                        <h5 class='card-title'>{$row['B_NAME']} {$row['P_NAME']}</h5>
                                        <p class='card-text'> {$row['P_DESC']}</p>
                                        <div class='row'>
                                            <div class='col-6'> Status: ".($row['P_STATUS'] ? "Active" : "Inactive")." </div>
                                            <div class='col-6'> Price: {$row['P_PRICE']} </div>
                                        </div>
                                    </div>
                                    <div class='card-footer'> 
                                        <div class='row'>
                                            <div class='col text-center'> 
                                                <a href='".BASE_URL."product/edit/{$row['P_ID']}'> <i class='fa-solid fa-pen-to-square me-3 text-white'> </i> </a>
                                                <a href='".BASE_URL."product/destroy/{$row['P_ID']}'> <i class='fa-solid fa-trash text-white'> </i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>          
                        ");
                    endforeach;
                endif;
            ?>
        </div>
    </div>
<?php require "footer.php"; ?>