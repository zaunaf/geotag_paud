<?php

namespace App\DataFixtures;

use App\Entity\Pengguna;
use App\Entity\Sekolah;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var PenggunaPasswordEncoderInterface
     */
    private $passwordEncoder;

    //
    ///**
    // * @var Factory
    // */
    //private $faker;
    //
    //private const USERS = [
    //    [
    //        'username' => 'admin',
    //        'password' => 'Rahasiy4',
    //        'name' => 'Admin',
    //        'email' => 'admin@gmail.com',
    //        'roles' => [Pengguna::ROLE_SUPERADMIN]
    //    ],
    //    [
    //        'username' => 'abah',
    //        'password' => 'Rahasiy4',
    //        'name' => 'Abah',
    //        'email' => 'abah@gmail.com',
    //        'roles' => [Pengguna::ROLE_ADMIN]
    //    ],
    //    [
    //        'username' => 'zuckachev',
    //        'password' => 'Rahasiy4',
    //        'name' => 'Zuckachev',
    //        'email' => 'zuckachev@gmail.com',
    //        'roles' => [Pengguna::ROLE_WRITER]
    //    ],
    //    [
    //        'username' => 'zuck',
    //        'password' => 'Rahasiy4',
    //        'name' => 'Zuck',
    //        'email' => 'zuck@gmail.com',
    //        'roles' => [Pengguna::ROLE_EDITOR]
    //    ],
    //    [
    //        'username' => 'wawansky',
    //        'password' => 'Rahasiy4',
    //        'name' => 'Wawan Sky',
    //        'email' => 'wawansky@gmail.com',
    //        'roles' => [Pengguna::ROLE_COMMENTATOR]
    //    ],
    //    [
    //        'username' => 'surasep',
    //        'password' => 'Rahasiy4',
    //        'name' => 'Surasep',
    //        'email' => 'Surasep@gmail.com',
    //        'roles' => [Pengguna::ROLE_COMMENTATOR]
    //    ]
    //];
    //
    //
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        //$this->faker = Factory::create();
    }

    //
    ///**
    // * Load data fixtures with the passed Entity manager
    // * @param  ObjectManager $manager
    // */
    //public function load(ObjectManager $objectManager)
    //{
    //    $this->loadPenggunas($objectManager);
    //    $this->loadBlogPosts($objectManager);
    //    $this->loadComments($objectManager);
    //}
    //
    //public function loadPenggunas(ObjectManager $objectManager)
    //{
    //    foreach (self::USERS as $userFixture) {
    //        $user = new Pengguna();
    //        $user->setPenggunaname($userFixture['username']);
    //        $user->setPassword($this->passwordEncoder->encodePassword($user, $userFixture['password']));
    //        $user->setName($userFixture['name']);
    //        $user->setEmail($userFixture['email']);
    //        $user->setRoles($userFixture['roles']);
    //        $objectManager->persist($user);
    //        $this->addReference('user_'.$userFixture['username'], $user);
    //    }
    //
    //    // $user = new Pengguna();
    //    // $user->setPenggunaname('admin');
    //    // $user->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));
    //    // $user->setName('Admin');
    //    // $user->setEmail('admin@gmail.com');
    //    // $objectManager->persist($user);
    //    // $this->addReference('user_admin', $user);
    //
    //    // $user = new Pengguna();
    //    // $user->setPenggunaname('zuck');
    //    // $user->setPassword($this->passwordEncoder->encodePassword($user, 'sukasepjay'));
    //    // $user->setName('Zuckachev');
    //    // $user->setEmail('zuckachev@gmail.com');
    //    // $objectManager->persist($user);
    //    // $this->addReference('user_zuck', $user);
    //
    //    $objectManager->flush();
    //}

    public function load(ObjectManager $manager)
    {
        $sekolah = new Sekolah();
        $sekolah->setId('0FBB3335-C497-44EC-AD88-39B76098C35B');
        $sekolah->setNama('KB Junior');
        $sekolah->setNamaNomenklatur( NULL);
        $sekolah->setNss( '****        ');
        $sekolah->setNpsn('69939556');
        $sekolah->setBentukPendidikanId( 2);
        $sekolah->setAlamatJalan( '-');
        $sekolah->setRt( NULL);
        $sekolah->setRw( NULL);
        $sekolah->setNamaDusun( NULL);
        $sekolah->setDesaKelurahan('Ratatotok Dua');
        $sekolah->setKodeWilayah('171001AA');
        $sekolah->setKodePos( NULL);
        $sekolah->setLintang(.0000000);
        $sekolah->setBujur(.0000000);
        $sekolah->setNomorTelepon( NULL);
        $sekolah->setNomorFax( NULL);
        $sekolah->setEmail( NULL);
        $sekolah->setWebsite( NULL);
        $sekolah->setKebutuhanKhususId( 0);
        $sekolah->setStatusSekolah( 2);
        $sekolah->setSkPendirianSekolah('16/PKBM.M/VII-2011');
        $sekolah->setTanggalSkPendirian(new \DateTime('2011-07-07 00:00:00.000'));
        $sekolah->setStatusKepemilikanId( 3);
        $sekolah->setYayasanId('C1044B2A-83ED-4F10-9D82-2B4E3E40C69E');
        $sekolah->setSkIzinOperasional('800.24/424/DIKPORA-MT/IV-');
        $sekolah->setTanggalSkIzinOperasional(new \DateTime('2015-04-02 00:00:00.000'));
        $sekolah->setNoRekening( NULL);
        $sekolah->setNamaBank( NULL);
        $sekolah->setCabangKcpUnit( NULL);
        $sekolah->setRekeningAtasNama( NULL);
        $sekolah->setMbs( 0);
        $sekolah->setLuasTanahMilik( 0);
        $sekolah->setLuasTanahBukanMilik( 0);
        $sekolah->setKodeRegistrasi( 10103863);
        $sekolah->setNpwp( NULL);
        $sekolah->setNmWp( NULL);
        $sekolah->setFlag( NULL);
        $sekolah->setCreateDate(new \DateTime('2018-02-06 22:59:03.437'));
        $sekolah->setLastUpdate( NULL);
        $sekolah->setSoftDelete( NULL);
        $sekolah->setLastSync(new \DateTime('2018-12-09 16:34:00.000'));
        $sekolah->setUpdaterId( NULL);
        $manager->persist($sekolah);

        //$user = new Pengguna();
        //$user->setId('newid()');
        //$user->setNama('Admin');
        //$user->setUsername('admin');
        //$user->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));
        //$manager->persist($user);
        //$this->addReference('user_admin', $user);

        $user = new Pengguna();
        $user->setId('483B5506-EBAE-4CDA-9E29-528911FD6458');
        $user->setSekolah($sekolah);
        $user->setUsername('juniorbasaan@gmail.com');
        $user->setPassword('b03e3fd2b3d22ff6df2796c412b09311');     // junior
        $user->setNama('DEVEN RATU');
        $user->setNipNim(NULL);
        $user->setJabatanLembaga(NULL);
        $user->setYm(NULL);
        $user->setSkype(NULL);
        $user->setAlamat('BASAAN');
        $user->setKodeWilayah('171001  ');
        $user->setNoTelepon(NULL);
        $user->setNoHp('-');
        $user->setAktif(1);
        $user->setPtkId(NULL);
        $user->setPeranId(10);
        $user->setLembagaId(NULL);
        $user->setYayasanId(NULL);
        $user->setLaId(NULL);
        $user->setDudiId(NULL);
        $user->setCreateDate(new \DateTime('2018-12-04 22:14:52.250'));
        $user->setRoles([Pengguna::ROLE_OPERATOR]);
        $user->setLastUpdate(new \DateTime('2018-12-09 17:04:17.000'));
        $user->setSoftDelete(0);
        $user->setLastSync(new \DateTime('2018-12-09 16:34:00.000'));
        $user->setUpdaterId('00000000-0000-0000-0000-000000000000');
        $manager->persist($user);


        $manager->flush();

    }
}
