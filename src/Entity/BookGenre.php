<?php
namespace App\Entity;

use JMS\Serializer\Annotation as JML;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="books_genres")
 * @ORM\HasLifecycleCallbacks
 */
class BookGenre
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @JML\Groups({"produkter","activities"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \App\Entity\Book
     *
     * @JML\Groups({"produkter"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Book")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="book_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    protected $book;

    /**
     * @var \App\Entity\Genre
     *
     * @JML\Groups({"produkter"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="genre_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    protected $genre;

    
    public function __construct()
    {
        
    }

    
    public function getId() {
        return $this->id;
    }

    public function setBook(\App\Entity\Book $book) {
        $this->book = $book;
        return $this;
    }
    public function getBook() {
        return $this->book;
    }
    
    public function setGenre(\App\Entity\Genre $genre) {
        $this->genre = $genre;
        return $this;
    }
    public function getGenre() {
        return $this->genre;
    }


    
}