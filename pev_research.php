<?php
	/*
	 * Written by xPaw
	 *
	 * This is a cut out version of http://xpaw.ru/pev_research.php
	 * This should be enough to get data from GitHub and display it
	 *
	 * GitHub: https://github.com/xPaw/PevResearch
	 */
	
	$Pevs = File_Get_Contents( 'https://raw.github.com/xPaw/PevResearch/master/pev_research.json' );
	$Pevs = JSON_Decode( $Pevs, true );
?>

<table>
	<thead>
		<tr>
			<th class="first" style="width:140px">Variable</th>
			<th style="width:60px">Type</th>
			<th style="width:200px">Tested Value</th>
			<th class="last">Description</th>
		</tr>
	</thead>
	<tbody>
<?php
	$i = 0;
	
	foreach( $Pevs as $Name => $Info )
	{
		$String  = '<tr id="' . $Name . '" class="row' . ( ++$i % 2 == 0 ? '2' : '1' ) . '">';
		$String .= '<td>' . ( $Info[ 'Type' ] === 'Placeholder' ? '<b>' . $Name . '</b>' : '<a href="#' . $Name . '">' . $Name . '</a>' ) . '</td>';
		$String .= '<td>' . $Info[ 'Type' ] . '</td>';
		$String .= '<td>' . $Info[ 'Tested Value' ] . '</td>';
		$String .= '<td>' . $Info[ 'Description' ] . '</td>';
		$String .= '</tr>';
		
		echo $String;
	}
?>
	</tbody>
</table>
