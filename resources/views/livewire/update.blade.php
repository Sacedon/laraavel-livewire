<form>
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Name:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Email:</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email" wire:model="email">
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Course:</label>
        <select wire:model="course" class="form-select">
            <option selected disabled>Select Course</option>
            <option hidden="true">Select Course</option>
            <option value="College of Arts, Sciences, & Technology">College of Arts, Sciences, & Technology</option>
            <option value="College of Education">College of Education</option>
            <option value="College of Criminal Justice">College of Criminal Justice</option>
            <option value="College of Nursing">College of Nursing</option>
        </select>
        @error('course') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    
    <button wire:click.prevent="update()" class="btn btn-dark mt-2">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger mt-2">Cancel</button>
</form>