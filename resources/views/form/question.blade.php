<form id="question-editor" method="POST">
    @csrf

    <input type="hidden" name="material_id" value="{{$material->id}}"/>

    <div class="modal-header border-success">
        <h5 class="mb-0">Question editor</h5>
        <button type="submit" class="btn btn-primary ms-auto">Save</button>
    </div>
    <div class="modal-body">
               
        <textarea name="content" class="form-control mb-3" placeholder="Content..."></textarea>

        <h6 class="form-label">Options</h6>
        <div class="input-group mb-3">
            <span class="input-group-text">A</span>
            <input name="option_a" type="text" class="form-control"/>
        </div>
         <div class="input-group mb-3">
            <span class="input-group-text">B</span>
            <input name="option_b" type="text" class="form-control"/>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">C</span>
            <input name="option_c" type="text" class="form-control"/>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">D</span>
            <input name="option_d" type="text" class="form-control"/>
        </div>

        <hr/>

        <div class="row">
            <div class="col-2">
                <h6 class="form-label">Answer</h6>
  				<select name="answer" class="selectpicker w-100 mb-3" data-style="btn-default">
    				<option value="option_a">A</option>
    				<option value="option_b">B</option>
    				<option value="option_c">C</option>
                    <option value="option_d">D</option>
  				</select>
            </div>
            <div class="col-5">
                <h6 class="form-label">Timer</h6>
                <div class="input-group mb-3">
                    <input name="timer" type="number" value="15" class="form-control"/>
                    <span class="input-group-text">second</span>
                </div>
            </div>
            <div class="col-5">
                <h6 class="form-label">Reward</h6>
                <div class="input-group">
                    <input name="reward" type="number" value="5" class="form-control"/>
                    <span class="input-group-text">points</span>
                </div>
            </div>
        </div>
    </div>
</form>