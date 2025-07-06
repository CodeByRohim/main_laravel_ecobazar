<?php 

if (!function_exists('getProfileImage')) {
    function getProfileImage() {
        return "https://api.dicebear.com/9.x/initials/svg?seed=". auth()->user()->name ?? 'User';
    }
// } else {
//     function getProfileImage() {
//         return "https://api.dicebear.com/9.x/initials/svg?seed=". auth()->user()->name;
//     }
// }
}


if(!function_exists('getGeneralStatus')){
  function getGeneralStatus($status){
    if($status == 1){
      return '<span class="badge bg-success">Active</span>';
    } else {
      return '<span class="badge bg-danger">Inactive</span>';
    }
}
  }

  if(!function_exists('getProductImage')){
    function getProductImage($product) {
        if ($product->featured_image) {
            return asset('storage/' . $product->featured_image);
        } else {
            return 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzSC0MMnbREPAf4u7Jp5izKWj_IIn9wU7gEA&s';
        }
    }
  }



if(!function_exists('getImage')){
    function getImage($path = null) {
        return $path ? asset('storage/' . $path) : 'https://motobros.com/wp-content/uploads/2024/09/no-image.jpeg';
    }
}


