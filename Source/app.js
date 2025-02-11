// init Isotope
var $grid = $('#phone_list').isotope({
  // options
});
// filter items on button click
$('.filter-button-group').on( 'click', 'button', function() {
  var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
});


// hide or show button when scroll
$(window).scroll(function(){
  if ($(this).scrollTop() > 600) {
    $('.scr_btn').fadeIn();
  }
  else {
    $('.scr_btn').fadeOut();
  } 
});

$(document).ready(function() {
  // scroll to top when refresh page
  //$('html, body').animate({scrollTop: 0}, 'fast');
  // scroll to top page when click button home or button scroll
  $('.scrollup').click(function() {
      $('html, body').animate({scrollTop : 0}, 600);
      return false;
  });

  $('.removeItem').on('click', function(){
    var masp = $(this).val();
    $.ajax({
        method: "POST",
        url: "functions/handlecart.php",
        data:{
            "masp": masp,
            "scope": "delete"
        },
        success: function(response){
            if(response == 200)
            {
                // $('#listItemSuperCart').load(location.href + "#listItemSuperCart");
                alert("Xóa thành công");
                location.reload();
            }
            else{
              alert("Some error has happen");
            }
        }
    });
  });

  $('.minus').on('click', function(){
    var masp = $(this).val();
    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data:{
        "masp": masp,
        "scope": "minus-quantity"
      },
      success: function(response){
        if(response == 200)
        {
          location.reload();
        }
        else{
          alert("minus error");
        }
      }
    });
  });

  $(document).on('click','.plus', function(){
    var masp = $(this).val();
    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data:{
        "masp": masp,
        "scope": "plus-quantity"
      },
      success: function(response){
        if(response == 200)
        {
          location.reload();
        }
        else{
          alert("plus error");
        }
      }
    });
  });

  $(".search-product").keyup(function(){
    var tensp=$(this).val();
    
    $.post("tim_sp.php",
    {
      tensp:tensp 
    },
    function(data,status){  
      if(status=="success")
      {
        if (data != "0") 
        {
          $(".search_product").html(data); 
          
          $(".search_product").css({"display": "block"});
        }
        else 
        {
          $(".search_product").html("<h4>Không tìm thấy sản phẩm</h4>");
        }
      }
    }); 
  });

  $("html").click(function(){
    $(".search_product").html(""); 
    (".search_product").css({"display": "none"});
  });

  $(".purchase").on('click', function(){
    $tongtien = $('.tong').val();
    window.location.href = "thanhtoan_momo.php?tongtien=" + $tongtien;
    //$.post("thanhtoan.php", { tongtien: tongtien }, function(data){
      //alert("Thanh toán thành công");
      //window.location.href = "index.php";
    //});
  });

  $(".in_hd").on('click', function(){
    $sohd = $('.ds_hoadon').val();
    $hd = $('.hoadon' + $sohd).html();
    var printWindow = window.open(' ');
    printWindow.document.write('<html><head><title> </title><style>th { text-align: left; }</style></head><body>' + $hd + '</body></html>');
    printWindow.document.close();
    printWindow.print();
  });

});