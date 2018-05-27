<?php
defined('BASEPATH') or exit('no direct blah blah blah');
	class MainModel extends CI_MODEL
 {
    function __construct ()
	{
		parent ::__construct();		
		$this->load->database();
		
    }
	function signup ($values)
	{
		return $this->db->insert('usertable', $values);
		
	}
	function signupadmin ($values)
	{
		return $this->db->insert('admintable', $values);
		
	}
	function housedetails($values)
	{
		return $this->db->insert('housedetails', $values);
	}
	function search_db($arg)
	{
		$this->db->from('housedetails');
		$this->db->or_like('location', $arg);
		$this->db->or_like('type', $arg);
		$this->db->or_like('price', $arg);
		
		return $this->db->get()->result();
		
	}
	function search_rows($arg)
	{
		$this->db->from('housedetails');
		$this->db->or_like('location', $arg);
		$this->db->or_like('type', $arg);
		$this->db->or_like('price', $arg);
	    $query = $this->db->get();

	    return $query->num_rows();
		
	}

	function manual($pr)
	{
		$this->db->from('housedetails');
		$this->db->like('location', $pr);
		$this->db->or_like('type', $pr);
		$this->db->or_like('price', $pr);
		$this->db->or_like('search_description', $pr);
	    return  $this->db->get()->result();

	}

	function manual_rows($pr)
	{
		$this->db->from('housedetails');
		$this->db->like('location', $pr);
		$this->db->or_like('type', $pr);
		$this->db->or_like('price', $pr);
		$this->db->or_like('search_description', $pr);
	    $query = $this->db->get();

	    return $query->num_rows();

	}
	function login ($uname) 
	{
		$this->db->from('admintable');
		$this->db->where('username', $uname);
		$query = $this->db->get();

		return $query->result(); 
	} 
	function counthouse($username)
	{
		$this->db->from('housedetails');
		$this->db->where('agent', $username);
		$query = $this->db->get();

		return $query->num_rows();
	}

	function collection_all()
	{
		$this->db->from('housedetails');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();

		return $query->result();

	}

	function collection_count()
	{
		$this->db->from('housedetails');
		$query = $this->db->get();

		return $query->num_rows();

	}

	function collection_agent($username)
	{
		$this->db->from('housedetails');
		$this->db->where('agent', $username);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();

		return $query->result();

	}
	function latest()
	{	
		$status = 'available';
		$this->db->from('housedetails');
		$this->db->where('status', $status);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(4);
		$query = $this->db->get();

		return $query->result();
	}

	function getAgentDetails($agentid) 
	{
		$this->db->from('admintable');
		$this->db->where('username', $agentid);
		$query = $this->db->get();

		return $query->result();
	}

	function login_user ($uname) 
	{
		$this->db->from('usertable');
		$this->db->where('username', $uname);
		$query = $this->db->get();

		return $query->result(); 
	}

	function sendRequest($values)
	{
		return $this->db->insert('request', $values);
	}

	function select($id) 
	{
		$this->db->from('housedetails');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->result();
	}

	function select_request($agent)
	{
		$this->db->from('request');
		$this->db->where('agent_name', $agent);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();

		return $query->result();

	}

	function count_unread($agent)
	{
		$int = 0;
		$this->db->from('request');
		$this->db->where('agent_name', $agent);
		$this->db->where('checked', $int);
		$query = $this->db->get();

		return $query->num_rows();
	}

	function read_request($agent)
	{
		$int = 0;
		$new = array('checked' => 1 );
		$this->db->where('agent_name', $agent);
		$this->db->where('checked', $int);
		$this->db->update('request', $new);

		return TRUE;

	}


	function edit_details ($vals, $id) 
	{
		$this->db->where('id', $id);
		$this->db->update('housedetails',$vals);

		return TRUE;
		 
	}

	function send_others ($values) 
	{
		return $this->db->insert('other_images', $values);
	}

	function select_others($marker)
	{
		$this->db->from('other_images');
		$this->db->where('marker', $marker);
		$query = $this->db->get();

		return $query->result();

	}

	function email_check($email)
	{
		$this->db->form('usertable');
		$this->db->where('email',$email);
		$query = $this->db->get();

		if($query->num_rows()> 0)
		{
			return true;
		}
		else
		{
			return false;
		}


	}

	function insert_confirm($values, $email)
	{
		$this->db->where('email', $email);
		if($this->db->update('usertable', $values))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	function insert_confirm_admin ($values, $email)
	{
		$this->db->where('email', $email);
		if($this->db->update('admintable', $values))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	function select_user($email)
	{
		$this->db->from('usertable');
		$this->db->where('email', $email);
		$query = $this->db->get();

		return $query->result();
	}

function select_agent($email)
	{
		$this->db->from('admintable');
		$this->db->where('email', $email);
		$query = $this->db->get();

		return $query->result();
	}

	function contact($values)
	{
		return $this->db->insert('contact_message', $values);		
	}
}
?>