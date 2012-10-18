<?php

class db {

	function get_current_datetime() {
		return date('Y-m-d H:i');	
	}
		
	function retrieve( $sql ) {
		$query = mysql_query( $sql ) or die (mysql_error());
		$table = array();
		$n = 0;
		while ( $row = mysql_fetch_array( $query, MYSQL_ASSOC ) ) {
			$table[$n] = $row;
			$n++;
		}
		return $table;
	}
	
	function fetch( $value, $sql ) {
		$query = mysql_query( $sql ) or die(mysql_error());
		$row = mysql_fetch_array($query, MYSQL_ASSOC);
		return $row[$value];
	}

	function query( $sql ) {
		$query = mysql_query( $sql ) or die (mysql_error());
		$this->add_mod( $sql );
		return $query;
	}
	
}

?>