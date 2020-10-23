<?php
namespace App\Entity;

use JMS\Serializer\Annotation as JML;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="genres")
 * @ORM\HasLifecycleCallbacks
 */
class Genre
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @JML\Groups({"genre"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @JML\Groups({"genre"})
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $name;


    public function __construct()
    {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    public function getName() {
        return $this->name;
    }




    
}