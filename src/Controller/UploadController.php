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
                return new JsonResponse(null, Response::HTTP_ACCEPTED);

            } else {
                throw new \Exception("Kesalahan ketika move file dari temp ke sasaran..");
            }

        } catch (\Exception $e) {
            return new JsonResponse(array("message" => "Error: " . $e->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}