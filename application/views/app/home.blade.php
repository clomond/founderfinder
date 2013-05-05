@layout('templates._app')

@section('css')
	@parent
@endsection

@section('js')
	@parent
	{{ HTML::script('js/backbone/routes/founderfinder.js') }}
	{{ HTML::script('js/backbone/views/header.js') }}
	{{ HTML::script('js/backbone/views/review-view.js') }}
	{{ HTML::script('js/backbone/views/login.js') }}
	{{ HTML::script('js/backbone/views/user-view.js') }}
	{{ HTML::script('js/backbone/views/profile-view.js') }}
	{{ HTML::script('js/backbone/models/user-model.js') }}
	{{ HTML::script('js/backbone/models/profile-model.js') }}

	
@endsection

@section('content')
	
	
	<div id="main-area" class="container-fluid"></div>
	
	<!--<script type="text/template" id="tpl-category-row">
		<td class="id-col span1"><%= m.id %></td>
		<td class="span1"><%= m.establishment_id %></td>
		<td class="span1"><%= m.user_id %></td>
		<td class="span5"><%= m.text %></td>
		<td class="span5"><%= m.is_good %></td>
		<td class="tc-tool">
			<div class="row-fluid">
			<a class="btn btn-agree">Agree</a>
			</div>
		</td>
	</script>-->

@endsection