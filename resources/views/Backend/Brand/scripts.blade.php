<script>
  $(document).ready(function(){
    $('.btnDelete').click(function(){
      event.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
      window.location.href = $(this).attr('href');
      }
    });
  });
  });
</script>
<script>
$(document).ready(function() {
    $('#icon').change(function() {
      let file = this.files[0];
      let url = URL.createObjectURL(file);
      $('.preview_box .image').attr('src', url).removeClass('d-none');
    });
  });
</script>

{{-- from brands blade --}}
<script>
  $(document).ready(function(){
    $('#menu-img-input').change(function(){
      let file = $(this)[0].files[0];
      let url = URL.createObjectURL(file);
      
      if ($(this).attr('id') === 'menu-img-input') {
        $('.menu_image').attr('src', url);
      } 
    });
    // PREVIEW
    $('#preview').click(function(){
      $('.preview_box').fadeToggle(500);
    });

    $('input[name="menu_name"]').keyup(function(){
      $('.preview_box .title').html($(this).val());
    });
    $('input[name="menu_details"]').keyup(function(){
      $('.preview_box .detail').html($(this).val());
    });
    $('input[name="menu_price"]').keyup(function(){
      $('.preview_box .price').html($(this).val());
    });
    $('input[name="menu_img"]').change(function(){
      let file = $(this)['0'].files[0];
      let url = URL.createObjectURL(file);
      $('.preview_box .image').attr('src', url);
    });
  });
</script>