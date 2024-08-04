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
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Loại sản phẩm</th>
        <th>Giá gốc</th>
        <th>Giá khuyến mãi</th>
        <th>ĐVT</th>
        <th>Trạng thái</th>
        <th>Hình</th>
        <th>Mô tả</th>
        <th>Thao tác </th>
      </tr>
      </thead>
      <tbody>
        @foreach ($products as $pro)
            <tr class="odd gradeX">
            <td width="5%">{{$pro->id}}</td>
            <td width="5%">{{$pro->name}}</td>
            <td width="5%">{{$pro->product_type->name}}</td>
            <td width="5%">{{$pro->unit_price}}</td>
            <td width="5%">{{$pro->promotion_price}}</td>
            <td width="5%">{{$pro->unit}}</td>
            <td width="5%">{{$pro->new == 1? "Sản phẩm mới": ""}}</td>
            <td width="10%"><img src="resources/assets/dest/product/{{$pro->image}}"

            width="100" height="100" alt="{{$pro->name}}"></td>

            <td style="max-width: 150px;" width="50%">{{$pro->description}}</td>
            <td class="actions-cell" data-label="thao tác">
            <div class="buttons right nowrap"> 
                <a  data-bs-toggle="modal" data-bs-target="#exampleModal{{$pro->id}}" >
                <button class="button small green --jb-modal">
                <span class="icon"><i class="mdi mdi-eye"></i></span>
                </button>
            </a>
            <a data-bs-toggle="modal" data-bs-target="#delete{{$pro->id}}"  >
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
    <div class="row p-2">{{$products->links()}}</div>
  </div>


<!-- Modal -->

@foreach($products as $pro)
<div class="modal fade" id="delete{{$pro->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sản phẩm </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có muốn xóa sản phẩm {{$pro->name}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <a href="admin/sanpham/xoasanpham/{{$pro->id}}" ><button type="button" class="btn btn-primary">Xóa</button></a>
      </div>
    </div>
  </div>
</div>

@endforeach


@foreach($products as $pro)
<div class="modal fade" id="exampleModal{{$pro->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sản phẩm </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có muốn sửa sản phẩm {{$pro->name}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <a href="admin/sanpham/suasanpham/{{$pro->id}}" ><button type="button" class="btn btn-primary">Sửa</button></a>
      </div>
    </div>
  </div>S
</div>

@endforeach
   
@endsection

