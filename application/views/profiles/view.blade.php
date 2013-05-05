<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users/view/'.$profile->user->id)}}">User</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('profiles')}}">Profiles</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing Profile</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>User id:</strong>
	{{$profile->user_id}}
</p>
<p>
	<strong>About me:</strong>
	{{$profile->about_me}}
</p>

<p><a href="{{URL::to('profiles/edit/'.$profile->id)}}" class="btn">Edit</a> <a href="{{URL::to('profiles/delete/'.$profile->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
