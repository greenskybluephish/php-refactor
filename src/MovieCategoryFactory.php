<?php

require_once('ChildrensMovieCategory.php');
require_once('RegularMovieCategory.php');
require_once('NewReleaseMovieCategory.php');

class MovieCategoryFactory
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function create(): MovieCategoryInterface
    {
         try {
                $movieCategory = new $this->name();
                if($movieCategory instanceof MovieCategoryInterface) {
                    return $movieCategory;
                }                
         } catch (\Throwable $ex) {
             throw new Exception("Category not found." . $ex);
         }
    }
}
