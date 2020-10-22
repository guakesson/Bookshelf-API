# Odd-Hill-API

## List all books
GET /books.json
```bash
curl -X GET http://localhost:8000/books.json
```

Respons
```json
[
    {
        "id": "1",
        "title": "Harry Potter and the Chamber of Secrets",
        "isbn": "9781408855669",
        "description": "The Dursleys were so mean and hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he's packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike\n\nAnd strike it does. For in Harry's second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor, Gilderoy Lockhart, a spirit named Moaning Myrtle who haunts the girls' bathroom, and the unwanted attentions of Ron Weasley's younger sister, Ginny.\n\nBut each of these seem minor annoyances when the real trouble begins, and someone -- or something -- starts turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects . . . Harry Potter himself?"
    },
]
```

## Get a single book by ID

GET /book/{id}.json
```bash
curl -X GET http://localhost:8000/book/9.json
```

Respons
```json
{
    "id": "9",
    "title": "The Lord of the Rings",
    "isbn": "9780007525546",
    "description": "One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkness bind them\n\nIn ancient times the Rings of Power were crafted by the Elven-smiths, and Sauron, the Dark Lord, forged the One Ring, filling it with his own power so that he could rule all others. But the One Ring was taken from him, and though he sought it throughout Middle-earth, it remained lost to him. After many ages it fell by chance into the hands of the hobbit Bilbo Baggins.\n\nFrom Sauron's fastness in the Dark Tower of Mordor, his power spread far and wide. Sauron gathered all the Great Rings to him, but always he searched for the One Ring that would complete his dominion.\n\nWhen Bilbo reached his eleventy-first birthday he disappeared, bequeathing to his young cousin Frodo the Ruling Ring and a perilous quest: to journey across Middle-earth, deep into the shadow of the Dark Lord, and destroy the Ring by casting it into the Cracks of Doom.\n\nThe Lord of the Rings tells of the great quest undertaken by Frodo and the Fellowship of the Ring: Gandalf the Wizard; the hobbits Merry, Pippin, and Sam; Gimli the Dwarf; Legolas the Elf; Boromir of Gondor; and a tall, mysterious stranger called Strider."
}
```

## Search for books by ISBN or Title
GET /books.json?q=query
```bash
curl -X GET http://localhost:8000/books.json?q=ings
```

Respons
```json
[
    {
        "id": "9",
        "title": "The Lord of the Rings",
        "isbn": "9780007525546",
        "description": "One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkness bind them\n\nIn ancient times the Rings of Power were crafted by the Elven-smiths, and Sauron, the Dark Lord, forged the One Ring, filling it with his own power so that he could rule all others. But the One Ring was taken from him, and though he sought it throughout Middle-earth, it remained lost to him. After many ages it fell by chance into the hands of the hobbit Bilbo Baggins.\n\nFrom Sauron's fastness in the Dark Tower of Mordor, his power spread far and wide. Sauron gathered all the Great Rings to him, but always he searched for the One Ring that would complete his dominion.\n\nWhen Bilbo reached his eleventy-first birthday he disappeared, bequeathing to his young cousin Frodo the Ruling Ring and a perilous quest: to journey across Middle-earth, deep into the shadow of the Dark Lord, and destroy the Ring by casting it into the Cracks of Doom.\n\nThe Lord of the Rings tells of the great quest undertaken by Frodo and the Fellowship of the Ring: Gandalf the Wizard; the hobbits Merry, Pippin, and Sam; Gimli the Dwarf; Legolas the Elf; Boromir of Gondor; and a tall, mysterious stranger called Strider."
    },
    {
        "id": "16",
        "title": "Tiny Pretty Things",
        "isbn": "9780062342409",
        "description": "Black Swan meets Pretty Little Liars in this soapy, drama-packed novel featuring diverse characters who will do anything to be the prima at their elite ballet school.\n\nGigi, Bette, and June, three top students at an exclusive Manhattan ballet school, have seen their fair share of drama. Free-spirited new girl Gigi just wants to dance\u2014but the very act might kill her. Privileged New Yorker Bette's desire to escape the shadow of her ballet-star sister brings out a dangerous edge in her. And perfectionist June needs to land a lead role this year or her controlling mother will put an end to her dancing dreams forever.\n\nWhen every dancer is both friend and foe, the girls will sacrifice, manipulate, and backstab to be the best of the best."
    }
]
```

## List all authors for a specific book
GET /book/authors/{bookId}.json
```bash
curl -X GET http://localhost:8000/book/authors/3.json
```
Respons
```json
[
    {
        "book_id": "3",
        "author_id": "1",
        "author_name": "J.K. Rowling",
        "author_biography": "Joanne Rowling, better known by her pen name J. K. Rowling, is a British novelist, screenwriter, producer, and philanthropist. She is best known for writing the Harry Potter fantasy series, which has won multiple awards and sold more than 500 million copies, becoming the best-selling book series in history. The Harry Potter books have also been the basis for the popular film series of the same name, over which Rowling had overall approval on the scripts and was a producer on the final films. She has also written under the pen name Robert Galbraith.",
        "book_title": "Fantastic Beasts and Where to Find Them"
    }
]
```

## List all authors

GET /authors.json
```bash
curl -X GET http://localhost:8000/authors.json
```

Respons
```json
[
    {
        "id": "1",
        "name": "J.K. Rowling",
        "biography": "Joanne Rowling, better known by her pen name J. K. Rowling, is a British novelist, screenwriter, producer, and philanthropist. She is best known for writing the Harry Potter fantasy series, which has won multiple awards and sold more than 500 million copies, becoming the best-selling book series in history. The Harry Potter books have also been the basis for the popular film series of the same name, over which Rowling had overall approval on the scripts and was a producer on the final films. She has also written under the pen name Robert Galbraith."
    },
]
```

## Get a single author by ID

GET /author/{id}.json
```bash
curl -X GET http://localhost:8000/author/2.json
```

Respons
```json
{
    "id": "2",
    "name": "Michael Crichton",
    "biography": "John Michael Crichton was an American author, screenwriter, and film director and producer best known for his work in the science fiction, thriller, and medical fiction genres. His books have sold over 200 million copies worldwide, and over a dozen have been adapted into films."
}
```

## Search for authors by name

GET /authors.json?q=query
```bash
curl -X GET http://localhost:8000/authors.json?q=j.
```

Respons
```json
[
    {
        "id": "1",
        "name": "J.K. Rowling",
        "biography": "Joanne Rowling, better known by her pen name J. K. Rowling, is a British novelist, screenwriter, producer, and philanthropist. She is best known for writing the Harry Potter fantasy series, which has won multiple awards and sold more than 500 million copies, becoming the best-selling book series in history. The Harry Potter books have also been the basis for the popular film series of the same name, over which Rowling had overall approval on the scripts and was a producer on the final films. She has also written under the pen name Robert Galbraith."
    },
    {
        "id": "4",
        "name": "J.R.R. Tolkien",
        "biography": "J.R.R. Tolkien was born on 3rd January 1892. After serving in the First World War, he became best known for The Hobbit and The Lord of the Rings, selling 150 million copies in more than 40 languages worldwide. Awarded the CBE and an honorary Doctorate of Letters from Oxford University, he died in 1973 at the age of 81."
    }
]
```

##  List all books for a specific author

GET /author/books/{authorId}.json
```bash
curl -X GET http://localhost:8000/author/books/9.json
```
Respons
```json
[
    {
        "book_id": "14",
        "book_isbn": "9781847493729",
        "book_title": "The Picture of Dorian Gray",
        "author_id": "9",
        "author_name": "Oscar Wilde",
        "author_biography": "Oscar Fingal O'Flahertie Wills Wilde was an Irish poet and playwright. After writing in different forms throughout the 1880s, he became one of London's most popular playwrights in the early 1890s. He is best remembered for his epigrams and plays, his novel The Picture of Dorian Gray, and the circumstances of his criminal conviction for \"gross indecency\", imprisonment, and early death at age 46."
    }
]
```
