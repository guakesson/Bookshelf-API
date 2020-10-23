<?php
namespace App\Entity;

use JMS\Serializer\Annotation as JML;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="books")
 * @ORM\HasLifecycleCallbacks
 */
class Book
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @JML\Groups({"book"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @JML\Groups({"book"})
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $title;

    /**
     * @JML\Groups({"book"})
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $isbn;

    /**
     * @JML\Groups({"book"})
     * @ORM\Column(type="text", length=65000, nullable=false)
     */
    protected $description;

    public function __construct()
    {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }
    public function getTitle() {
        return $this->title;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
        return $this;
    }
    public function getIsbn() {
        return $this->isbn;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }
    public function getDescription() {
        return $this->description;
    }



    
}