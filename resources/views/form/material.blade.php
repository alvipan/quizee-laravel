<form id="form-material" action="/materials/new" method="POST">
	<div class="row">
		<div class="col-xl-7">
			<div class="card mb-3">
				<div class="card-body">
				
					@csrf
					<label for="title" class="form-label">Title</label>
					<input id="title" name="title" type="text" class="form-control mb-3"/>

					<h6 class="form-label">Content</h6>
					<div id="editor" style="min-height:140px"></div>
					<input id="content" name="content" type="hidden"/>
				
				</div>
			</div>
		</div>
		<div class="col-xl-5">
			<div class="card">
				<div class="card-body">
					
					<h6 class="form-label">Category</h6>
  				<select id="category" name="category" class="selectpicker w-100 mb-3" data-style="btn-default">
    				<option value="bahasa-indonesia">Bahasa Indonesia</option>
						<option value="fiqih">Fiqih</option>
    				<option value="matematika">Matematika</option>
    				<option value="sejarah-islam">Sejarah Islam</option>
  				</select>

					<h6 class="form-label">Price</h6>
					<div class="input-group input-group-merge mb-3">
						<span class="input-group-text">Rp</span>
						<input id="price" name="price" type="number" class="form-control"/>
					</div>

					@if (isset($material->id))
					<h6 class="form-label">Questions</h6>
					<ol id="questions" class="list-group list-group-numbered mb-3">
						
					</ol>
					<button id="btn-add-question" class="btn btn-primary w-100" type="button">Add Question</button>
					@endif
				</div>

			</div>
		</div>
	</div>
</form>