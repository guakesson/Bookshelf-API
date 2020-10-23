<?php
namespace App\Entity;

use JMS\Serializer\Annotation as JML;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="authors")
 * @ORM\HasLifecycleCallbacks
 */
class Author
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @JML\Groups({"author"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @JML\Groups({"author"})
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @JML\Groups({"author"})
     * @ORM\Column(type="text", length=65000, nullable=false)
     */
    protected $biography;

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

    public function setBiography($biography) {
        $this->biography = $biography;
        return $this;
    }
    public function getBiography() {
        return $this->biography;
    }



    
}