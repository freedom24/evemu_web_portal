<?
/*
        ------------------------------------------------------------------------------------
        LICENSE:
        ------------------------------------------------------------------------------------
        This file is part of EVEmu portal
        Copyright 2006 - 2011 The EVEmu portal Team
        For the latest information visit http://forum.evemu.org/viewtopic.php?f=7&t=68
        ------------------------------------------------------------------------------------
        This program is free software; you can redistribute it and/or modify it under
        the terms of the GNU Lesser General Public License as published by the Free Software
        Foundation; either version 2 of the License, or (at your option) any later
        version.

        This program is distributed in the hope that it will be useful, but WITHOUT
        ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
        FOR A PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.

        You should have received a copy of the GNU Lesser General Public License along with
        this program; if not, write to the Free Software Foundation, Inc., 59 Temple
        Place - Suite 330, Boston, MA 02111-1307, USA, or go to
        http://www.gnu.org/copyleft/lesser.txt.
        ------------------------------------------------------------------------------------
        Author:         Almamu
*/

	if( !is_admin( $_SESSION[ 'portalUser' ] ) )
	{
		echo '<div id="theader"><table><tr><th><center><font style="color: rgb( 255, 0, 0 );"><strong>Error</strong></font></th></tr><tr><td><center>You should be an admin to do this</center></td></tr></table></div><br>';
	}else if( !isset( $_GET[ 'action' ] )  )
	{
		echo '<div id="theader"><table><tr><th><center><font style="color: rgb( 255, 255, 0 );"><strong>Warning</strong></font></th></tr><tr><td><center>Are you sure you want to delete this report?<br>';
		echo '<a href="?p=forum&deletereport='.$_GET[ 'deletereport' ].'&admin&action=1">Yes</a> | <a href="?p=forum&reports&admin">No</a></center></td></tr></table></div>';
	}else{
		// Change the status of the sticky flag
		$query = "DELETE FROM forum_reports WHERE id=".$_GET[ 'deletereport' ].";";
		@mysql_query( $query, $connections[ 'portal' ] );
		echo '<div id="theader"><table><tr><th><center><font style="color: rgb( 0, 255, 0 );"><strong>Correct</strong></font></th></tr><tr><td><center>Report deleted succesfully<br>Click <a href="?p=forum&reports&admin">here</a> to go back</center></td></tr></table></div>';
	}
	
?>