<?php

class Games extends CI_Controller {
	
	var $pagetitle = "Nationals Postseason Home Games 2014 - Round 2";
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function viewall() {

	    $this->load->database();
	    
	    $message = false;
	    $togo = false;
	    
	    if (
	            isset($_POST["uHash"]) && isset($_POST["gID"]) &&
	            $_POST["uHash"] != "" && $_POST["gID"] != ""
            ) {
                $uHash = $_POST["uHash"];
                $gID = str_replace("gID-", "", $_POST["gID"]);
                
                //echo "uHASH: " . $uHash . "<br />";
               // echo "gID: " . $gID . "<br /><br />";
                
                $query = $this->db->get_where($this->config->item('shareholders_table'), array('shHash' => $uHash, 'shStatus' => '1'));
	            if ($query->num_rows() > 0) {
	                $row = $query->row(0);
	                $shID = $row->shID; 
	                $shName = $row->shName;
	                // Good hash and status is 1, so it is the shareholder's turn.
	                $udata = array(
	                        "shStatus" => '2',
	                        "gameID" => $gID
	                    );
                    $this->db->update($this->config->item('shareholders_table'), $udata, array('shHash' => $uHash));
                    
                    echo "Just selected: " . $shName . "<br />";
                    echo '<a href="/' . APPDIRNAME . '/games/' . $uHash . '/reset">Reset pick</a><br /><br />';
                    
                    $where = "shName='" . $shName . "' AND ( shStatus=0 OR shStatus=1 ) AND shID != 1";
                    $this->db->where($where, NULL, FALSE);
                    $query = $this->db->get($this->config->item('shareholders_table'));
                    $togo = $query->num_rows();
                    
                    $nextID = $shID + 1;
                   // echo $nextID . "<br />";
                    $query = $this->db->get_where($this->config->item('shareholders_table'), array('shID' => $nextID));
                    if ($query->num_rows() > 0) {
	                    $row = $query->row(0);
	                    $nextName = $row->shName;
	                    $nextHash = $row->shHash;
	                    $nextEmail = $row->shEmail;
	                    echo "Next voter is: " . $nextName . "<br />";
	                    echo "Hash: $nextHash <br />";
	                    echo '<a href="/' . APPDIRNAME . '/games/' . $nextHash . '/select">/' . APPDIRNAME . '/games/' . $nextHash . '/select</a><br />';
	                    $udata = array("shStatus" => '1');
	                    $this->db->update($this->config->item('shareholders_table'), $udata, array('shID' => $nextID));
	                    
	                    $to = $nextEmail;
	                    $subject = "You're up! Time to pick your (" . $nextName . ") next Nationals game.";
                        $headers   = array();
                        $headers[] = "MIME-Version: 1.0";
                        $headers[] = "Content-type: text/plain; charset=iso-8859-1";
                        $headers[] = "From: Kevin Ford <kford@3windmills.com>";
                        $headers[] = "Subject: {$subject}";
                        $headers[] = "X-Mailer: PHP/".phpversion();
                        
                        $sn = $_SERVER["SERVER_NAME"];
                        
                        $email = "Click the link below (or copy and paste it into your browser) to select your (" . $nextName . ") next Nationals game. \n\nhttp://" . $sn . "/" . APPDIRNAME . "/games/" . $nextHash . "/select";

                        mail($to, $subject, $email, implode("\r\n", $headers));
                        //echo $email;
                        $message = 2; // Success
                        
                    }
                    //exit;
                } else {
                    $message = 1; // Hash did not match.
                }
            }
	    
	    $games = $this->gamedata();
        
        $data['page_title'] = $this->pagetitle;
	    $data['page_lead'] = '';
	    $data['games'] = $games;
	    $data['error'] = false;
	    $data['message'] = $message;
	    $data['togo'] = $togo;
	    $data['extracssTable'] = "";
	    $this->load->view('templates/htmlhead', $data);
        $this->load->view('templates/games', $data);
	    $this->load->view('templates/htmlfoot');
	    
	}
	

    public function shareholder($shName = "") {
        
        $this->load->database();
        
        $games = $this->gamedata("shareholder", $shName);
        
        $data['page_title'] = $this->pagetitle;
	    $data['page_lead'] = '';
	    $data['games'] = $games;
	    $data['error'] = false;
	    $data['message'] = false;
	    $data['togo'] = false;
	    $data['extracssTable'] = "";
	    $this->load->view('templates/htmlhead', $data);
        $this->load->view('templates/games', $data);
	    $this->load->view('templates/htmlfoot');
	    
    }
    
    public function opponent($opponent = "") {
        
        $this->load->database();
        
        $games = $this->gamedata("opponent", $opponent);
        
        $data['page_title'] = $this->pagetitle;
	    $data['page_lead'] = '';
	    $data['games'] = $games;
	    $data['error'] = false;
	    $data['message'] = false;
	    $data['togo'] = false;
	    $data['extracssTable'] = "";
	    $this->load->view('templates/htmlhead', $data);
        $this->load->view('templates/games', $data);
	    $this->load->view('templates/htmlfoot');
	    
    }
	
	public function select($shHash = "") {

        $error = false;
	    $this->load->database();
	    
	    $query = $this->db->get_where($this->config->item('shareholders_table'), array('shHash' => $shHash));
	    $shareholder = array();
	    if ($query->num_rows() > 0) {
	        $row = $query->row(0);
	        $shareholder["shID"] = $row->shID;
	        $shareholder["shName"] = $row->shName;
	        $shareholder["shHash"] = $row->shHash;
	        $shareholder["shStatus"] = $row->shStatus;
	    } else {
	        // Hash not found.
	        $error = 1;
	    }
	    
	    if ( !$error && $shareholder["shStatus"] == 2) {
	        // Shareholder has selected already
	        $error = 2;
	    } else if ( !$error && $shareholder["shStatus"] == 0) {
	        // Not yet shareholder's turn
	        $error = 3;
	    }
	    
        $data['page_title'] = $this->pagetitle;
        $data['page_lead'] = '';
        $data['message'] = false;
        $data['error'] = $error;
        $data['uHash'] = $shHash;
        $data['extracssTable'] = "table-hover";
	        
	    if ($error) {
	        $this->load->view('templates/htmlhead', $data);
            $this->load->view('templates/games', $data);
	        $this->load->view('templates/htmlfoot');
	    } else if ($shareholder["shStatus"] == 1) {
	        
	        $where = "shName='" . $shareholder["shName"] . "' AND ( shStatus=1 OR shStatus=2 ) AND shID != 1";
            $this->db->where($where, NULL, FALSE);
            $query = $this->db->get($this->config->item('shareholders_table'));
            $selectNum = $query->num_rows();
                    
	        $games = $this->gamedata();
	        $data['games'] = $games;
	        $data['page_lead'] = 'Now selecting: <strong>' . $shareholder["shName"] . '</strong>.  Click a row to select that particular game.  This is selection ' . $selectNum . ' of 10.';
	        $this->load->view('templates/htmlhead', $data);
            $this->load->view('templates/games', $data);
	        $this->load->view('templates/htmlfoot');
	    }
	}
	
	public function reset($shHash = "") {
	    
	    $error = false;
	    $message = false;
	    $this->load->database();

	    $query = $this->db->get_where($this->config->item('shareholders_table'), array('shHash' => $shHash));
	    $shareholder = array();
	    if ($query->num_rows() > 0) {
	        $row = $query->row(0);
	        $shareholder["shID"] = $row->shID;
	        $shareholder["shName"] = $row->shName;
	        $shareholder["shHash"] = $row->shHash;
	        $shareholder["shStatus"] = $row->shStatus;
	    } else {
	        // Hash not found.
	        $error = 1;
	    }
	    
	    if ( !$error && $shareholder["shStatus"] == 1) {
	        // Currently it is this person's turn, nothing to do.
	        $error = 4;
	    } else if ( !$error && $shareholder["shStatus"] == 0) {
	        // Not yet shareholder's turn
	        $error = 3;
	    } else if ( !$error && $shareholder["shStatus"] == 2) {
	        $udata = array(
                "shStatus" => '1',
                "gameID" => NULL
            );
            $this->db->update($this->config->item('shareholders_table'), $udata, array('shHash' => $shHash));
            $shareholder["shStatus"] = '1';
            $message = 3;
            
            $udata = array(
                "shStatus" => '0',
                "gameID" => NULL
            );
            $query = $this->db->update($this->config->item('shareholders_table'), $udata, array('shID' => ($shareholder["shID"] + 1)));
	    }
	    
	    $data['page_title'] = $this->pagetitle;
        $data['page_lead'] = '';
        $data['message'] = $message;
        $data['error'] = $error;
        $data['uHash'] = $shHash;
        $data['extracssTable'] = "table-hover";
        
	    if ($error) {
	        $this->load->view('templates/htmlhead', $data);
            $this->load->view('templates/games', $data);
	        $this->load->view('templates/htmlfoot');
	    } else if ($shareholder["shStatus"] == 1) {
	        
	        $where = "shName='" . $shareholder["shName"] . "' AND ( shStatus=1 OR shStatus=2 ) AND shID != 1";
            $this->db->where($where, NULL, FALSE);
            $query = $this->db->get($this->config->item('shareholders_table'));
            $selectNum = $query->num_rows();
                    
	        $games = $this->gamedata();
	        $data['games'] = $games;
	        $data['page_lead'] = 'Now selecting: <strong>' . $shareholder["shName"] . '</strong>.  Click a row to select that particular game.  This is selection ' . $selectNum . ' of 10.';
	        $this->load->view('templates/htmlhead', $data);
            $this->load->view('templates/games', $data);
	        $this->load->view('templates/htmlfoot');
	    }
	}
	
                    
	private function gamedata($q = "all", $filter="") {
	    $query = false;
	    if ($q == "all") {
	        $query = $this->db->get($this->config->item('games_table'));
	    } else if ($q == "shareholder") {
	        $this->db->from($this->config->item('games_table'));
            $this->db->from($this->config->item('shareholders_table'));
            $this->db->where($this->config->item('shareholders_table') . '.gameID = '. $this->config->item('games_table') . '.gameID');
	        $this->db->where($this->config->item('shareholders_table') . '.shName', $filter);
            $query = $this->db->get();
	    } else if ($q == "opponent") {
	        //$this->db->from($this->config->item('games_table'));
            //$this->db->from($this->config->item('shareholders_table'));
            //$this->db->where('shareholders.gameID = games.gameID');
	        //$this->db->where('shareholders.shName', $filter);
            //$query = $this->db->get();
            $query = $this->db->get_where("games", array("gameOpponent" => $filter));
	    }
	    $games = array();
	    for ($x=0; $x<$query->num_rows(); $x++) {
	        $row = $query->row($x);
	        $gameDT = strtotime($row->gameDate . "T" . $row->gameTime);
	        
	        $g = array(
	            "gameID" => $row->gameID,
	            "gameNum" => $x + 1,
	            "gameTS" => $gameDT,
	            "gameOpponent" => $row->gameOpponent,
	            "gameSpecial" => $row->gameSpecial,
	            "gamePrice" => $row->gamePrice
	            );
	       array_push($games, $g);
	    }
	    
	    for ($x=0; $x<count($games); $x++) {
            $query = $this->db->get_where($this->config->item('shareholders_table'), array('gameID' => $games[$x]["gameID"]));
            if ($query->num_rows() > 0) {
                $row = $query->row(0);
                $games[$x]["shareholder"] = $row->shName;
            }
	    }
	    
	    //echo "<pre>";
	    //print_r($games);
	    //echo "</pre>";
	    
	    return $games;
	}
	
}