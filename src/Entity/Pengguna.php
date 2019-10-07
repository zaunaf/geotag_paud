<?php

// api/src/Entity/Pengguna.php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Annotation\GeneratedValue;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * Pengguna.
 *
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="pengguna")
 * @ApiResource(normalizationContext={"groups"={"get"}})
 * @ApiFilter(OrderFilter::class, properties={"username", "password", "nama", "nip_nim", "jabatan_lembaga", "ym", "skype", "alamat", "kode_wilayah", "no_telepon", "no_hp", "aktif", "ptk_id", "peran_id", "lembaga_id", "yayasan_id", "la_id", "dudi_id", "roles", "soft_delete", "updater_id"}, arguments={"orderParameterName"="order"})
 * @ApiFilter(SearchFilter::class, properties={"username":"partial", "password":"partial", "nama":"partial", "nip_nim":"partial", "jabatan_lembaga":"partial", "ym":"partial", "skype":"partial", "alamat":"partial", "kode_wilayah":"partial", "no_telepon":"partial", "no_hp":"partial", "aktif":"exact", "ptk_id":"partial", "peran_id":"exact", "lembaga_id":"partial", "yayasan_id":"partial", "la_id":"partial", "dudi_id":"partial", "roles":"partial", "soft_delete":"exact", "updater_id":"partial"})
 */
class Pengguna implements UserInterface, \Serializable
{
    const ROLE_SUPERADMIN = 'ROLE_SUPERADMIN';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_OPERATOR = 'ROLE_OPERATOR';
    const DEFAULT_ROLES = [self::ROLE_OPERATOR];

    /**
     * @var uuid
     *
     * @ORM\Id
     * @ORM\Column(name="pengguna_id", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $id;

    /**
     * @var Sekolah
     *
     * @ORM\ManyToOne(targetEntity="Sekolah", inversedBy="penggunas")
     * @ORM\JoinColumn(name="sekolah_id", referencedColumnName="sekolah_id",  nullable=true)
     * @Groups({"get"})
     */
    public $sekolah;

    /**
     * @var uuid
     *
     * @ORM\Column(name="sekolah_id", type="guid",  nullable=true)
     * @Groups({"get"})
     */
    public $sekolah_id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=60)
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50)
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $password;

    /**
     * @var string
     *
     * @ORM\Column(name="nama", type="string", length=100)
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $nama;

    /**
     * @var string
     *
     * @ORM\Column(name="nip_nim", type="string", length=18,  nullable=true)
     * @Groups({"get"})
     */
    public $nip_nim;

    /**
     * @var string
     *
     * @ORM\Column(name="jabatan_lembaga", type="string", length=25,  nullable=true)
     * @Groups({"get"})
     */
    public $jabatan_lembaga;

    /**
     * @var string
     *
     * @ORM\Column(name="ym", type="string", length=20,  nullable=true)
     * @Groups({"get"})
     */
    public $ym;

    /**
     * @var string
     *
     * @ORM\Column(name="skype", type="string", length=20,  nullable=true)
     * @Groups({"get"})
     */
    public $skype;

    /**
     * @var string
     *
     * @ORM\Column(name="alamat", type="string", length=80,  nullable=true)
     * @Groups({"get"})
     */
    public $alamat;

    /**
     * @var string
     *
     * @ORM\Column(name="kode_wilayah", type="string", length=8)
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $kode_wilayah;

    /**
     * @var string
     *
     * @ORM\Column(name="no_telepon", type="string", length=20,  nullable=true)
     * @Groups({"get"})
     */
    public $no_telepon;

    /**
     * @var string
     *
     * @ORM\Column(name="no_hp", type="string", length=20,  nullable=true)
     * @Groups({"get"})
     */
    public $no_hp;

    /**
     * @var string
     *
     * @ORM\Column(name="aktif", type="string")
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $aktif;

    /**
     * @var string
     *
     * @ORM\Column(name="ptk_id", type="string", length=36,  nullable=true)
     * @Groups({"get"})
     */
    public $ptk_id;

    /**
     * @var int
     *
     * @ORM\Column(name="peran_id", type="integer")
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $peran_id;

    /**
     * @var string
     *
     * @ORM\Column(name="lembaga_id", type="string", length=36,  nullable=true)
     * @Groups({"get"})
     */
    public $lembaga_id;

    /**
     * @var string
     *
     * @ORM\Column(name="yayasan_id", type="string", length=36,  nullable=true)
     * @Groups({"get"})
     */
    public $yayasan_id;

    /**
     * @var string
     *
     * @ORM\Column(name="la_id", type="string", length=5,  nullable=true)
     * @Groups({"get"})
     */
    public $la_id;

    /**
     * @var string
     *
     * @ORM\Column(name="dudi_id", type="string", length=36,  nullable=true)
     * @Groups({"get"})
     */
    public $dudi_id;

    /**
     * @var string
     *
     * @ORM\Column(name="create_date", type="datetime")
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $create_date;

    /**
     * @var string
     *
     * @ORM\Column(type="simple_array", length=200)
     * @Groups({"get"})
     */
    public $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="last_update", type="datetime")
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $last_update;

    /**
     * @var string
     *
     * @ORM\Column(name="soft_delete", type="string")
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $soft_delete;

    /**
     * @var string
     *
     * @ORM\Column(name="last_sync", type="datetime")
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $last_sync;

    /**
     * @var string
     *
     * @ORM\Column(name="updater_id", type="string", length=36)
     * @Assert\NotNull
     * @Groups({"get"})
     */
    public $updater_id;

    /**
     * @var Foto[] Available fotos for this pengguna.
     *
     * @ORM\OneToMany(targetEntity="Foto", mappedBy="pengguna")
     * @Groups({"get"})
     */
    public $fotos;

    /**
     * @var Geotag[] Available geotags for this pengguna.
     *
     * @ORM\OneToMany(targetEntity="Geotag", mappedBy="pengguna")
     * @Groups({"get"})
     */
    public $geotags;

    public function __construct() {
        $this->fotos = new ArrayCollection();
        $this->geotags = new ArrayCollection();
}

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSekolah(): Sekolah
    {
        return $this->sekolah;
    }

    public function setSekolah(Sekolah $sekolah): self
    {
        $this->sekolah = $sekolah;
        return $this;
    }

    public function getSekolahId()
    {
        return $this->sekolah_id;
    }

    public function setSekolahId($sekolah_id)
    {
        $this->sekolah_id = $sekolah_id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNipNim()
    {
        return $this->nip_nim;
    }

    public function setNipNim($nip_nim)
    {
        $this->nip_nim = $nip_nim;
    }

    public function getJabatanLembaga()
    {
        return $this->jabatan_lembaga;
    }

    public function setJabatanLembaga($jabatan_lembaga)
    {
        $this->jabatan_lembaga = $jabatan_lembaga;
    }

    public function getYm()
    {
        return $this->ym;
    }

    public function setYm($ym)
    {
        $this->ym = $ym;
    }

    public function getSkype()
    {
        return $this->skype;
    }

    public function setSkype($skype)
    {
        $this->skype = $skype;
    }

    public function getAlamat()
    {
        return $this->alamat;
    }

    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }

    public function getKodeWilayah()
    {
        return $this->kode_wilayah;
    }

    public function setKodeWilayah($kode_wilayah)
    {
        $this->kode_wilayah = $kode_wilayah;
    }

    public function getNoTelepon()
    {
        return $this->no_telepon;
    }

    public function setNoTelepon($no_telepon)
    {
        $this->no_telepon = $no_telepon;
    }

    public function getNoHp()
    {
        return $this->no_hp;
    }

    public function setNoHp($no_hp)
    {
        $this->no_hp = $no_hp;
    }

    public function getAktif()
    {
        return $this->aktif;
    }

    public function setAktif($aktif)
    {
        $this->aktif = $aktif;
    }

    public function getPtkId()
    {
        return $this->ptk_id;
    }

    public function setPtkId($ptk_id)
    {
        $this->ptk_id = $ptk_id;
    }

    public function getPeranId()
    {
        return $this->peran_id;
    }

    public function setPeranId($peran_id)
    {
        $this->peran_id = $peran_id;
    }

    public function getLembagaId()
    {
        return $this->lembaga_id;
    }

    public function setLembagaId($lembaga_id)
    {
        $this->lembaga_id = $lembaga_id;
    }

    public function getYayasanId()
    {
        return $this->yayasan_id;
    }

    public function setYayasanId($yayasan_id)
    {
        $this->yayasan_id = $yayasan_id;
    }

    public function getLaId()
    {
        return $this->la_id;
    }

    public function setLaId($la_id)
    {
        $this->la_id = $la_id;
    }

    public function getDudiId()
    {
        return $this->dudi_id;
    }

    public function setDudiId($dudi_id)
    {
        $this->dudi_id = $dudi_id;
    }

    public function getCreateDate()
    {
        return $this->create_date;
    }

    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function getLastUpdate()
    {
        return $this->last_update;
    }

    public function setLastUpdate($last_update)
    {
        $this->last_update = $last_update;
    }

    public function getSoftDelete()
    {
        return $this->soft_delete;
    }

    public function setSoftDelete($soft_delete)
    {
        $this->soft_delete = $soft_delete;
    }

    public function getLastSync()
    {
        return $this->last_sync;
    }

    public function setLastSync($last_sync)
    {
        $this->last_sync = $last_sync;
    }

    public function getUpdaterId()
    {
        return $this->updater_id;
    }

    public function setUpdaterId($updater_id)
    {
        $this->updater_id = $updater_id;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized, array('allowed_classes' => false));
    }
}