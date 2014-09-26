<?php

class Manage extends CI_Controller {
    
    // Sample, before postseason amending
    /*
    var $gamesA = array(
		array("gameID" => NULL, "gameDate" => "2014-04-04", "gameTime" => "13:05", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-04-05", "gameTime" => "19:05", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-04-06", "gameTime" => "13:35", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-04-08", "gameTime" => "19:05", "gameOpponent" => "Marlins"),
		array("gameID" => NULL, "gameDate" => "2014-04-09", "gameTime" => "19:05", "gameOpponent" => "Marlins"),
		array("gameID" => NULL, "gameDate" => "2014-04-10", "gameTime" => "16:05", "gameOpponent" => "Marlins")
	);
	*/
	
    /*
    What is the format of the MLB Playoffs?

    Round 1 is a single game series between the wildcard teams
    Rounds 2           : Best 3 out of 5 : HHAAH
    Rounds 3 and 4 : Best 4 out of 7 : HHAAAHH
    
    One must assume home field advantage.
    */


	public function __construct()
	{
		parent::__construct();
	}

    /*
        This creates two tables.  
            1) The management table
            2) The data table
        
        ID, date of retrieval, date/time started, date/time finished, status, number of new records, emailed
        Management table:
            CREATE TABLE IF NOT EXISTS `manage` (
                `manageID` int(11) NOT NULL auto_increment,
                `manageRetrievalDate` date NOT NULL,
                `manageStartDT` datetime NOT NULL,
                `manageEndDT` datetime NULL,
                `status` char(10) NULL,
                `new` int(4) NULL,
                `emailed` int(1) DEFAULT 0,
                PRIMARY KEY  (`manageID`),
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE="utf8_general_ci" AUTO_INCREMENT=1 ;
            
        ID, SirsiID, data
            CREATE TABLE IF NOT EXISTS `data` (
                `dataID` int(11) NOT NULL auto_increment,
                `manageID` int(11) NOT NULL,
                `sirsiID` char(40) NOT NULL,
                `data` TEXT NOT NULL,
                PRIMARY KEY  (`dataID`),
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE="utf8_general_ci" AUTO_INCREMENT=1 ;
    */
	public function instantiate()
	{
	    $this->load->database();
	    $this->load->dbforge();
	    
	    $gamesA = $this->config->item('games');
	    $shareholders = $this->config->item('shareholders');
	
	    $fields = array(
            'gameID' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'gameDate' => array(
                'type' =>'DATE'
            ),
            'gameTime' => array(
                'type' =>'TIME'
            ),
            'gameOpponent' => array(
                'type' =>'CHAR',
                'constraint' => '20'
            ),
            'gameSpecial' => array(
                'type' =>'CHAR',
                'constraint' => '80'
            ),
            'gamePrice' => array(
                'type' =>'CHAR',
                'constraint' => '4'
            )
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('gameID');
        $manage_table = $this->dbforge->create_table($this->config->item('games_table'), TRUE); // TRUE will check if it exists
        
        $this->db->insert_batch($this->config->item('games_table'), $gamesA); 
        
        $fields = array(
            'shID' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'shName' => array(
                'type' =>'CHAR',
                'constraint' => '40'
            ),
            'shEmail' => array(
                'type' =>'CHAR',
                'constraint' => '40'
            ),
            'shHash' => array(
                'type' =>'CHAR',
                'constraint' => '32'
            ),
            'shStatus' => array(
                'type' =>'INT',
                'constraint' => '1',
                'default' => '0'
            ),
            'gameID' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            )
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('shID', TRUE);
        $this->dbforge->add_key('shHash');
        $data_table = $this->dbforge->create_table($this->config->item('shareholders_table'), TRUE); // TRUE will check if it exists
        
        // Need to create the batch load
        $emails = array(
                "Ford"=>"kford@3windmills.com",
                "Mow"=>"lmow@cox.net",
                "Sherick"=>"meredithmgt@aol.com",
                "Hisel"=>"bhisel@verizon.net",
                "Gikowich"=>"lucie@thecranegroup.net",
                "Baldwin"=>"Todd@wtclothiers.com",
                "Harmala"=>"RHarmala@kilpatricktownsend.com",
                "McDermott"=>"jmcdermott@naahq.org"
            );
        $emails = array(
                "Ford"=>"kford@3windmills.com",
                "Mow"=>"kford@3windmills.com",
                "Sherick"=>"kford@3windmills.com",
                "Hisel"=>"kford@3windmills.com",
                "Gikowich"=>"kford@3windmills.com",
                "Baldwin"=>"kford@3windmills.com",
                "Harmala"=>"kford@3windmills.com",
                "McDermott"=>"kford@3windmills.com"
            );
        $now = strtotime("now");
        $shareholdersA = array();
        for ($x=0; $x<count($shareholders); $x++) {
            $sh = $shareholders[$x];
            $status = 0;
            if ($x == 0) {
                $status = 1;
            }
            $email = $emails[$sh];
            $s = array(
                    "shID" => NULL,
                    "shName" => "$sh",
                    "shEmail" => "$email",
                    "shHash" => md5($sh . $x . $now),
                    "shStatus" => $status
                );
            array_push($shareholdersA, $s);
        }
        
        $this->db->insert_batch($this->config->item('shareholders_table'), $shareholdersA); 
        
        $sn = $_SERVER["SERVER_NAME"];
        $headers = 'From: kford@3windmills.com';
        $msg = "Click the link below (or copy and paste it into your browser) to select the first Nationals game. \n\nhttp://" . $sn . "/" . APPDIRNAME . "/games/" . $shareholdersA[0]["shHash"] . "/select";
        mail($shareholdersA[0]["shEmail"], "First Pick", $msg, $headers);
        
		$data['page_title'] = 'Instantiate DB';
		$data['page_lead'] = 'Installation time.';
		
		$data['games_table'] = $manage_table;
		$data['shareholders_table'] = $data_table;
                
		$this->load->view('templates/htmlhead', $data);
		$this->load->view('templates/instantiate', $data);
		$this->load->view('templates/htmlfoot');
	}
	
	
	public function reset()
	{
	    $this->load->database();
	    $this->load->dbforge();

        $this->db->truncate($this->config->item('games_table'));
        $this->db->truncate($this->config->item('shareholders_table'));
        
		$data['page_title'] = 'Reset DB';
		$data['page_lead'] = 'Resetting time.';
		
		$data['reset'] = 1;
                
		$this->load->view('templates/htmlhead', $data);
		$this->load->view('templates/reset', $data);
		$this->load->view('templates/htmlfoot');
	}
	
}


?>