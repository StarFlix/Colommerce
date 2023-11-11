<?php 
// Start session 
if(!session_id()){ 
    session_start(); 
} 
 
class Cart { 
    protected $cart_contents = array(); 
     
    public function __construct(){ 
        $this->cart_contents = !empty($_SESSION['cart_contents'])?$_SESSION['cart_contents']:NULL; 
        if ($this->cart_contents === NULL){ 
            $this->cart_contents = array('cart_total' => 0, 'total_items' => 0); 
        } 
    } 
     
    public function contents(){ 
        $cart = array_reverse($this->cart_contents); 
 
        unset($cart['total_items']); 
        unset($cart['cart_total']); 
 
        return $cart; 
    } 
     
    public function get_item($row_id){ 
        return (in_array($row_id, array('total_items', 'cart_total'), TRUE) OR ! isset($this->cart_contents[$row_id])) 
            ? FALSE 
            : $this->cart_contents[$row_id]; 
    } 
     
    public function total_items(){ 
        return $this->cart_contents['total_items']; 
    } 
     
    public function total(){ 
        return $this->cart_contents['cart_total']; 
    } 
     
    public function insert($item = array()){ 
        if(!is_array($item) OR count($item) === 0){ 
            return FALSE; 
        }else{ 
            if(!isset($item['id'], $item['nombres'], $item['precio'], $item['cantidad'])){ 
                return FALSE; 
            }else{ 
                $item['cantidad'] = (float) $item['cantidad']; 
                if($item['cantidad'] == 0){ 
                    return FALSE; 
                } 
                $item['precio'] = (float) $item['precio']; 
                $rowid = md5($item['id']); 
                $old_qty = isset($this->cart_contents[$rowid]['cantidad']) ? (int) $this->cart_contents[$rowid]['cantidad'] : 0; 
                $item['rowid'] = $rowid; 
                $item['cantidad'] += $old_qty; 
                $this->cart_contents[$rowid] = $item; 
                 
                if($this->save_cart()){ 
                    return isset($rowid) ? $rowid : TRUE; 
                }else{ 
                    return FALSE; 
                } 
            } 
        } 
    } 
     
    public function update($item = array()){ 
        if (!is_array($item) OR count($item) === 0){ 
            return FALSE; 
        }else{ 
            if (!isset($item['rowid'], $this->cart_contents[$item['rowid']])){ 
                return FALSE; 
            }else{ 
                if(isset($item['cantidad'])){ 
                    $item['cantidad'] = (float) $item['cantidad']; 
                    if ($item['cantidad'] == 0){ 
                        unset($this->cart_contents[$item['rowid']]); 
                        return TRUE; 
                    } 
                } 
                 
                $keys = array_intersect(array_keys($this->cart_contents[$item['rowid']]), array_keys($item)); 
                if(isset($item['precio'])){ 
                    $item['precio'] = (float) $item['precio']; 
                } 
                foreach(array_diff($keys, array('id', 'nombre')) as $key){ 
                    $this->cart_contents[$item['rowid']][$key] = $item[$key]; 
                } 
                $this->save_cart(); 
                return TRUE; 
            } 
        } 
    } 
     
    protected function save_cart(){ 
        $this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0; 
        foreach ($this->cart_contents as $key => $val){ 
            if(!is_array($val) OR !isset($val['precio'], $val['cantidad'])){ 
                continue; 
            } 
      
            $this->cart_contents['cart_total'] += ($val['precio'] * $val['cantidad']); 
            $this->cart_contents['total_items'] += $val['cantidad']; 
            $this->cart_contents[$key]['subtotal'] = ($this->cart_contents[$key]['precio'] * $this->cart_contents[$key]['cantidad']); 
        } 
         
        if(count($this->cart_contents) <= 2){ 
            unset($_SESSION['cart_contents']); 
            return FALSE; 
        }else{ 
            $_SESSION['cart_contents'] = $this->cart_contents; 
            return TRUE; 
        } 
    } 
     
     public function remove($row_id){ 
        unset($this->cart_contents[$row_id]); 
        $this->save_cart(); 
        return TRUE; 
     } 
      
    public function destroy(){ 
        $this->cart_contents = array('cart_total' => 0, 'total_items' => 0); 
        unset($_SESSION['cart_contents']); 
    } 
}