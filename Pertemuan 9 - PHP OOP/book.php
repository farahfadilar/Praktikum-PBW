<?php

class Book
{
    private $code_book;
    private $name;
    private $qty;

    private function setCodeBook($code_book)
    {
        $this->code_book = $code_book;
    }
    public function getCodeBook()
    {
        $check = preg_match('/^[A-Z]{2}[0-9]{2}$/', $this->code_book);
        if ($check == 0) {
            return "Error";
        } else {
            return $this->code_book;
        }
    }

    private function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    private function setQty($qty)
    {
        $this->qty = $qty;
    }
    public function getQty()
    {
        if ($this->qty <= 0 ) {
            return "Error";
        } else {
            return $this->qty;
        }
    }

    public function __construct($code_book, $name, $qty)
    {
        $this->setCodeBook($code_book);
        $this->setName($name);
        $this->setQty($qty);
    }
}

$book_one = new Book("BB00", "PHP OOP", 100);

echo "Kode Buku: ";
echo $book_one->getCodeBook();
echo "<br>";
echo "Nama Buku: ";
echo $book_one->getName();
echo "<br>";
echo "Jumlah Buku: ";
echo $book_one->getQty();
echo "<br>";

?>