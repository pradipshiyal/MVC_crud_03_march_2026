<?php
    if(isset($data) && !empty($data)){
        $brands = $data['brands'];
        $isAdmin = $data['other']['isAdmin'];
    }

    require $isAdmin ? "user-header.php": "header.php";
    require_once ROOT_PATH."/app/helpers/show-message.php";
?>
    <div class="container">
        <div class="row g-3 mt-3 align-items-center justify-content-center bg-white pb-3 shadow rounded-3 <?php echo $isAdmin ? 'd-none' : ''; ?>">
            <div class="col-md-3">
                <label class="form-label fw-bold"> <i class="fa-solid fa-tag me-1"></i> Brand </label>
                <select name="brand_filter" id="brand" class="form-select">
                    <option value="" selected disabled>Select brand</option>
                    <?php
                        foreach($brands as $row){
                            echo "<option value='$row[B_ID]'> $row[B_NAME] </option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold"> <i class="fa-solid fa-indian-rupee-sign me-1"></i> Price </label>
                <select name="price_filter" id="price" class="form-select">
                    <option value="" selected disabled>Select price</option>
                    <option value="0-700">up to ₹700</option>
                    <option value="700-900">₹700 - ₹900</option>
                    <option value="900-1300">₹900 - ₹1300</option>
                    <option value="1300-2400">₹1300 - ₹2400</option>
                    <option value="2400-2400">Over ₹2400</option>
                </select>
            </div>
            
            <div class="col-md-2 d-grid">
                <label class="form-label invisible">Clear</label>
                <a href="<?= BASE_URL ?>" class="btn btn-outline-danger"> Clear </a>
            </div>
        </div>
        <div class="row g-4 mt-3" id="products"> </div>
    </div>
<?php require "footer.php"; ?>