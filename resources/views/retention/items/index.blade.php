<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        All Category <b></b>


        </h2>
    </x-slot>

    <div class="py-12">
    <div class="container">    
        <div class="row">



        <div class="col-md-8 ">
            <div class="card">

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

                <div class="card-header"> All Item Retention</div>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Box #</th>
                        <th scope="col">Part Number</th>
                        <th scope="col">Product</th>
                        <th scope="col">Lot</th>
                        <!-- <th scope="col">Created At</th> -->
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach($retentions as $retention)
                    <tr>
                        <th scope="row">{{ $retention->box_id }}</th>
                        <td>{{ $retention->pn }}</td>
                        <td></td>
                        <td>{{ $retention->lot }}</td>
                        <!-- <td>
                            @if($retention->created_at == NULL)
                            <span class="text-danger">No Date Set</span>
                            @else
                        {{ $retention->created_at->diffForHumans() }}
                            @endif
                        
                        </td> -->
                        
                    </tr>
                    @endforeach



                </tbody>
                </table> 
                {{ $retentions->links() }}               

            </div>
        </div>





        <div class="col-md-4">
        <div class="card">
            <div class="card-header"> Add Retention</div>
            <div class="card-body">
            
            <form action="{{ route('store.itemRet') }}" method="POST" >
            @csrf
                 <div class="form-group">
                    <label for="staticEmail2" class="visually-hidden">Box</label>
                    <input type="text" name="box" class="form-control" id="staticEmail2" placeholder="Box #">

                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                </div>
                <div class="form-group">
                    <label for="staticEmail2" class="visually-hidden">Box</label>
                    <input type="text" name="pn" class="form-control" id="staticEmail2" placeholder="Part Number">

                        @error('pn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                </div>
                <div class="form-group">
                    <label for="staticEmail2" class="visually-hidden">Lot</label>
                    <input type="text" name="lot" class="form-control" id="staticEmail2" placeholder="Lot #">

                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                </div>

                <div class="form-group">
                <input 
                    name="date" 
                    id="start_date" 
                    class="form-control" 
                    style="width: 100%; display: inline;" 
                    onchange="invoicedue(event);" 
                    type="date">
                </div>
                <div class="form-group">
                <input 
                    name="date" 
                    id="end_date" 
                    class="form-control" 
                    style="width: 100%; display: inline;" 
                    onchange="invoicedue(event);" 
                    type="date">
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>    
            </form>
            </div>
            </div>
    </div>





        </div>
    </div>









    </div>
</x-app-layout>
