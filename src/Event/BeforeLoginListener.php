<?php


namespace App\Event;


use App\Entity\Pengguna;
use App\Entity\Sekolah;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class BeforeLoginListener implements EventSubscriberInterface
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function onKernelRequest(RequestEvent $event)
    {
        if ('api_login_check' !== $event->getRequest()->attributes->get('_route')) {
            return;
        }

        $json = $event->getRequest()->getContent();

        $userPassArr = json_decode($json, true);
        $username = $userPassArr["username"];
        $password = $userPassArr["password"];

        // Cari username
        $pengguna = $this->entityManager->getRepository('App\Entity\Pengguna')
                    ->findOneBy(array("username" => $username));

        if (!$pengguna) {

            // Get Pengguna
            $queryPengguna = "SELECT top 1 *, 'ROLE_OPERATOR' as roles FROM pauddb.Dapodik_Pauddikmas_2018.dbo.Pengguna WHERE username = '$username'";
            $pengguna = $this->getSingleDataFromRemote($queryPengguna, 'App\Entity\Pengguna', 'pengguna');
            $penggunaId = $pengguna->getId();

            // Get Sekolah
            $sekolahId = $pengguna->getSekolahId();
            $querySekolah = "SELECT top 1 * FROM pauddb.Dapodik_Pauddikmas_2018.dbo.Sekolah WHERE sekolah_id = '$sekolahId'";
            $sekolah = $this->getSingleDataFromRemote($querySekolah, 'App\Entity\Sekolah', 'sekolah');

            // Save Sekolah
            $newSekolah = clone $sekolah;
            $this->entityManager->persist($newSekolah);
            // Update ID Sekolah
            $newSekolah->setId($sekolahId);
            $this->entityManager->persist($newSekolah);

            // Save Pengguna
            $newPengguna = clone $pengguna;
            $this->entityManager->persist($newPengguna);
            // Update ID Pengguna and Roles
            $newPengguna->setId($penggunaId);
            $this->entityManager->persist($newPengguna);

            $this->entityManager->flush();

        }

        return;
    }

    public function getSingleDataFromRemote($query, $entity, $alias) {

        $rsm = new ResultSetMappingBuilder($this->entityManager);
        $rsm->addRootEntityFromClassMetadata($entity, 'pengguna');
        $nativeQuery = $this->entityManager->createNativeQuery($query, $rsm);
        $result = $nativeQuery->getResult();
        return $result[0];

    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 9]
        ];
    }
}