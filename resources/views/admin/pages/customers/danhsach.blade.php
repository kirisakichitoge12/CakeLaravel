
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
      <th>
          Mã Khách Hàng
        </th>
        <th>
          Tên Khách Hàng
        </th>
        <th>
          Giới Tính
        </th>
        <th>
          Email
        </th>
        <th>
          Địa chỉ
        </th>
        <th>
          Điện Thoại
        </th>
        <th>
          Thao tác
        </th>
      </tr>
      </thead>
      <tbody>

      @foreach($customer as $cus)
      <tr class="odd gradeX" align="center">
        <td>
          {{$cus->id}}
        </td>
        <td>
          {{$cus->name}}
        </td>
        <td>
          {{$cus->gender}}
        </td>
        <td>
          {{$cus->email}}
        </td>
        <td>
          {{$cus->address}}
        </td>
        <td>
          {{$cus->phone_number}}
        </td>
        <td class="actions-cell" data-label="thao tác">
            <div class="buttons right nowrap"> 
            <a data-bs-toggle="modal" data-bs-target="#delete{{$cus->id}}"  >
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
  </div>


<!-- Modal -->

@foreach($customer as $cus)
<div class="modal fade" id="delete{{$cus->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sản phẩm </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có muốn xóa khách hàng  {{$cus->name}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <a href="admin/customer/xoa/{{$cus->id}}" ><button type="button" class="btn btn-primary">Xóa</button></a>
      </div>
    </div>
  </div>
</div>

@endforeach
   
@endsection

