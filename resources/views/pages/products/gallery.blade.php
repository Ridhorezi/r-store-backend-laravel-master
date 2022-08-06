@extends('layouts.default')

@section('content')
    <div class="orders">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              {{-- <h4 class="box-title">Daftar Foto Barang <small>"{{ $product->name }}"</small></h4> --}}
              <strong class="card-title">Data Table  <small>"{{ $product->name }}"</small></strong>
            </div>
            <div class="card-body">
              <div class="table-stats">
                <table class="table" id="bootstrap-data-table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Barang</th>
                      <th>Foto</th>
                      <th>Default</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>
                          <img src="{{ url($item->photo) }}" alt="" />
                        </td>
                        <td>{{ $item->is_default ? 'Ya' : 'Tidak' }}</td>
                        <td>
                          <form action="{{ route('product-galleries.destroy', $item->id) }}" 
                                method="post" 
                                class="d-inline">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>
                              <i class="fa fa-trash"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    @empty
                        <tr>
                          <td colspan="6" class="text-center p-5">
                            Data tidak tersedia
                          </td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('after-script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Apakah anda yakin ingin menghapus data ini ?",
            icon: "warning",
            type: "warning",
            buttons: ["Batal","Ya!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>

@endpush