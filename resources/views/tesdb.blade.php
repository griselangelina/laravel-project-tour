<!DOCTYPE html>
<html lang="en">

  <head>

  </head>

  <body>

		<table>
		 @foreach ($posts as $posts)
			<tr>
				<td>{{ $posts->text_detail }}</td>
								<td>{{ $posts->prd_nm }}</td>

			</tr>
		@endforeach
		
		
		</table>
  </body>

</html>
