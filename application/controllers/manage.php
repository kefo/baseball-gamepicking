<?php

class Manage extends CI_Controller {
    
    var $gamesA = array(
		array("gameID" => NULL, "gameDate" => "2014-04-04", "gameTime" => "13:05", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-04-05", "gameTime" => "19:05", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-04-06", "gameTime" => "13:35", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-04-08", "gameTime" => "19:05", "gameOpponent" => "Marlins"),
		array("gameID" => NULL, "gameDate" => "2014-04-09", "gameTime" => "19:05", "gameOpponent" => "Marlins"),
		array("gameID" => NULL, "gameDate" => "2014-04-10", "gameTime" => "16:05", "gameOpponent" => "Marlins"),
		array("gameID" => NULL, "gameDate" => "2014-04-17", "gameTime" => "19:05", "gameOpponent" => "Cardinals"),
		array("gameID" => NULL, "gameDate" => "2014-04-18", "gameTime" => "19:05", "gameOpponent" => "Cardinals"),
		array("gameID" => NULL, "gameDate" => "2014-04-19", "gameTime" => "13:05", "gameOpponent" => "Cardinals"),
		array("gameID" => NULL, "gameDate" => "2014-04-20", "gameTime" => "13:35", "gameOpponent" => "Cardinals"),
		array("gameID" => NULL, "gameDate" => "2014-04-21", "gameTime" => "19:05", "gameOpponent" => "Angels"),
		array("gameID" => NULL, "gameDate" => "2014-04-22", "gameTime" => "19:05", "gameOpponent" => "Angels"),
		array("gameID" => NULL, "gameDate" => "2014-04-23", "gameTime" => "19:05", "gameOpponent" => "Angels"),
		array("gameID" => NULL, "gameDate" => "2014-04-24", "gameTime" => "19:05", "gameOpponent" => "Padres"),
		array("gameID" => NULL, "gameDate" => "2014-04-25", "gameTime" => "19:05", "gameOpponent" => "Padres"),
		array("gameID" => NULL, "gameDate" => "2014-04-26", "gameTime" => "13:05", "gameOpponent" => "Padres"),
		array("gameID" => NULL, "gameDate" => "2014-04-27", "gameTime" => "13:35", "gameOpponent" => "Padres"),
		array("gameID" => NULL, "gameDate" => "2014-05-05", "gameTime" => "19:05", "gameOpponent" => "Dodgers"),
		array("gameID" => NULL, "gameDate" => "2014-05-06", "gameTime" => "19:05", "gameOpponent" => "Dodgers"),
		array("gameID" => NULL, "gameDate" => "2014-05-07", "gameTime" => "13:05", "gameOpponent" => "Dodgers"),
		array("gameID" => NULL, "gameDate" => "2014-05-16", "gameTime" => "19:05", "gameOpponent" => "Mets"),
		array("gameID" => NULL, "gameDate" => "2014-05-17", "gameTime" => "16:05", "gameOpponent" => "Mets"),
		array("gameID" => NULL, "gameDate" => "2014-05-18", "gameTime" => "13:35", "gameOpponent" => "Mets"),
		array("gameID" => NULL, "gameDate" => "2014-05-19", "gameTime" => "19:05", "gameOpponent" => "Reds"),
		array("gameID" => NULL, "gameDate" => "2014-05-20", "gameTime" => "19:05", "gameOpponent" => "Reds"),
		array("gameID" => NULL, "gameDate" => "2014-05-21", "gameTime" => "16:05", "gameOpponent" => "Reds"),
		array("gameID" => NULL, "gameDate" => "2014-05-26", "gameTime" => "13:35", "gameOpponent" => "Marlins"),
		array("gameID" => NULL, "gameDate" => "2014-05-27", "gameTime" => "19:05", "gameOpponent" => "Marlins"),
		array("gameID" => NULL, "gameDate" => "2014-05-28", "gameTime" => "19:05", "gameOpponent" => "Marlins"),
		array("gameID" => NULL, "gameDate" => "2014-05-30", "gameTime" => "19:05", "gameOpponent" => "Rangers"),
		array("gameID" => NULL, "gameDate" => "2014-05-31", "gameTime" => "12:05", "gameOpponent" => "Rangers"),
		array("gameID" => NULL, "gameDate" => "2014-06-01", "gameTime" => "13:35", "gameOpponent" => "Rangers"),
		array("gameID" => NULL, "gameDate" => "2014-06-03", "gameTime" => "19:05", "gameOpponent" => "Phillies"),
		array("gameID" => NULL, "gameDate" => "2014-06-04", "gameTime" => "19:05", "gameOpponent" => "Phillies"),
		array("gameID" => NULL, "gameDate" => "2014-06-05", "gameTime" => "16:05", "gameOpponent" => "Phillies"),
		array("gameID" => NULL, "gameDate" => "2014-06-17", "gameTime" => "19:05", "gameOpponent" => "Astros"),
		array("gameID" => NULL, "gameDate" => "2014-06-18", "gameTime" => "19:05", "gameOpponent" => "Astros"),
		array("gameID" => NULL, "gameDate" => "2014-06-19", "gameTime" => "19:05", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-06-20", "gameTime" => "19:05", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-06-21", "gameTime" => "19:15", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-06-22", "gameTime" => "13:35", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-06-30", "gameTime" => "19:05", "gameOpponent" => "Rockies"),
		array("gameID" => NULL, "gameDate" => "2014-07-01", "gameTime" => "19:05", "gameOpponent" => "Rockies"),
		array("gameID" => NULL, "gameDate" => "2014-07-02", "gameTime" => "18:05", "gameOpponent" => "Rockies"),
		array("gameID" => NULL, "gameDate" => "2014-07-04", "gameTime" => "11:05", "gameOpponent" => "Cubs"),
		array("gameID" => NULL, "gameDate" => "2014-07-05", "gameTime" => "16:05", "gameOpponent" => "Cubs"),
		array("gameID" => NULL, "gameDate" => "2014-07-06", "gameTime" => "13:35", "gameOpponent" => "Cubs"),
		array("gameID" => NULL, "gameDate" => "2014-07-07", "gameTime" => "19:05", "gameOpponent" => "Orioles"),
		array("gameID" => NULL, "gameDate" => "2014-07-08", "gameTime" => "19:05", "gameOpponent" => "Orioles"),
		array("gameID" => NULL, "gameDate" => "2014-07-18", "gameTime" => "19:05", "gameOpponent" => "Brewers"),
		array("gameID" => NULL, "gameDate" => "2014-07-19", "gameTime" => "19:05", "gameOpponent" => "Brewers"),
		array("gameID" => NULL, "gameDate" => "2014-07-20", "gameTime" => "13:35", "gameOpponent" => "Brewers"),
		array("gameID" => NULL, "gameDate" => "2014-07-31", "gameTime" => "19:05", "gameOpponent" => "Phillies"),
		array("gameID" => NULL, "gameDate" => "2014-08-01", "gameTime" => "19:05", "gameOpponent" => "Phillies"),
		array("gameID" => NULL, "gameDate" => "2014-08-02", "gameTime" => "19:05", "gameOpponent" => "Phillies"),
		array("gameID" => NULL, "gameDate" => "2014-08-03", "gameTime" => "13:35", "gameOpponent" => "Phillies"),
		array("gameID" => NULL, "gameDate" => "2014-08-05", "gameTime" => "19:05", "gameOpponent" => "Mets"),
		array("gameID" => NULL, "gameDate" => "2014-08-06", "gameTime" => "19:05", "gameOpponent" => "Mets"),
		array("gameID" => NULL, "gameDate" => "2014-08-07", "gameTime" => "12:35", "gameOpponent" => "Mets"),
		array("gameID" => NULL, "gameDate" => "2014-08-15", "gameTime" => "19:05", "gameOpponent" => "Pirates"),
		array("gameID" => NULL, "gameDate" => "2014-08-16", "gameTime" => "19:05", "gameOpponent" => "Pirates"),
		array("gameID" => NULL, "gameDate" => "2014-08-17", "gameTime" => "17:05", "gameOpponent" => "Pirates"),
		array("gameID" => NULL, "gameDate" => "2014-08-18", "gameTime" => "19:05", "gameOpponent" => "D-backs"),
		array("gameID" => NULL, "gameDate" => "2014-08-19", "gameTime" => "19:05", "gameOpponent" => "D-backs"),
		array("gameID" => NULL, "gameDate" => "2014-08-20", "gameTime" => "19:05", "gameOpponent" => "D-backs"),
		array("gameID" => NULL, "gameDate" => "2014-08-21", "gameTime" => "16:05", "gameOpponent" => "D-backs"),
		array("gameID" => NULL, "gameDate" => "2014-08-22", "gameTime" => "19:05", "gameOpponent" => "Giants"),
		array("gameID" => NULL, "gameDate" => "2014-08-23", "gameTime" => "16:05", "gameOpponent" => "Giants"),
		array("gameID" => NULL, "gameDate" => "2014-08-24", "gameTime" => "13:35", "gameOpponent" => "Giants"),
		array("gameID" => NULL, "gameDate" => "2014-09-05", "gameTime" => "19:05", "gameOpponent" => "Phillies"),
		array("gameID" => NULL, "gameDate" => "2014-09-06", "gameTime" => "16:05", "gameOpponent" => "Phillies"),
		array("gameID" => NULL, "gameDate" => "2014-09-07", "gameTime" => "13:35", "gameOpponent" => "Phillies"),
		array("gameID" => NULL, "gameDate" => "2014-09-08", "gameTime" => "19:05", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-09-09", "gameTime" => "19:05", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-09-10", "gameTime" => "16:05", "gameOpponent" => "Braves"),
		array("gameID" => NULL, "gameDate" => "2014-09-23", "gameTime" => "19:05", "gameOpponent" => "Mets"),
		array("gameID" => NULL, "gameDate" => "2014-09-24", "gameTime" => "19:05", "gameOpponent" => "Mets"),
		array("gameID" => NULL, "gameDate" => "2014-09-25", "gameTime" => "19:05", "gameOpponent" => "Mets"),
		array("gameID" => NULL, "gameDate" => "2014-09-26", "gameTime" => "19:05", "gameOpponent" => "Marlins"),
		array("gameID" => NULL, "gameDate" => "2014-09-27", "gameTime" => "16:05", "gameOpponent" => "Marlins"),
		array("gameID" => NULL, "gameDate" => "2014-09-28", "gameTime" => "13:35", "gameOpponent" => "Marlins")
	);

	var $shareholders = array(
		"Ford",
		"Ford",
		"Mow",
		"Hisel",
		"Sherick",
		"Harmala",
		"Gikowich",
		"McDermott",
		"Baldwin",
		"Baldwin",
		"McDermott",
		"Gikowich",
		"Harmala",
		"Sherick",
		"Hisel",
		"Mow",
		"Ford",
		"Ford",
		"Mow",
		"Hisel",
		"Sherick",
		"Harmala",
		"Gikowich",
		"McDermott",
		"Baldwin",
		"Baldwin",
		"McDermott",
		"Gikowich",
		"Harmala",
		"Sherick",
		"Hisel",
		"Mow",
		"Ford",
		"Ford",
		"Mow",
		"Hisel",
		"Sherick",
		"Harmala",
		"Gikowich",
		"McDermott",
		"Baldwin",
		"Baldwin",
		"McDermott",
		"Gikowich",
		"Harmala",
		"Sherick",
		"Hisel",
		"Mow",
		"Ford",
		"Ford",
		"Mow",
		"Hisel",
		"Sherick",
		"Harmala",
		"Gikowich",
		"McDermott",
		"Baldwin",
		"Baldwin",
		"McDermott",
		"Gikowich",
		"Harmala",
		"Sherick",
		"Hisel",
		"Mow",
		"Ford",
		"Ford",
		"Mow",
		"Hisel",
		"Sherick",
		"Harmala",
		"Gikowich",
		"McDermott",
		"Baldwin",
		"Baldwin",
		"McDermott",
		"Gikowich",
		"Harmala",
		"Sherick",
		"Hisel",
		"Mow",
		"Ford"
	);

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
            )
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('gameID');
        $manage_table = $this->dbforge->create_table('games', TRUE); // TRUE will check if it exists
        
        $this->db->insert_batch('games', $this->gamesA); 
        
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
        $data_table = $this->dbforge->create_table('shareholders', TRUE); // TRUE will check if it exists
        
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
        for ($x=0; $x<count($this->shareholders); $x++) {
            $sh = $this->shareholders[$x];
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
        
        $this->db->insert_batch('shareholders', $shareholdersA); 
        
        $sn = $_SERVER["SERVER_NAME"];
        $headers = 'From: kford@3windmills.com';
        $msg = "Click the link below (or copy and paste it into your browser) to select the first Nationals game. \n\nhttp://" . $sn . "/nationals-2014/games/" . $shareholdersA[0]["shHash"] . "/select";
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

        $this->db->truncate("games");
        $this->db->truncate("shareholders");
        
		$data['page_title'] = 'Reset DB';
		$data['page_lead'] = 'Resetting time.';
		
		$data['reset'] = 1;
                
		$this->load->view('templates/htmlhead', $data);
		$this->load->view('templates/reset', $data);
		$this->load->view('templates/htmlfoot');
	}
	
}


?>