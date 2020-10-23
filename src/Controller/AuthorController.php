<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\Annotations as Rest;

class AuthorController extends AbstractController
{

    /**
     * @Rest\View(serializerGroups={"author"})
     * @Route("/authors.json", name="authors_json", methods={"GET"})
     */
    public function authors(Request $request)
    {

        $query = "";

        if ($request->query->get("q")){
        	$query = $request->query->get("q");

        }

       	$stmt = $this->get('doctrine')->getConnection()->prepare("SELECT * FROM authors WHERE name LIKE :query");
        $stmt->execute(array(":query" => "%".$query."%"));
        $authors = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (!$authors){
        	return "No authors was found.";
        }
        return $authors;
    }

    /**
     * @Rest\View(serializerGroups={"author"})
     * @Route("/author/{id}.json", name="author_json", methods={"GET"})
     */
    public function author($id)
    {
    	
       	$stmt = $this->get('doctrine')->getConnection()->prepare("SELECT * FROM authors WHERE ID=:id");
        $stmt->execute(array(":id" => $id));
        $author = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$author){
        	return "No author was found.";
        }
        return $author;
    }

    /**
     * @Rest\View(serializerGroups={"book","authors"})
     * @Route("/author/books/{id}.json", name="author_books_json", methods={"GET"})
     */
    public function authorBooks($id)
    {
    	
       	$stmt = $this->get('doctrine')->getConnection()->prepare("SELECT c.id as id, c.isbn as isbn, c.title as title, c.description as description FROM authors_books a LEFT JOIN authors b ON (a.author_id=b.id) LEFT JOIN books c ON (c.id=a.book_id) WHERE a.author_id=:id");
        $stmt->execute(array(":id" => $id));
        $book_authors = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (!$book_authors){
        	return "No books for this author was found.";
        }
        return $book_authors;
    }
}
