<?php

// api/src/Entity/Geotag.php

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
 * Geotag.
 *
 * @ORM\Entity
 * @ORM\Table(name="geotag")
 * @ApiResource(normalizationContext={"groups"={"geotag"}})
 * @ApiFilter(OrderFilter::class, properties={"status_geotag_id", "lintang", "bujur", "petugas_link", "sekolah_link", "status_tag"}, arguments={"orderParameterName"="order"})
 * @ApiFilter(SearchFilter::class, properties={"status_geotag_id":"exact", "lintang":"exact", "bujur":"exact", "petugas_link":"partial", "sekolah_link":"partial", "status_tag":"exact"})
 */
class Geotag
{



    /**
     * @var uuid
     *
     * @ORM\Id
     * @ORM\Column(name="geotag_id", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     * @Assert\NotNull
     * @Groups({"geotag"})
     */
    private $id;


    /**
     * @var Sekolah
     *
     * @ORM\ManyToOne(targetEntity="Sekolah", inversedBy="geotags")
     * @ORM\JoinColumn(name="sekolah_id", referencedColumnName="sekolah_id")
     * @Assert\NotNull
     * @Groups({"geotag"})
     */
    private $sekolah;


    /**
     * @var StatusGeotag
     *
     * @ORM\ManyToOne(targetEntity="StatusGeotag", inversedBy="geotags")
     * @ORM\JoinColumn(name="status_geotag_id", referencedColumnName="status_geotag_id")
     * @Assert\NotNull
     * @Groups({"geotag"})
     */
    private $status_geotag;


    /**
     * @var Pengguna
     *
     * @ORM\ManyToOne(targetEntity="Pengguna", inversedBy="geotags")
     * @ORM\JoinColumn(name="pengguna_id", referencedColumnName="pengguna_id")
     * @Assert\NotNull
     * @Groups({"geotag"})
     */
    private $pengguna;


    /**
     * @var string
     *
     * @ORM\Column(name="tgl_pengambilan", type="datetime",  nullable=true)
     * @Groups({"geotag"})
     */
    private $tgl_pengambilan;


    /**
     * @var string
     *
     * @ORM\Column(name="lintang", type="string",  nullable=true)
     * @Groups({"geotag"})
     */
    private $lintang;


    /**
     * @var string
     *
     * @ORM\Column(name="bujur", type="string",  nullable=true)
     * @Groups({"geotag"})
     */
    private $bujur;


    /**
     * @var string
     *
     * @ORM\Column(name="petugas_link", type="string", length=16,  nullable=true)
     * @Groups({"geotag"})
     */
    private $petugas_link;


    /**
     * @var string
     *
     * @ORM\Column(name="sekolah_link", type="string", length=16,  nullable=true)
     * @Groups({"geotag"})
     */
    private $sekolah_link;


    /**
     * @var string
     *
     * @ORM\Column(name="tgl_pengiriman", type="datetime",  nullable=true)
     * @Groups({"geotag"})
     */
    private $tgl_pengiriman;


    /**
     * @var int
     *
     * @ORM\Column(name="status_tag", type="smallint",  nullable=true)
     * @Groups({"geotag"})
     */
    private $status_tag;


    public function __construct() {
}
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
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

    public function setTglPengambilan($tgl_pengambilan)
    {
        $this->tgl_pengambilan = $tgl_pengambilan;
    }

    public function getTglPengambilan()
    {
        return $this->tgl_pengambilan;
    }

    public function setLintang($lintang)
    {
        $this->lintang = $lintang;
    }

    public function getLintang()
    {
        return $this->lintang;
    }

    public function setBujur($bujur)
    {
        $this->bujur = $bujur;
    }

    public function getBujur()
    {
        return $this->bujur;
    }

    public function setPetugasLink($petugas_link)
    {
        $this->petugas_link = $petugas_link;
    }

    public function getPetugasLink()
    {
        return $this->petugas_link;
    }

    public function setSekolahLink($sekolah_link)
    {
        $this->sekolah_link = $sekolah_link;
    }

    public function getSekolahLink()
    {
        return $this->sekolah_link;
    }

    public function setTglPengiriman($tgl_pengiriman)
    {
        $this->tgl_pengiriman = $tgl_pengiriman;
    }

    public function getTglPengiriman()
    {
        return $this->tgl_pengiriman;
    }

    public function setStatusTag($status_tag)
    {
        $this->status_tag = $status_tag;
    }

    public function getStatusTag()
    {
        return $this->status_tag;
    }


}