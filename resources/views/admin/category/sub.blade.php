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

                <div class="card-header"> All Sub Category</div>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Sub Category Name</th>
                        <!-- <th scope="col">Sub-Category Name</th> -->
                        <th scope="col">User Name</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($subs as $sub)
                    <tr>
                        <th scope="row">{{ $sub->id }}</th>
                        <td>{{ $sub->name }}</td>
                        <td>{{ $sub->user->name }}</td>
                        <td>
                        {{$sub->created_at->diffForHumans() }}                       
                        </td>
                        
                    </tr>
                    @endforeach



                </tbody>
                </table> 
                {{ $subs->links() }}               

            </div>
        </div>





        <div class="col-md-4">
        <div class="card">
            <div class="card-header"> Add Category</div>
            <div class="card-body">
            
            <form action="{{ route('store.sub') }}" method="POST" >
            @csrf
                <div class="form-group">
                    <label for="staticEmail2" class="visually-hidden">Category name</label>
                    <input type="text" name="name" class="form-control" id="staticEmail2" placeholder="Category Name">

                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                </div>

                <!-- <div class="form-group">
                    <label for="subcat" class="visually-hidden">Sub Category name</label>
                    <input type="text" name="sub_category_name" class="form-control" id="subcat" placeholder="Sub Category Name">

                        @error('sub_category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                </div> -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>    
            </form>
            </div>
            </div>
    </div>





        </div>
    </div>









    </div>
</x-app-layout>
