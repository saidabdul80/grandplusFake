	<select id="" class="">
		<option value="">--select Grade--</option>
		<option @if($result_data1[$i-1][1] == 'A' ) selected @endif value="A">A</option>
		<option @if($result_data1[$i-1][1] == 'B' ) selected @endif value="B">B</option>
		<option @if($result_data1[$i-1][1] == 'C' ) selected @endif value="C">C</option>
		<option @if($result_data1[$i-1][1] == 'D' ) selected @endif value="D">D</option>
		<option @if($result_data1[$i-1][1] == 'E' ) selected @endif value="E">E</option>
		<option @if($result_data1[$i-1][1] == 'F' ) selected @endif value="F">F</option>
	</select>

