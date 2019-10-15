<?php

// api/src/Entity/StatusGeotag.php

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
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * StatusGeotag.
 *
 * @ORM\Entity
 * @ORM\Table(name="ref.status_geotag")
 * @ApiResource(
 *     normalizationContext={"groups"={"get", "status_geotag"}},
 *     denormalizationContext={"groups"={"post"}}
 * )
 * @ApiFilter(OrderFilter::class, properties={"status_geotag_id", "nama_status_geotag"}, arguments={"orderParameterName"="order"})
 * @ApiFilter(SearchFilter::class, properties={"status_geotag_id":"exact", "nama_status_geotag":"partial"})
 */
class StatusGeotag
{

    /**
     * @var int
     *
     * @ApiProperty(identifier=true)
     * @ORM\Id
     * @ORM\Column(name="status_geotag_id", type="smallint")
     * @Assert\NotNull
     * @Groups({"get", "post", "status_geotag", "geotag"})
     */
    public $status_geotag_id;

    /**
     * @var string
     *
     * @ORM\Column(name="nama_status_geotag", type="string", length=80,  nullable=true)
     * @Groups({"get", "post", "status_geotag", "geotag"})
     */
    public $nama_status_geotag;

    /**
     * @var Geotag[] Available geotags for this status_geotag.
     *
     * @ORM\OneToMany(targetEntity="Geotag", mappedBy="status_geotag")
     * @Groups({"status_geotag"})
     */
    public $geotags;

    public function __construct() {
        $this->geotags = new ArrayCollection();
    }



    public function getStatusGeotagId()
    {
        return $this->status_geotag_id;
    }

    public function setStatusGeotagId($status_geotag_id)
    {
        $this->status_geotag_id = $status_geotag_id;
    }

    public function getNamaStatusGeotag()
    {
        return $this->nama_status_geotag;
    }

    public function setNamaStatusGeotag($nama_status_geotag)
    {
        $this->nama_status_geotag = $nama_status_geotag;
    }
}