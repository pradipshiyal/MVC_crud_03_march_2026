<?php 
    require_once "header.php";
    require_once ROOT_PATH."/app/helpers/show-message.php";
?>
<div class="container mt-5">
    <h3 class="text-center mb-4 product-heading">Brands</h3>
    <div class="row">
        <?php 
            if(isset($data) && !empty($data)): 
                foreach($data as $row):
                    echo("<div class='col-md-3 mb-3'>
                        <div class='card shadow-sm text-center p-3 card-brand'>
                            <img src='../uploads/$row[B_IMAGE]' class='img-fluid mx-auto mb-3 brand-image' alt=''>
                            <h6 class='mb-0'>{$row['B_NAME']}</h6>
                            <div class='row mt-3'>
                                <div class='col text-center'> 
                                    <a href='".BASE_URL."brand/edit/{$row['B_ID']}'> <i class='fa-solid fa-pen-to-square me-3 text-white'> </i> </a>
                                    <a href='".BASE_URL."brand/destroy/{$row['B_ID']}'> <i class='fa-solid fa-trash text-white'> </i> </a>
                                </div>
                            </div>
                        </div>
                    </div>");
                endforeach;
            endif; 
        ?>
    </div>
</div>
<?php require "footer.php"; ?>