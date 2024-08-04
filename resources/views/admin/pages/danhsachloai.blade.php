@extends("admin/layouts/master")

@section("content")
  
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
      Clients
    </p>
    <a href="#" class="card-header-icon">
      <span class="icon"><i class="mdi mdi-reload"></i></span>
    </a>
                @if(Session::has('thongbao')) 
                        <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                        </div>
                @endif
  </header>
  <div class="card-content">
    <table>
      <thead>
      <tr>   
        <th with="15%">Mã Phân Loại</th>
        <th width="15%">Tên Phân Loại</th>
        <th width="50%">Mô tả</th>
        <th width="10%">Hình</th>
        <th width="10%" colspan="2">Thao Tác</th>
      </tr>
      </thead>
      <tbody>
      @foreach($loaisanpham as $lsp)
      <tr>
        <td data-label="Mã Phân Loại">{{$lsp->id}}</td>
        <td data-label="Tên Phân Loại">{{$lsp->name}}</td>
        <td data-label="Mô tả">{{$lsp->description}}</td>
        <td data-label="Hình"><img src="resources/assets/dest/product/{{$lsp->image}}" width="100" height="100"></td>
        <td class="actions-cell" data-label="thao tác">
          <div class="buttons right nowrap"> 
          <a  data-bs-toggle="modal" data-bs-target="#exampleModal{{$lsp->id}}">
            <button class="button small green --jb-modal">
              <span class="icon"><i class="mdi mdi-eye"></i></span>
            </button>
          </a>
          <a data-bs-toggle="modal" data-bs-target="#delete{{$lsp->id}}"  >
            <button class="button small red --jb-modal">
              <span class="icon"><i class="mdi mdi-trash-can"></i></span>
            </button>
          </a>
          </div>
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
    <div class="row">{{$loaisanpham->links()}}</div>
  </div>


<!-- Modal -->

@foreach($loaisanpham as $lsp)
<div class="modal fade" id="delete{{$lsp->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sản phẩm </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có muốn xóa sản phẩm {{$lsp->name}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <a href="admin/loaisanpham/xoasanpham/{{$lsp->id}}" ><button type="button" class="btn btn-primary">Xóa</button></a>
      </div>
    </div>
  </div>
</div>

@endforeach
@foreach($loaisanpham as $lsp)
<div class="modal fade" id="exampleModal{{$lsp->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa loại sản phẩm </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có muốn sửa sản phẩm {{$lsp->name}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <a  href="admin/loaisanpham/sualoaisanpham/{{$lsp->id}}" ><button type="button" class="btn btn-primary">Sửa</button></a>
      </div>
    </div>
  </div>
</div>

@endforeach
   
@endsection

