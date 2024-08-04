<?php

namespace App\Models;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	// public function add($item, $id){
	// 	$giohang = ['qty'=>0, 'price' =>0, 'item' => $item];
	// 	if($this->items){
	// 		if(array_key_exists($id, $this->items)){
	// 			$giohang = $this->items[$id];
	// 		}
	// 	}
	// 	$giohang['qty']++;
	// 	// if($item->promotion_price !=0){
	// 	// 	$giohang['price'] = $item->promotion_price * $giohang['qty'];
	// 	// }
	// 	// else{
    //     //     $giohang['price'] = $item->unit_price * $giohang['qty'];
	// 	// }
	// 	if ($item->promotion_price != null && $item->promotion_price != 0) {
	// 		// Sử dụng giá khuyến mãi
	// 		$giohang['price'] = $item->promotion_price * $giohang['qty'];
	// 	} else {
	// 		// Sử dụng giá gốc
	// 		$giohang['price'] = $item->unit_price * $giohang['qty'];
	// 	}
		
	// 	$this->items[$id] = $giohang;
	// 	$this->totalQty++;
	// 	$this->totalPrice += $item->unit_price;
	// }
	public function add($item, $id){
		$giohang = ['qty' => 0, 'price' => $item->unit_price, 'item' => $item];
	
		if ($this->items) {
			if (array_key_exists($id, $this->items)) {
				$giohang = $this->items[$id];
			}
		}
	
		$giohang['qty']++;
		if ($item->promotion_price != 0) {
			// Sử dụng giá khuyến mãi nếu có
			$giohang['price'] = $item->promotion_price*$giohang['qty'];
			$this->totalPrice += $item->promotion_price;
			// dd( $item->promotion_price );
		} else if($item->promotion_price == 0) {
			// Sử dụng giá gốc nếu không có giá khuyến mãi
			$giohang['price'] = $item->unit_price * $giohang['qty'];
			$this->totalPrice += $item->unit_price;
		}
		$this->items[$id] = $giohang;
		$this->totalQty++;
		
	}
	
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}


	//tăng 
	
    public function increaseQuantity($id)
    {
        if ($this->items[$id]['qty'] < 999) {
            $this->items[$id]['qty']++;
            if ($this->items[$id]['item']['promotion_price'] != 0) {
                $this->items[$id]['price'] += $this->items[$id]['item']['promotion_price'];
                $this->totalPrice += $this->items[$id]['item']['promotion_price'];
            } else {
                $this->items[$id]['price'] += $this->items[$id]['item']['unit_price'];
                $this->totalPrice += $this->items[$id]['item']['unit_price'];
            }
            $this->totalQty++;
        }
    }
     // giảm
    public function decreaseQuantity($id)
    {
        if ($this->items[$id]['qty'] > 1) {
            $this->items[$id]['qty']--;
            if ($this->items[$id]['item']['promotion_price'] != 0) {
                $this->items[$id]['price'] -= $this->items[$id]['item']['promotion_price'];
                $this->totalPrice -= $this->items[$id]['item']['promotion_price'];
            } else {
                $this->items[$id]['price'] -= $this->items[$id]['item']['unit_price'];
                $this->totalPrice -= $this->items[$id]['item']['unit_price'];
            }
            $this->totalQty--;
        }
    }

}
