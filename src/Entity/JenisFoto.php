<?php

// api/src/Entity/JenisFoto.php

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
 * JenisFoto.
 *
 * @ORM\Entity(repositoryClass="App\Repository\JenisFotoRepository")
 * @ORM\Table(name="ref.jenis_foto")
 * @ApiResource(
 *     normalizationContext={"groups"={"get", "jenis_foto"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"post"}}
 * )
 * @ApiFilter(OrderFilter::class, properties={"jenis_foto_id", "nama_jenis_foto", "instruksi", "status_isian"}, arguments={"orderParameterName"="order"})
 * @ApiFilter(SearchFilter::class, properties={"jenis_foto_id":"exact", "nama_jenis_foto":"partial", "instruksi":"partial", "status_isian":"exact"})
 */
class JenisFoto
{

    /**
     * @var int
     *
     * @ApiProperty(identifier=true)
     * @ORM\Id
     * @ORM\Column(name="jenis_foto_id", type="smallint")
     * @Assert\NotNull
     * @Groups({"get", "post", "jenis_foto", "foto"})
     */
    public $jenis_foto_id;

    /**
     * @var string
     *
     * @ORM\Column(name="nama_jenis_foto", type="string", length=140,  nullable=true)
     * @Groups({"get", "post", "jenis_foto", "foto"})
     */
    public $nama_jenis_foto;

    /**
     * @var string
     *
     * @ORM\Column(name="instruksi", type="text",  nullable=true)
     * @Groups({"get", "post", "jenis_foto", "foto"})
     */
    public $instruksi;

    /**
     * @var int
     *
     * @ORM\Column(name="status_isian", type="integer",  nullable=true)
     * @Groups({"get", "post", "jenis_foto", "foto"})
     */
    public $status_isian;

    /**
     * @var Foto[] Available fotos for this jenis_foto.
     *
     * @ORM\OneToMany(targetEntity="Foto", mappedBy="jenis_foto")
     * @Groups({"jenis_foto"})
     */
    public $fotos;

    public function __construct() {
        $this->fotos = new ArrayCollection();
    }



    public function getJenisFotoId()
    {
        return $this->jenis_foto_id;
    }

    public function setJenisFotoId($jenis_foto_id)
    {
        $this->jenis_foto_id = $jenis_foto_id;
    }

    public function getNamaJenisFoto()
    {
        return $this->nama_jenis_foto;
    }

    public function setNamaJenisFoto($nama_jenis_foto)
    {
        $this->nama_jenis_foto = $nama_jenis_foto;
    }

    public function getInstruksi()
    {
        return $this->instruksi;
    }

    public function setInstruksi($instruksi)
    {
        $this->instruksi = $instruksi;
    }

    public function getStatusIsian()
    {
        return $this->status_isian;
    }

    public function setStatusIsian($status_isian)
    {
        $this->status_isian = $status_isian;
    }


    public function getFotos(): Collection
    {
        return $this->fotos;
    }

    public function addFoto(Foto $foto)
    {
        $this->fotos->add($foto);
    }

    public function removeFoto(Foto $foto)
    {
        $this->fotos->removeElement($foto);
    }

}