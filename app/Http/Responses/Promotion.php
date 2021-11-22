<?php


namespace App\Http\Responses;


class Promotion implements \JsonSerializable
{
    private $data;
    private $options;
    private $items_per_page;
    private $next_page;
    private $count;
    private $pagination;
    private $current_page;
    private $total_pages;
    private $ordered;


    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    public function getOptions(){
        return $this->options;
    }

    public function jsonSerialize()
    {
        return [$this->data];
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @param mixed $items_per_page
     */
    public function setItemsPerPage($items_per_page): void
    {
        $this->options['items_per_page'] = $items_per_page;
    }

    /**
     * @param mixed $next_page
     */
    public function setNextPage($next_page): void
    {
        $this->next_page = $next_page;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count): void
    {
        $this->count = $count;
    }

    /**
     * @param mixed $pagination
     */
    public function setPagination($pagination): void
    {
        $this->pagination = $pagination;
    }

    /**
     * @param mixed $current_page
     */
    public function setCurrentPage($current_page): void
    {
        $this->current_page = $current_page;
    }

    /**
     * @param mixed $total_pages
     */
    public function setTotalPages($total_pages): void
    {
        $this->total_pages = $total_pages;
    }

    /**
     * @param mixed $ordered
     */
    public function setOrdered($ordered): void
    {
        $this->ordered = $ordered;
    }

}
