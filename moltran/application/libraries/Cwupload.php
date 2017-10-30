<?php

error_reporting(0);

class Cwupload {

    public function upload($field_name1 = '', $target_folder1 = '', $file_name1 = '', $thumb1 = FALSE, $thumb_folder1 = '', $thumb_width1 = '', $thumb_height1 = '', $thumb_folder2 = '', $thumb_width2 = '', $thumb_height2 = '', $thumb_folder3 = '', $thumb_width3 = '', $thumb_height3 = '') {
        //folder path setup

        $target_path1 = $target_folder1;
        $thumb_path1 = $thumb_folder1;

        $thumb_path2 = $thumb_folder2;

        $thumb_path3 = $thumb_folder3;
        $ffname = rand() . $_FILES[$field_name1]['name'];

        //file name setup
        $filename_err1 = explode(".", $ffname);
        $filename_err_count1 = count($filename_err1);
        $file_ext1 = $filename_err1[$filename_err_count1 - 1];
        //exit;
        if ($file_name1 != '') {
            $fileName1 = $file_name1 . '.' . $file_ext1;
        } else {
            $fileName1 = $ffname;
        }

        //upload image path
        $upload_image1 = $target_path1 . basename($fileName1);

        //upload image
        if (move_uploaded_file($_FILES[$field_name1]['tmp_name'], $upload_image1)) {
            //thumbnail creation
            if ($thumb1 == TRUE) {
                $thumbnail1 = $thumb_path1 . $fileName1;
                list($width1, $height1) = getimagesize($upload_image1);
                $thumb_create1 = imagecreatetruecolor($thumb_width1, $thumb_height1);
                switch ($file_ext1) {
                    case 'jpg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;
                    case 'jpeg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;
                    case 'png':
                        $source1 = imagecreatefrompng($upload_image1);
                        break;
                    case 'gif':
                        $source1 = imagecreatefromgif($upload_image1);
                        break;
                    default:
                        $source1 = imagecreatefromjpeg($upload_image1);
                }
                imagecopyresized($thumb_create1, $source1, 0, 0, 0, 0, $thumb_width1, $thumb_height1, $width1, $height1);
                switch ($file_ext1) {
                    case 'jpg' || 'jpeg':
                        imagejpeg($thumb_create1, $thumbnail1, 100);
                        break;
                    case 'png':
                        imagepng($thumb_create1, $thumbnail1, 100);
                        break;

                    case 'gif':
                        imagegif($thumb_create1, $thumbnail1, 100);
                        break;
                    default:
                        imagejpeg($thumb_create1, $thumbnail1, 100);
                }

                $thumbnail2 = $thumb_path2 . $fileName1;
                list($width1, $height1) = getimagesize($upload_image1);
                $thumb_create2 = imagecreatetruecolor($thumb_width2, $thumb_height2);
                switch ($file_ext1) {
                    case 'jpg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;
                    case 'jpeg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;

                    case 'png':
                        $source1 = imagecreatefrompng($upload_image1);
                        break;
                    case 'gif':
                        $source1 = imagecreatefromgif($upload_image1);
                        break;
                    default:
                        $source1 = imagecreatefromjpeg($upload_image1);
                }
                imagecopyresized($thumb_create2, $source1, 0, 0, 0, 0, $thumb_width2, $thumb_height2, $width1, $height1);
                switch ($file_ext1) {
                    case 'jpg' || 'jpeg':
                        imagejpeg($thumb_create2, $thumbnail2, 100);
                        break;
                    case 'png':
                        imagepng($thumb_create2, $thumbnail2, 100);
                        break;

                    case 'gif':
                        imagegif($thumb_create2, $thumbnail2, 100);
                        break;
                    default:
                        imagejpeg($thumb_create2, $thumbnail2, 100);
                }

                $thumbnail3 = $thumb_path3 . $fileName1;
                list($width1, $height1) = getimagesize($upload_image1);
                $thumb_create3 = imagecreatetruecolor($thumb_width3, $thumb_height3);
                switch ($file_ext1) {
                    case 'jpg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;
                    case 'jpeg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;

                    case 'png':
                        $source1 = imagecreatefrompng($upload_image1);
                        break;
                    case 'gif':
                        $source1 = imagecreatefromgif($upload_image1);
                        break;
                    default:
                        $source1 = imagecreatefromjpeg($upload_image1);
                }
                imagecopyresized($thumb_create3, $source1, 0, 0, 0, 0, $thumb_width3, $thumb_height3, $width1, $height1);
                switch ($file_ext1) {
                    case 'jpg' || 'jpeg':
                        imagejpeg($thumb_create3, $thumbnail3, 100);
                        break;
                    case 'png':
                        imagepng($thumb_create3, $thumbnail3, 100);
                        break;

                    case 'gif':
                        imagegif($thumb_create3, $thumbnail3, 100);
                        break;
                    default:
                        imagejpeg($thumb_create3, $thumbnail3, 100);
                }
            }
            return $fileName1;
        } else {
            return false;
        }
    }
    
    public function uploadMultiple($field_name1 = '',$index = '', $target_folder1 = '', $file_name1 = '', $thumb1 = FALSE, $thumb_folder1 = '', $thumb_width1 = '', $thumb_height1 = '', $thumb_folder2 = '', $thumb_width2 = '', $thumb_height2 = '', $thumb_folder3 = '', $thumb_width3 = '', $thumb_height3 = '') {
        //folder path setup

        $target_path1 = $target_folder1;
        $thumb_path1 = $thumb_folder1;

        $thumb_path2 = $thumb_folder2;

        $thumb_path3 = $thumb_folder3;
        $ffname = rand() . $_FILES[$field_name1]['name'][$index];

        //file name setup
        $filename_err1 = explode(".", $ffname);
        $filename_err_count1 = count($filename_err1);
        $file_ext1 = $filename_err1[$filename_err_count1 - 1];
        //exit;
        if ($file_name1 != '') {
            $fileName1 = $file_name1 . '.' . $file_ext1;
        } else {
            $fileName1 = $ffname;
        }

        //upload image path
        $upload_image1 = $target_path1 . basename($fileName1);

        //upload image
        if (move_uploaded_file($_FILES[$field_name1]['tmp_name'][$index], $upload_image1)) {
            //thumbnail creation
            if ($thumb1 == TRUE) {
                $thumbnail1 = $thumb_path1 . $fileName1;
                list($width1, $height1) = getimagesize($upload_image1);
                $thumb_create1 = imagecreatetruecolor($thumb_width1, $thumb_height1);
                switch ($file_ext1) {
                    case 'jpg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;
                    case 'jpeg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;
                    case 'png':
                        $source1 = imagecreatefrompng($upload_image1);
                        break;
                    case 'gif':
                        $source1 = imagecreatefromgif($upload_image1);
                        break;
                    default:
                        $source1 = imagecreatefromjpeg($upload_image1);
                }
                imagecopyresized($thumb_create1, $source1, 0, 0, 0, 0, $thumb_width1, $thumb_height1, $width1, $height1);
                switch ($file_ext1) {
                    case 'jpg' || 'jpeg':
                        imagejpeg($thumb_create1, $thumbnail1, 100);
                        break;
                    case 'png':
                        imagepng($thumb_create1, $thumbnail1, 100);
                        break;

                    case 'gif':
                        imagegif($thumb_create1, $thumbnail1, 100);
                        break;
                    default:
                        imagejpeg($thumb_create1, $thumbnail1, 100);
                }

                $thumbnail2 = $thumb_path2 . $fileName1;
                list($width1, $height1) = getimagesize($upload_image1);
                $thumb_create2 = imagecreatetruecolor($thumb_width2, $thumb_height2);
                switch ($file_ext1) {
                    case 'jpg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;
                    case 'jpeg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;

                    case 'png':
                        $source1 = imagecreatefrompng($upload_image1);
                        break;
                    case 'gif':
                        $source1 = imagecreatefromgif($upload_image1);
                        break;
                    default:
                        $source1 = imagecreatefromjpeg($upload_image1);
                }
                imagecopyresized($thumb_create2, $source1, 0, 0, 0, 0, $thumb_width2, $thumb_height2, $width1, $height1);
                switch ($file_ext1) {
                    case 'jpg' || 'jpeg':
                        imagejpeg($thumb_create2, $thumbnail2, 100);
                        break;
                    case 'png':
                        imagepng($thumb_create2, $thumbnail2, 100);
                        break;

                    case 'gif':
                        imagegif($thumb_create2, $thumbnail2, 100);
                        break;
                    default:
                        imagejpeg($thumb_create2, $thumbnail2, 100);
                }

                $thumbnail3 = $thumb_path3 . $fileName1;
                list($width1, $height1) = getimagesize($upload_image1);
                $thumb_create3 = imagecreatetruecolor($thumb_width3, $thumb_height3);
                switch ($file_ext1) {
                    case 'jpg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;
                    case 'jpeg':
                        $source1 = imagecreatefromjpeg($upload_image1);
                        break;

                    case 'png':
                        $source1 = imagecreatefrompng($upload_image1);
                        break;
                    case 'gif':
                        $source1 = imagecreatefromgif($upload_image1);
                        break;
                    default:
                        $source1 = imagecreatefromjpeg($upload_image1);
                }
                imagecopyresized($thumb_create3, $source1, 0, 0, 0, 0, $thumb_width3, $thumb_height3, $width1, $height1);
                switch ($file_ext1) {
                    case 'jpg' || 'jpeg':
                        imagejpeg($thumb_create3, $thumbnail3, 100);
                        break;
                    case 'png':
                        imagepng($thumb_create3, $thumbnail3, 100);
                        break;

                    case 'gif':
                        imagegif($thumb_create3, $thumbnail3, 100);
                        break;
                    default:
                        imagejpeg($thumb_create3, $thumbnail3, 100);
                }
            }
            return $fileName1;
        } else {
            return false;
        }
    }

    public function addWaterMark($img, $watermark, $target, $imgname) {
        $stamp = imagecreatefrompng($watermark);

        //file name setup
        $filename_err1 = explode(".", $imgname);
        $filename_err_count1 = count($filename_err1);
        $file_ext1 = $filename_err1[$filename_err_count1 - 1];
        //exit;

        switch ($file_ext1) {
            case 'jpg':
                $im = imagecreatefromjpeg($img);
                break;
            case 'jpeg':
                $im = imagecreatefromjpeg($img);
                break;
            case 'png':
                $im = imagecreatefrompng($img);
                break;
            case 'gif':
                $im = imagecreatefromgif($img);
                break;
            default:
                $im = imagecreatefromjpeg($img);
        }

// Set the margins for the stamp and get the height/width of the stamp image
        $marge_right = 10;
        $marge_bottom = 10;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
        imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

// Output and free memory
        
        imagejpeg($im, $target);
        
        imagedestroy($im);
        
        return $imgname;
    }

}
