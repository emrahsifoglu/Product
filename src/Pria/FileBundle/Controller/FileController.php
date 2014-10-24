<?php
namespace Pria\FileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller {

    public function getExtension($str)
    {
        $i = strrpos($str,".");
        if (!$i)
        {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }

    private function getCryptoRandSecure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    private function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        for($i=0;$i<$length;$i++){
            $token .= $codeAlphabet[$this->getCryptoRandSecure(0,strlen($codeAlphabet))];
        }
        return $token;
    }

    public function uploadAction(Request $request) {
        $image = $request->files->get('image_file');
        if (($image instanceof UploadedFile) && ($image->getError() == '0')) {
            if (($image->getSize() < (1024 * 1024))) {
                $original_name = $image->getClientOriginalName();
                $name_array = explode('.', $original_name);
                $file_type = $name_array[sizeof($name_array) - 1];
                $valid_file_types = array('jpg', 'jpeg', 'bmp', 'png');
                if (in_array(strtolower($file_type), $valid_file_types)) {
                    $filename = $this->getToken(strlen($original_name)).'.'.$file_type;
                    $uploading = $image->move('uploads/uploads/products', $filename);
                    if ($uploading) {
                        $status =  'success';
                        $thumb = new ThumbnailController('uploads/uploads/products/', $filename, "t_", 100);
                        $thumb->setSize(100, 100);
                        $thumb->save();

                        if ($thumb->result) {
                            $message = array( 'imageBig' => $filename, 'imageThumb' => $thumb->getThumbFileName() );
                        } else {
                            $status =  'error';
                            $message = $thumb->error;
                        }

                    }   else {
                        $status =  'error';
                        $message = 'Upload is failed';
                    }

                } else {
                    $status = 'error';
                    $message = 'Invalid File Type';
                }
            } else {
                $status = 'error';
                $message = 'Size exceeds limit';
            }
        } else {
            $status = 'error';
            $message = 'File Error';
        }

        $return = array('status' => $status, 'message' => $message);
        $response = new Response(json_encode($return));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
} 