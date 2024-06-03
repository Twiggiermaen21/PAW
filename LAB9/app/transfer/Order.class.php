<?php

namespace app\transfer;

class Order
{
    public $book;
    public $autor;
    public $autor_book;
    public $sztuk;
    public $cena;
    public $tablica;
    
    public function __construct($book, $autor, $autor_book, $tablica, $sztuk, $cena)
    {
        $this->book = $book;
        $this->autor = $autor;
        $this->autor_book = $autor_book;
        $this->tablica = $tablica;
        $this->sztuk = $sztuk;
        $this->cena = $cena;
    }
}
