<?php

// api/src/Entity/Geotag.php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Annotation\GeneratedValue;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * Geotag.
 *
 * @ORM\Entity(repositoryClass="App\Repository\GeotagRepository")
 * @ORM\Table(name="geotag")
 * @ApiResource(
 *     normalizationContext={"groups"={"get", "geotag"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"post"}}
 * )
 * @ApiFilter(OrderFilter::class, properties={"status_geotag_id", "lintang", "bujur", "petugas_link", "sekolah_link", "status_data"}, arguments={"orderParameterName"="order"})
 * @ApiFilter(SearchFilter::class, properties={"status_geotag_id":"exact", "lintang":"exact", "bujur":"exact", "petugas_link":"partial", "sekolah_link":"partial", "status_data":"exact"})
 */
class Geotag
{

    /**
     * @var uuid
     *
     * @ApiProperty(identifier=true)
     * @ORM\Id
     * @ORM\Column(name="geotag_id", type="guid")
     * @Assert\NotNull
     * @Groups({"get", "post", "geotag"})
     */
    public $geotag_id;

    /**
     * @var Sekolah
     *
     * @ORM\ManyToOne(targetEntity="Sekolah", inversedBy="geotags")
     * @ORM\JoinColumn(name="sekolah_id", referencedColumnName="sekolah_id")
     * @Groups({"get", "post", "geotag"})
     * @MaxDepth(1)
     */
    public $sekolah;

    /**
     * @var StatusGeotag
     *
     * @ORM\ManyToOne(targetEntity="StatusGeotag", inversedBy="geotags")
     * @ORM\JoinColumn(name="status_geotag_id", referencedColumnName="status_geotag_id")
     * @Groups({"get", "post", "geotag"})
     * @MaxDepth(1)
     */
    public $status_geotag;

    /**
     * @var Pengguna
     *
     * @ORM\ManyToOne(targetEntity="Pengguna", inversedBy="geotags")
     * @ORM\JoinColumn(name="pengguna_id", referencedColumnName="pengguna_id")
     * @Groups({"get", "post", "geotag"})
     * @MaxDepth(1)
     */
    public $pengguna;

    /**
     * @var string
     *
     * @ORM\Column(name="tgl_pengambilan", type="datetime",  nullable=true)
     * @Groups({"get", "post", "geotag"})
     */
    public $tgl_pengambilan;

    /**
     * @var string
     *
     * @ORM\Column(name="lintang", type="string",  nullable=true)
     * @Groups({"get", "post", "geotag"})
     */
    public $lintang;

    /**
     * @var string
     *
     * @ORM\Column(name="bujur", type="string",  nullable=true)
     * @Groups({"get", "post", "geotag"})
     */
    public $bujur;

    /**
     * @var string
     *
     * @ORM\Column(name="petugas_link", type="string", length=16,  nullable=true)
     * @Groups({"get", "post", "geotag"})
     */
    public $petugas_link;

    /**
     * @var string
     *
     * @ORM\Column(name="sekolah_link", type="string", length=16,  nullable=true)
     * @Groups({"get", "post", "geotag"})
     */
    public $sekolah_link;

    /**
     * @var string
     *
     * @ORM\Column(name="tgl_pengiriman", type="datetime",  nullable=true)
     * @Groups({"get", "post", "geotag"})
     */
    public $tgl_pengiriman;

    /**
     * @var int
     *
     * @ORM\Column(name="status_data", type="smallint",  nullable=true)
     * @Groups({"get", "post", "geotag"})
     */
    public $status_data;

    public function __construct() {
    }



    public function getGeotagId()
    {
        return $this->geotag_id;
    }

    public function setGeotagId($geotag_id)
    {
        $this->geotag_id = $geotag_id;
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

    public function getStatusGeotag(): StatusGeotag
    {
        return $this->status_geotag;
    }

    public function setStatusGeotag(StatusGeotag $status_geotag): self
    {
        $this->status_geotag = $status_geotag;
        return $this;
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

    public function getTglPengambilan()
    {
        return $this->tgl_pengambilan;
    }

    public function setTglPengambilan($tgl_pengambilan)
    {
        $this->tgl_pengambilan = $tgl_pengambilan;
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

    public function getPetugasLink()
    {
        return $this->petugas_link;
    }

    public function setPetugasLink($petugas_link)
    {
        $this->petugas_link = $petugas_link;
    }

    public function getSekolahLink()
    {
        return $this->sekolah_link;
    }

    public function setSekolahLink($sekolah_link)
    {
        $this->sekolah_link = $sekolah_link;
    }

    public function getTglPengiriman()
    {
        return $this->tgl_pengiriman;
    }

    public function setTglPengiriman($tgl_pengiriman)
    {
        $this->tgl_pengiriman = $tgl_pengiriman;
    }

    public function getStatusData()
    {
        return $this->status_data;
    }

    public function setStatusData($status_data)
    {
        $this->status_data = $status_data;
    }

}