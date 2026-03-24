$(document).ready(function () {
  let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
  
  function loadProducts() {
    $.ajax({
      url: window.location.href,
      type: "GET",
      data: {
        brand_filter: $('#brand').val(),
        price_filter: $('#price').val(),
        wishlist: JSON.parse(localStorage.getItem('wishlist')) || []
      },
      success: function (response) {
        $("#products").html(response);
      }
    });
  }

  function loadWishList(){
    $.ajax({
      url: window.location.href,
      type: "GET",
      data: {
        wishlist: JSON.parse(localStorage.getItem('wishlist')) || []
      },
      success: function (response) {
        $("#wishlist").html(response);
      }
    });
  }

  function wishListAction(data){
    let id = $(data).data('id');
    
    (!wishlist.includes(id)) ? wishlist.push(id) : wishlist = wishlist.filter(e => e != id);
    localStorage.setItem('wishlist', JSON.stringify(wishlist));
  }

  $(".toggle-password").click(function () {
    let input = $("#password");

    if (input.attr("type") === "password") {
      input.attr("type", "text");
      $(this).removeClass("fa-eye").addClass("fa-eye-slash");
    } else {
      input.attr("type", "password");
      $(this).removeClass("fa-eye-slash").addClass("fa-eye");
    }
  });

  $('#brand, #price').on('change', function () {
    loadProducts();
  });
  
  $(document).on('click', '.wishlist-icon', function(){
    wishListAction(this);
    $(this).toggleClass('fa-solid');
  });

  $(document).on('click', '.remove-btn', function(){
    wishListAction(this);
    $(this).closest("tr").remove();
  });

  loadProducts();
  loadWishList();
}); 