<!DOCTYPE html>
<html>
	<head>
		<style>
			body {
				margin: 0;
				background: none;
			}
		</style>
	</head>
	<body>
		@if ($material)
		{!! $material->content !!}
		@else
		Anda belum memiliki materi ini.
		@endif
	</body>
</html>