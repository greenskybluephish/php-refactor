<?php
require_once('MovieCategoryFactory.php');

class Movie
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var MovieCategoryInterface
     */
    private $movieCategory;

    public function __construct(string $name, string $category)
    {
        $this->name = $name;
        $this->setCategory($category);
    }

    private function setCategory(string $category): void 
    {
        $factory = new MovieCategoryFactory($category);
        $this->movieCategory = $factory->create();
    }

    public function name(): string
    {
        return $this->name;
    }

    public function movieCategory(): MovieCategoryInterface
    {
        return $this->movieCategory;
    }

}










