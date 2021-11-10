<?php

namespace App;

class GildedRose
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItem($which = null)
    {
        return ($which === null
            ? $this->items
            : $this->items[$which]
        );
    }

    public function nextDay()
    {

            // new code
            foreach ($this->items as $item) {

                    if($item->name == 'Conjured')
                    {
                        $item->quality = $item->quality - 2;	
                    }
                    elseif($item->name == 'Aged Brie')
                    {
                        if($item->sellIn == 0)
                        {
                            $item->quality = 0;
                        }
                        elseif($item->sellIn <= 5)
                        {
                                $item->quality = $item->quality + 3;
                        }
                        elseif($item->sellIn <= 10) 
                        {
                            $item->quality = $item->quality + 2;		
                        }
                        else
                        {
                            $item->quality = $item->quality + 1;   
                        }
                    }
                    elseif
                    (
                        $item->name == 'Sulfuras' || 
                        $item->name == 'Backstage passes to a TAFKAL80ETC concert' ||
                        $item->name == 'Sulfuras, Hand of Ragnaros'
                    )
                    {
                       // no change
                    }	
                    else
                    {
                       
                       
                        if ($item->quality > 0) 
                        {    
                                if($item->sellIn < 0) 
                                {				
                                    $item->quality = $item->quality - 2;
                                }
                                else
                                {
                                    $item->quality = $item->quality - 1;	
                                }
                        }
                        else
                        {
                            // old code 
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                                if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                                    if ($item->sellIn < 11) {
                                        if ($item->quality < 50) {
                                            $item->quality = $item->quality + 1;
                                        }
                                    }
                                    if ($item->sellIn < 6) {
                                        if ($item->quality < 50) {
                                            $item->quality = $item->quality + 1;
                                        }
                                    }
                                }
                            }

                        }





                    }	


                    // general rules for quality (min-max)
                    if($item->quality < 0)$item->quality = 0;
                    if($item->quality > 50)$item->quality = 50;
                    if($item->name == 'Sulfuras')$item->quality = 80;


                    // from old code 
                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                        $item->sellIn = $item->sellIn - 1;
                    }
                

            }

    
}
