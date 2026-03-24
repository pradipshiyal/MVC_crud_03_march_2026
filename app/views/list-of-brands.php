<?php 
    if(isset($data) && !empty($data)){
        $brands = $data['brands'];
        $isAdmin = $data['other']['isAdmin'];
    }

    require $isAdmin ? "user-header.php": "header.php";
    require_once ROOT_PATH."/app/helpers/show-message.php";
?>
<div class="container mt-5">
    <div class="row">
        <?php 
            foreach($brands as $row){
                echo("<div class='col-md-3 mb-3'>
                    <div class='card shadow-sm text-center p-3 card-brand'>
                        <img src='".BASE_URL."uploads/$row[B_IMAGE]' class='img-fluid mx-auto mb-3 brand-image' alt=''>
                        <h6 class='mb-0'>{$row['B_NAME']}</h6>
                        ".($isAdmin ? "
                        <div class='row mt-3'>
                            <div class='col text-center'> 
                                <a href='".BASE_URL."admin/action/edit/brand/{$row['B_ID']}'> <i class='fa-solid fa-pen-to-square me-3 text-white'> </i> </a>
                                <a href='".BASE_URL."admin/action/delete/brand/{$row['B_ID']}'> <i class='fa-solid fa-trash text-white'> </i> </a>
                            </div>
                        </div>
                        " : "")."                    
                    </div>
                </div>");
            }
        ?>
    </div>
</div>
<?php require "footer.php"; ?>