<?php
/**
 * A simple class php of browser info detection 
 *
 * Get :: Browser name,version,operating system(os)
 * 
 * Before used this class, below the prerequises : 
 * 
 * PHP 5 or newer
 * @author Hassane Moussa <mhassane2012@gmail.com>
 * @From Africa / Niamey-Niger
 * @License GPL
 */

class BrowserInfoDetection{
	
	private
	$agent="",
	$br="",
	$os="";
	
	/**
    * Constructor of the class
    */
    public function __construct()
    {
		$this->agent = $_SERVER['HTTP_USER_AGENT'];
    }
	
	public function action()
    {
		if ($this->fireFox()){echo $this->fireFox();}
		elseif($this->edge()){echo $this->edge();}
		elseif($this->chrome()){echo $this->chrome();}
		elseif($this->opera()){echo $this->opera();}
		elseif($this->ie()){echo $this->ie();}
		elseif($this->safari()){echo $this->safari();}
		else{echo $this->unknown();}
	}
	
	
	private function fireFox()
    {
		if(preg_match('/Firefox/i',$this->agent)==1) 
			$this->br = "The Browser ( <img src='img/mozilla.jpg' width=15 height=15> ) is Mozilla ".explode(" ",strpbrk($this->agent, 'F'))[0].$this->os();	
		return $this->br;
	}
	private function chrome()
    {
		if(preg_match('/Chrome/i',$this->agent)==1) 			
			$this->br = "The Browser ( <img src='img/chrone.jpg' width=15 height=15> ) is Google ".explode(" ",strpbrk($this->agent, 'C'))[0].$this->os();	
		return $this->br;
	}
	private function edge()
    {
		if(preg_match('/Edge/i',$this->agent)==1) 
			$this->br = "The Browser ( <img src='img/edge.jpg' width=15 height=15> ) is Microsoft ".explode(" ",strpbrk($this->agent, 'E'))[0].$this->os();	
		return $this->br;
	}
	private function opera()
    {
		if(preg_match('/Opera/i',$this->agent)==1) 
			$this->br = "The Browser ( <img src='img/opera.jpg' width=15 height=15> ) is Opera ".explode(" ",strpbrk($this->agent, 'O'))[0].$this->os();	
		return $this->br;
	}
	private function ie()
    {
		if(preg_match('/MSIE/i',$this->agent)==1 || preg_match('/Trident/i',$this->agent)==1 ) 
			$this->br = "The Browser ( <img src='img/ie.jpg' width=15 height=15> ) is Microsoft Internet Explorer ".$this->os();	
		return $this->br;
	}
	private function safari()
    {
		if(preg_match('/Safari/i',$this->agent)==1) 
			$this->br = "The Browser ( <img src='img/safari.jpg' width=15 height=15> ) is Opera ".explode(" ",strpbrk($this->agent, 'S'))[0].$this->os();	
		return $this->br;
	}
	private function unknown()
    {
		$this->br ="The Browser is unknown".$this->os();
		return $this->br;
	}
	/**
    * Get OS function
    */
	private function os()
    {
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
				$this->os = " on Windows";
		}
		elseif (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
				$this->os = " on Linux";
		}
		elseif (strtoupper(substr(PHP_OS, 0, 3)) === 'MAC') {
				$this->os = " on Mac";
		}
		else {
			    $this->os = " on Other OS";
		}
		return $this->os;
	}
	
	
}