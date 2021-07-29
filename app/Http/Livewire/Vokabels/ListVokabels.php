<?php

namespace App\Http\Livewire\Vokabels;

use Livewire\Component;
use \App\Models\Vokabel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListVokabels extends Component
{
    public $vokabels = [];
    public $total_vokabels = 0;
    public $last_page = 1;
    public $current_page = 1;
    public $page_start = 1;
    public $page_end = 1;

    public $updates = [];
    public $search = "";
    public $page = 1;

    public $showAdd = false;

    protected $listeners = [
    "addVokabel" => 'toggleAdd',
    "removeVokabel" => '$refresh'
  ];

    public function remove($id)
    {
        $vokabel = Vokabel::find($id);
        $vokabel->delete();
    }

    public function toggleAdd()
    {
        $this->showAdd = !$this->showAdd;
    }

    public function nextPage()
    {
        if ($this->page < $this->last_page) {
            $this->page += 1;
        } else {
            $this->page = $this->last_page;
        }
    }
    public function previousPage()
    {
        if ($this->page > 1) {
            $this->page -= 1;
        } else {
            $this->page = 1;
        }
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    private function getVokabels()
    {
        return Vokabel::where([["word", "LIKE", "%" . $this->search . "%"]])
                ->leftJoin("user_stats", function ($query) {
                    $query->on("user_stats.vokabel_id", "=", "vokabels.id")->where("user_stats.user_id", Auth::id());
                })
                ->orderBy("counter")
                ->orderBy("word")
                ->paginate(15, ["vokabels.*", "user_stats.counter as counter"], 'page', $this->page);
    }

    public function render()
    {
        try {
            $pagination = $this->getVokabels();

            if ($pagination->lastPage() < $this->page) {
                $this->page = $pagination->lastPage();
                $pagination = $this->getVokabels();
            }


            $this->vokabels = $pagination->items();
            $this->current_page = $pagination->currentPage();
            $this->total_vokabels = $pagination->total();
            $this->last_page = $pagination->lastPage();

            $this->page_start = $pagination->currentPage() > 3 ? $pagination->currentPage() - 2 : 2;
            $this->page_end =  $pagination->currentPage() + 3 < $pagination->lastPage() ? $pagination->currentPage() + 3 : $pagination->lastPage()-1;
        } catch (\Exception $e) {
            // we don't need to do anything, because we initalize the values to the default
        }
        // dd($this->vokabels);
        return view('vokabels.list-vokabels');
    }
}
