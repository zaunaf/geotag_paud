<?php


namespace App\Controller;


use App\Entity\Foto;
use App\Entity\Sekolah;
use Doctrine\ORM\PersistentCollection;
use Propel\Runtime\Collection\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"})
     */
    function home(Request $request)
    {
        $sekolahs  = $this->getDoctrine()->getRepository(Sekolah::class)->findAll();
        return $this->render('home.html.twig', [
            'sekolahs' => $sekolahs
        ]);
    }

    /**
     * @Route("/sekolah/{sekolah_id}", methods={"GET"})
     */
    function sekolah(Request $request)
    {
        $sekolahId = $request->get("sekolah_id");
        $sekolah  = $this->getDoctrine()->getRepository(Sekolah::class)->find($sekolahId);

        return $this->render('sekolah.html.twig', [
            'sekolah' => $sekolah
        ]);
    }

    /**
     * @Route("/foto/{sekolah_id}/{foto_id}/{type}", methods={"GET"})
     */
    function foto(Request $request)
    {
        // Params
        $sekolahId = $request->get("sekolah_id");
        $fotoId = $request->get("foto_id");
        $type = $request->get("type");

        if ($type == "thumbs") {
            $extension = "thm";
        } else {
            $extension = "jpg";
        }

        // Path
        $appPath = __DIR__. DIRECTORY_SEPARATOR ."..". DIRECTORY_SEPARATOR ."..";
        $uploadPath = realpath($appPath) . DIRECTORY_SEPARATOR ."uploads";
        $imageFolder = $uploadPath. DIRECTORY_SEPARATOR . $sekolahId . DIRECTORY_SEPARATOR;
        $fileName = $fotoId. "." .$extension;
        $fileFullPath = $imageFolder . $fileName;

        $fileStream = readfile($fileFullPath);

        $headers = array(
            'Content-Type'     => 'image/jpg',
            'Content-Disposition' => 'inline; filename="'.$fileName.'"');

        return new Response($fileStream, 200, $headers);
    }
}