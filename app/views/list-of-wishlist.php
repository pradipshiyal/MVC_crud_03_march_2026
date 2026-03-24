<?php
if (isset($data) && !empty($data)) {
  $isAdmin = $data['other']['isAdmin'];
}

require $isAdmin ? "user-header.php" : "header.php";
require_once ROOT_PATH . "/app/helpers/show-message.php";
?>

<div class="container">
  <div class="wishlist-container">
    <div class="table-wrapper">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Brand</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="wishlist"> </tbody>
      </table>
    </div>
  </div>
</div>

<?php require "footer.php"; ?>