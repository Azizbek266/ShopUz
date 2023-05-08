<div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">Are you sure want to delete</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" type="button"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{-- Add Brans Modal --}}

    <div class="container-fluid">
        <div class="card">
           <div class="card-header">
            <h4>
                Brands List
                <a href="{{url('/')}}" class="btn btn-primary btn-sm float-end">Add Brands</a>
            </h4>
           </div>
           <div class="card-body">
            <table class="table table-bordered table-stiped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
           </div>

        </div>

    </div>

</div>
@push('script')
<script>
    window.addEventListener('close-modal',event=>{
        $('#deleteModal').modal('hide');
    });
<script>
    
@endpush
