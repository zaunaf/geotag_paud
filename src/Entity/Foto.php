<?php

// api/src/Entity/Foto.php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Annotation\GeneratedValue;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * Foto.
 *
 * @ORM\Entity
 * @ORM\Table(name="foto")
 * @ApiResource(normalizationContext={"groups"={"foto"}})
 * @ApiFilter(OrderFilter::class, properties={"jenis_foto_id", "judul", "tinggi_pixel", "lebar_pixel", "ukuran", "lintang", "bujur", }, arguments={"orderParameterName"="order"})
 * @ApiFilter(SearchFilter::class, properties={"jenis_foto_id":"exact", "judul":"partial", "tinggi_pixel":"exact", "lebar_pixel":"exact", "ukuran":"exact", "lintang":"exact", "bujur":"exact", })
 */
class Foto
{

    /**
     * @var uuid
     *
     * @ORM\Id
     * @ORM\Column(name="foto_id", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     * @Assert\NotNull
     * @Groups({"foto"})
     */
    private $id;

    /**
     * @var JenisFoto
     *
     * @ORM\ManyToOne(targetEntity="JenisFoto", inversedBy="fotos")
     * @ORM\JoinColumn(name="jenis_foto_id", referencedColumnName="jenis_foto_id")
     * @Groups({"foto"})
     */
    private $jenis_foto;

    /**
     * @var int
     *
     * @ORM\Column(name="jenis_foto_id", type="smallint")
     * @Assert\NotNull
     * @Groups({"foto"})
     */
    private $jenis_foto_id;

    /**
     * @var Sekolah
     *
     * @ORM\ManyToOne(targetEntity="Sekolah", inversedBy="fotos")
     * @ORM\JoinColumn(name="sekolah_id", referencedColumnName="sekolah_id")
     * @Groups({"foto"})
     */
    private $sekolah;

    /**
     * @var uuid
     *
     * @ORM\Column(name="sekolah_id", type="guid")
     * @Assert\NotNull
     * @Groups({"foto"})
     */
    private $sekolah_id;

    /**
     * @var Pengguna
     *
     * @ORM\ManyToOne(targetEntity="Pengguna", inversedBy="fotos")
     * @ORM\JoinColumn(name="pengguna_id", referencedColumnName="pengguna_id")
     * @Groups({"foto"})
     */
    private $pengguna;

    /**
     * @var uuid
     *
     * @ORM\Column(name="pengguna_id", type="guid")
     * @Assert\NotNull
     * @Groups({"foto"})
     */
    private $pengguna_id;

    /**
     * @var string
     *
     * @ORM\Column(name="judul", type="string", length=250,  nullable=true)
     * @Groups({"foto"})
     */
    private $judul;

    /**
     * @var string
     *
     * @ORM\Column(name="tgl_pengambilan", type="datetime",  nullable=true)
     * @Groups({"foto"})
     */
    private $tgl_pengambilan;

    /**
     * @var int
     *
     * @ORM\Column(name="tinggi_pixel", type="integer",  nullable=true)
     * @Groups({"foto"})
     */
    private $tinggi_pixel;

    /**
     * @var int
     *
     * @ORM\Column(name="lebar_pixel", type="integer",  nullable=true)
     * @Groups({"foto"})
     */
    private $lebar_pixel;

    /**
     * @var int
     *
     * @ORM\Column(name="ukuran", type="integer",  nullable=true)
     * @Groups({"foto"})
     */
    private $ukuran;

    /**
     * @var string
     *
     * @ORM\Column(name="lintang", type="string",  nullable=true)
     * @Groups({"foto"})
     */
    private $lintang;

    /**
     * @var string
     *
     * @ORM\Column(name="bujur", type="string",  nullable=true)
     * @Groups({"foto"})
     */
    private $bujur;

    /**
     * @var string
     *
     * @ORM\Column(name="tgl_pengiriman", type="datetime",  nullable=true)
     * @Groups({"foto"})
     */
    private $tgl_pengiriman;

    public function __construct() {
}

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getJenisFoto(): JenisFoto
    {
        return $this->jenis_foto;
    }

    public function setJenisFoto(JenisFoto $jenis_foto): self
    {
        $this->jenis_foto = $jenis_foto;
        return $this;
    }

    public function getJenisFotoId()
    {
        return $this->jenis_foto_id;
    }

    public function setJenisFotoId($jenis_foto_id)
    {
        $this->jenis_foto_id = $jenis_foto_id;
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

    public function getPengguna(): Pengguna
    {
        return $this->pengguna;
    }

    public function setPengguna(Pengguna $pengguna): self
    {
        $this->pengguna = $pengguna;
        return $this;
    }

    public function getPenggunaId()
    {
        return $this->pengguna_id;
    }

    public function setPenggunaId($pengguna_id)
    {
        $this->pengguna_id = $pengguna_id;
    }

    public function getJudul()
    {
        return $this->judul;
    }

    public function setJudul($judul)
    {
        $this->judul = $judul;
    }

    public function getTglPengambilan()
    {
        return $this->tgl_pengambilan;
    }

    public function setTglPengambilan($tgl_pengambilan)
    {
        $this->tgl_pengambilan = $tgl_pengambilan;
    }

    public function getTinggiPixel()
    {
        return $this->tinggi_pixel;
    }

    public function setTinggiPixel($tinggi_pixel)
    {
        $this->tinggi_pixel = $tinggi_pixel;
    }

    public function getLebarPixel()
    {
        return $this->lebar_pixel;
    }

    public function setLebarPixel($lebar_pixel)
    {
        $this->lebar_pixel = $lebar_pixel;
    }

    public function getUkuran()
    {
        return $this->ukuran;
    }

    public function setUkuran($ukuran)
    {
        $this->ukuran = $ukuran;
    }

    public function getLintang()
    {
        return $this->lintang;
    }

    public function setLintang($lintang)
    {
        $this->lintang = $lintang;
    }

    public function getBujur()
    {
        return $this->bujur;
    }

    public function setBujur($bujur)
    {
        $this->bujur = $bujur;
    }

    public function getTglPengiriman()
    {
        return $this->tgl_pengiriman;
    }

    public function setTglPengiriman($tgl_pengiriman)
    {
        $this->tgl_pengiriman = $tgl_pengiriman;
    }
}