<?php 

if (!function_exists('getProfileImage')) {
    function getProfileImage() {
        return "https://api.dicebear.com/9.x/initials/svg?seed=". auth()->user()->name;
    }
// } else {
//     function getProfileImage() {
//         return "https://api.dicebear.com/9.x/initials/svg?seed=". auth()->user()->name;
//     }
// }
}


if(!function_exists('getGeneralStatus')){
  function getGeneralStatus($status){
    if($status ==1){
      return '<span class="badge bg-success">Active</span>';
    } else {
      return '<span class="badge bg-danger">Inactive</span>';
    }
}
  }
