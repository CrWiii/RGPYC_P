<table width="100%" class="table table-striped">
	@foreach($info_content_selected->Content as $titulos)
		@if($titulos->content != null)
		<tr>
			<td>@if($titulos->ModelContent) {{$titulos->ModelContent->title}} @else {{$titulos->title}} @endif <td>
			<td><input type="checkbox" id="chk_titulos" data-id="{{$titulos->id}}" value="{{ $titulos->content }}" name="chk_titulos" checked="checked"></td>
		</tr>
		@endif
	@endforeach
</table>