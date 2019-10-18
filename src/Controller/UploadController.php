<?php


namespace App\Controller;

use App\Entity\Foto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;


class UploadController extends AbstractController
{
    /**
     * @Route("/upload", methods={"POST"})
     */
    function start(Request $request)
    {
        $foto_id = "";

        try {

            // Path
            $appPath = __DIR__. DIRECTORY_SEPARATOR ."..". DIRECTORY_SEPARATOR ."..";
            $uploadPath = realpath($appPath) . DIRECTORY_SEPARATOR ."uploads";

            // Parameters
            $foto_id = $request->get("foto_id");
            $sekolah_id = $request->get("sekolah_id");
            $tgl_pengiriman = new \DateTime("now");
            // dump($tgl_pengiriman); die;

            // File
            $tmp_name = $_FILES['image_file']['tmp_name'];
            $fileNameWithExt = $_FILES['image_file']['name'];
            list($fileNameWithoutExt, $extension) = explode(".", $fileNameWithExt);

            // Check errors
            switch ($_FILES['image_file']['error']) {
                case 1:
                    throw new \Exception("File terlalu besar (melebihi setting php)");
                    break;
                case 2:
                    throw new \Exception("File terlalu besar (melebihi limit di form)");
                    break;
                case 3:
                    throw new \Exception("Upload hanya sebagian, terganggu jaringan");
                    break;
                case 4:
                    throw new \Exception("Tidak ada file diupload");
                    break;
                case 6:
                    throw new \Exception("Folder tmp tidak ditemukan");
                    break;
                case 7:
                    throw new \Exception("Gagal menulis ke disk");
                    break;
                default:
                    // No error, continue
                    break;
            }

            $uploadFolderPath = $uploadPath . DIRECTORY_SEPARATOR . $sekolah_id;
            $finalFileName = $foto_id . "." . $extension;

            if (!is_dir($uploadFolderPath)) {
                mkdir($uploadFolderPath, 0777, true);
            }

            $uploadFilePath = realpath($uploadFolderPath) . DIRECTORY_SEPARATOR . $finalFileName;

            // Check if it's legit
            if (move_uploaded_file($tmp_name, $uploadFilePath)) {
                $sourceFilePath = realpath($uploadFolderPath) . DIRECTORY_SEPARATOR;
                $sourceFileName = $finalFileName;
                $thumbFileName = $foto_id . ".thm";
                $thumbFilePath = realpath($uploadFolderPath) . DIRECTORY_SEPARATOR;
                $this->makeThumb($sourceFilePath, $sourceFileName, $thumbFilePath, $thumbFileName, $thumbSize=100);

                // Get FotoObject for uploading
                $fotoObj = $this->getDoctrine()->getRepository(Foto::class)->find($foto_id);
                if (!$fotoObj) {
                    throw new \Exception("Data file tidak ditemukan ..");
                }
                $fotoObj->setTglPengiriman($tgl_pengiriman);

                // Persist
                $em = $this->getDoctrine()->getManager();
                $em->persist($fotoObj);
                $em->flush();

                // Return only code
                return new JsonResponse(array("foto_id" => $foto_id), Response::HTTP_ACCEPTED);

            } else {
                throw new \Exception("Kesalahan ketika move file dari temp ke sasaran..");
            }

        } catch (\Exception $e) {
            return new JsonResponse(array("foto_id" => $foto_id, "message" => "Error: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    function makeThumb( $srcPath, $srcFilename, $thumbPath, $thumbFilename, $thumbSize=100 ){

        global $max_width, $max_height;
        ini_set ('gd.jpeg_ignore_warning', 1);

        /* Set Filenames */
        $srcFile = $srcPath . DIRECTORY_SEPARATOR . $srcFilename;
        $thumbFile = $thumbPath . DIRECTORY_SEPARATOR . $thumbFilename;

        /* Determine the File Type */
        $type = substr( $srcFilename , strrpos( $srcFilename , '.' )+1 );

        /* Create the Source Image */
        switch( $type ){
            case 'jpg' : case 'jpeg' :
            $src = imagecreatefromjpeg( $srcFile ); break;
            case 'png' :
                $src = imagecreatefrompng( $srcFile ); break;
            case 'gif' :
                $src = imagecreatefromgif( $srcFile ); break;
        }

        /* Determine the Image Dimensions */
        $oldW = imagesx( $src );
        $oldH = imagesy( $src );

        /* Calculate the New Image Dimensions */
        $limiting_dim = 0;
        if( $oldH > $oldW ){
            /* Portrait */
            $limiting_dim = $oldW;
        }else{
            /* Landscape */
            $limiting_dim = $oldH;
        }
        /* Create the New Image */
        $new = imagecreatetruecolor( $thumbSize , $thumbSize );
        /* Transcribe the Source Image into the New (Square) Image */
        imagecopyresampled( $new , $src , 0 , 0 , ($oldW-$limiting_dim )/2 , ( $oldH-$limiting_dim )/2 , $thumbSize , $thumbSize , $limiting_dim , $limiting_dim );

        switch( $type ){
            case 'jpg' : case 'jpeg' :
            $src = imagejpeg( $new , $thumbFile ); break;
            case 'png' :
                $src = imagepng( $new , $thumbFile ); break;
            case 'gif' :
                $src = imagegif( $new , $thumbFile ); break;
        }

        imagedestroy( $new );
        // imagedestroy( $src );
    }
}