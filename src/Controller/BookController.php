<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\Annotations as Rest;

class BookController extends AbstractController
{

    /**
     * @Rest\View(serializerGroups={"book"})
     * @Route("/books.json", name="books_json", methods={"GET"})
     */
    public function books(Request $request)
    {

        $query = "";

        if ($request->query->get("q")){
        	$query = $request->query->get("q");

        }

       	$stmt = $this->get('doctrine')->getConnection()->prepare('SELECT * FROM books WHERE title LIKE :query OR isbn LIKE :query');
        $stmt->execute(array(":query" => "%".$query."%"));
        $books = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (!$books){
        	return "No books was found.";
        }
        return $books;
    }

    /**
     * @Rest\View(serializerGroups={"book"})
     * @Route("/book/{id}.json", name="book_json", methods={"GET"})
     */
    public function book($id)
    {

       	$stmt = $this->get('doctrine')->getConnection()->prepare("SELECT * FROM books WHERE ID=:id");
        $stmt->execute(array(":id" => $id));
        $book = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$book){
        	return "No book was found.";
        }
        return $book;
    }

    /**
     * @Rest\View(serializerGroups={"book","author"})
     * @Route("/book/authors/{id}.json", name="book_authors_json", methods={"GET"})
     */
    public function bookAuthors($id)
    {

       	$stmt = $this->get('doctrine')->getConnection()->prepare("SELECT b.id as id, b.name as name, b.biography as biography FROM authors_books a LEFT JOIN authors b ON (a.author_id=b.id) LEFT JOIN books c ON (c.id=a.book_id) WHERE a.book_id=:id");
        $stmt->execute(array(":id" => $id));
        $book_authors = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (!$book_authors){
        	return "No authors for this book was found.";
        }
        return $book_authors;
    }

    /**
     * @Rest\View(serializerGroups={"book","genre"})
     * @Route("/book/genres/{id}.json", name="book_genres_json", methods={"GET"})
     */
    public function bookGenres($id)
    {

       	$stmt = $this->get('doctrine')->getConnection()->prepare("SELECT a.name as genre FROM genres a LEFT JOIN books_genres b ON (b.genre_id=a.id) WHERE b.book_id=:id ");
        $stmt->execute(array(":id" => $id));
        $book_genres = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (!$book_genres){
        	return "No genre for this book was found.";
        }
        return $book_genres;
    }
}
