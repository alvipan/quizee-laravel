@extends('app')
@section('title', $title)
@section('nav_menu')
<li class="nav-item">
	<button id="btn-publish" class="btn btn-primary">Publish</button>
</li>
@endsection

@section('content')
<link rel="stylesheet" href="/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css" />

@include('form.material')
@if(isset($material->id))
@include('modal.question')
@endif
@endsection

@section('script')
<script src="/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script> 
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>

let material = {{ Js::from($material) }};
let editor = new Quill(`#editor`, {
  theme: `snow`
});

editor.on('text-change', function() {
  $(`#content`).val(editor.root.innerHTML);
});

if (material.id) {
	let modal_question = new bootstrap.Modal(document.getElementById('modal-question-form'), {keyboard: false});
	$('#title').val(material.title);
	$('#category').val(material.category);
	$('#price').val(material.price);
	
	editor.root.innerHTML = material.content;

	$.get(`/materials/${material.id}/questions`, function(res) {
		material.questions = res;
		updateQuestionList();
	});
}

function updateQuestionList() {
	$('#questions').html('');
	$(material.questions).each(function(index, obj) {
		$('#questions').append(`<li class="list-group-item">${obj.content}</li>`);
	});
}

$(`#btn-add-question`).click(function() {
	modal_question.show();
});

$(`#btn-publish`).click(function() {
	let input = $(`#form-material`).serializeArray();
	$(input).each(function(index, obj){
  	material[obj.name] = obj.value;
	});

	$.post('/materials/save', material, function(res) {
		if (res.success) {
			window.location.href = '/materials';
		}
	}, 'json');
});

$('#question-editor').submit(function(e) {
	e.preventDefault();
	let input = $(this).serialize();
	$.post('/materials/question', input, function(res) {
		if (res.success) {
			material.questions.push(res.question);
			modal_question.hide();
			updateQuestionList();
			$(this).trigger('reset');
		}
	})
});
</script>
@endsection