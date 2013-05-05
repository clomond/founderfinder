@if(count($profiles) == 0)
	<p>No profiles.</p>
@else
	<table>
		<thead>
			<tr>
				<th>User Id</th>
				<th>About Me</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($profiles as $profile)
				<tr>
					<td><a href="{{URL::to('users/view/'.$profile->id)}}">User #{{$profile->user_id}}</a></td>
					<td>{{$profile->about_me}}</td>
					<td>
						<a href="{{URL::to('profiles/view/'.$profile->id)}}" class="btn">View</a>
						<a href="{{URL::to('profiles/edit/'.$profile->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('profiles/delete/'.$profile->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('profiles/create')}}">Create new Profile</a></p>