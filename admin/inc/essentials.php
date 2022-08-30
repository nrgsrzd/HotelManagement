<?php 


  //  define('FEATURES_IMG_PATH', SITE_URL, '../../images/features/');

    define('SITE_URL', 'C:/xampp/htdocs/');
    define('ROOMS_IMG_PATH', SITE_URL.'../images1/rooms/');
    
    //backend upload process needs this data
 //
    define('UPLPAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'].'/PHP Project/V15/images1/');
    define('FEATURES_FOLDER', 'features/');
    define('ROOMS_FOLDER', 'rooms/');

    function adminLogin(){
        session_start();
        if(!(isset($_SESSION['adminLogin'])&& $_SESSION['adminLogin']==true)){
            echo"<script>
                window.location.href='index.php';
            </script>";
        }
        session_regenerate_id(true);
    }

    function redirect($url)
    {
        echo"<script>
            window.location.href='$url';
        </script>";
    }

    function alert($type, $msg)
    {
        echo"1111111";
        $bs_class = ($type == "success") ? "alert-success":"alert-danger";
        echo <<<alert
            <div class="alert $bs_class alert-warning alert-dismissible fade show custom-alert" role="alert">
                <strong class="me-3">$msg</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
    }

    function uploadSVGImage($image, $folder){
        $valid_mime = ['image/svg+xml'];
        $img_mime = $image['type'];

        if(!in_array($img_mime, $valid_mime)){
            return 'inv_img';
        }
        else if(($image['size']/(1024*1024))>2){
            return 'inv_size';
        }
        else{
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $rname = 'IMG_'.random_int(11111, 99999).".$ext";

            $img_path = UPLPAD_IMAGE_PATH.$folder.$rname;
            if(move_uploaded_file($image['tmp_name'], $img_path)){
                return $rname;
            }
            else{
                return 'upd_failed';
            }
        }
    }

    function uploadImage($image, $folder)
    {
        $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
        $img_mime = $image['type'];
      //  return "5%%%".$img_mime."\n";
        if(!in_array($img_mime, $valid_mime)){
         //   return "*1 :".'inv_img'."\n";
            return 'inv_img';
        }
        else if(($image['size']/(1024*1024))>2){
        //    return "*2 : ".'inv_size'."\n";
            return 'inv_size';
        }
        else{
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            
            $rname = 'IMG_'.random_int(11111, 99999).".$ext";
         //   return "Exttt: ".$rname."\n";
            $img_path = UPLPAD_IMAGE_PATH.$folder.$rname;
       //     return "Exttt: ".$img_path."\n";
            if(move_uploaded_file($image['tmp_name'], $img_path)){
        //        return "*3: ".$rname."\n";
                return $rname;
            }
            else{
        //        return "*4: ".'upd_failed'."\n";
                return 'upd_failed';
            }
        }
    }

    function deleteImage($image, $folder)
    {
        if(unlink(UPLPAD_IMAGE_PATH.$folder.$image))
        {
            return true;
        }
        else{
            return false;
        }
    }
    

?>