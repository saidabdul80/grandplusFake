<?php 
use App\tbl_subjects;
$subjects = tbl_subjects::get();
$nk = 1;
?>
<select>
		<option value="">--subjects--</option>
		@foreach($subjects as $subject)
		<option value="{{$subject->id}}" @if($result_data2[$i-1][0] == $subject->id ) selected @endif>{{$subject->subject_name}}</option>
		<?php $nk++; ?>
		@endforeach
	</select>