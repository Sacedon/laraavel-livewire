<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
  
    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif
  
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($posts) > 0)
            @foreach($posts as $rs)
            <tr>
                <td>{{ $rs->id }}</td>
                <td>{{ $rs->name }}</td>
                <td>{{ $rs->email }}</td>
                <td>{{ $rs->course}}</td>
                <td>
                <button wire:click="edit({{ $rs->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button onclick="deletePost({{ $rs->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="3" align="center">
                         No post Found.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <script>
        function deletePost(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deletePost',id);
        }
    </script>
</div>