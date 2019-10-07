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

/**
 * StatusGeotag.
 *
 * @ORM\Entity
 * @ORM\Table(name="ref.status_geotag")
 * @ApiResource(normalizationContext={"groups"={"status_geotag"}})
 * @ApiFilter(OrderFilter::class, properties={"status_geotag_id", "nama_status_geotag"}, arguments={"orderParameterName"="order"})
 * @ApiFilter(SearchFilter::class, properties={"status_geotag_id":"exact", "nama_status_geotag":"partial"})
 */
class StatusGeotag
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="status_geotag_id", type="smallint")
     * @Assert\NotNull
     * @Groups({"status_geotag", "geotag"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nama_status_geotag", type="string", length=20,  nullable=true)
     * @Groups({"status_geotag", "geotag"})
     */
    private $nama_status_geotag;

    /**
     * @var Geotag[] Available geotags for this status_geotag.
     *
     * @ORM\OneToMany(targetEntity="Geotag", mappedBy="status_geotag")
     * @Groups({"status_geotag"})
     */
    private $geotags;

    public function __construct() {
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

    public function getNamaStatusGeotag()
    {
        return $this->nama_status_geotag;
    }

    public function setNamaStatusGeotag($nama_status_geotag)
    {
        $this->nama_status_geotag = $nama_status_geotag;
    }
}