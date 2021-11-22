<?php


namespace App\Utils;


class PaginateGo
{

    private $page = 0;
    private $offset = 0;
    private $resultPerPage = 10;
    private $items = 0;
    private static $pagesAvailable = [];
    private $linkPagesAvailable = [];

    public function __construct(int $page, int $resultPerPage, int $items)
    {
        $this->page = $page;
        $this->resultPerPage = $resultPerPage;
        $this->items = $items;
        $this->logic();
    }
    private function logic(){

        if($this->page<0 || $this->page == 1 || $this->page=='' || !is_numeric($this->page)){
            $this->offset = 0;
        }else {
            $this->offset = ($this->page - 1)*$this->resultPerPage;
        }

        if($this->resultPerPage < 1 || $this->resultPerPage > $this->items || $this->resultPerPage > 80){
            $this->resultPerPage = 20;
        }
    }
    public function setLinkPagesAvailable($items){
        for($i=1;$i<=$items;$i++){
            array_push($this->linkPagesAvailable, $i);
        }
    }

    public static function setPagesAvailable($items){
        for($i=1;$i<=$items;$i++){
            array_push(self::$pagesAvailable, $i);
        }
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getResultPerPage(): int
    {
        return $this->resultPerPage;
    }

    public function getTotalPages(): int{
        return ceil($this->items / $this->resultPerPage);
    }
    /**
     * getIndexToPagination will only work if setPagesAvailable is set
    */
    public function getIndexToPagination(int $limit): array{
        $page = $this->page;
        if($this->page == 0){
            $page = $this->page+1;//fix bug
        }

        return array_splice(PaginateGo::$pagesAvailable, $page, $limit);
    }

    public function getLinkPagesAvailable(int $limit): array{
        $page = $this->page;
        if($this->page == 0){
            $page = $this->page+1;//fix bug
        }

        return array_splice($this->linkPagesAvailable, $page, $limit);
    }
    public function hasNext(): bool{
        $totalPerPage = $this->getTotalPages();
        if($this->page >= $totalPerPage){
            return false;
        }else{
            return true;
        }
    }
}
