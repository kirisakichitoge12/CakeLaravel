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
        <th width="5%">Id</th>
        <th width="10%">Fullname</th>
        <th width="10%">Email</th>
        <th width="10%">Phone</th>
        <th width="5%">Address</th>
        <th width="5%">Quyền</th>
        <th width="10%">Ảnh đại diện</th>
        <th width="5%">Thao tác </th>
      </tr>
      </thead>
      <tbody>
        @foreach ($user as $us)
            <tr class="odd gradeX">
            <td  data-label="id">{{$us->id}}</td>
            <td  data-label="name">{{$us->full_name}}</td>
            <td  data-label="email">{{$us->email}}</td>
            <td  data-label="phone">{{$us->phone}}</td>
            <td  data-label="address">{{$us->address}}</td>
            <td  data-label="quyen">{{$us->quyen==0?"user":"admin"}}</td>
            <td  data-label="hinh"><img src="resources/assets/dest/product/{{$us->image}}"
             width="100" height="100" alt="{{$us->image}}"></td>
            <td class="actions-cell" data-label="thao tác">
            <div class="buttons right nowrap"> 
                <a href="admin/user/suanguoidung/{{$us->id}}">
                <button class="button small green --jb-modal">
                <span class="icon"><i class="mdi mdi-eye"></i></span>
                </button>
            </a>
            <a data-bs-toggle="modal" data-bs-target="#delete{{$us->id}}"  >
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
    <div class="row p-2">{{$user->links()}}</div>
  </div>


<!-- Modal -->

@foreach($user as $us)
<div class="modal fade" id="delete{{$us->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sản phẩm </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có muốn xóa user {{$us->full_name}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <a href="admin/user/xoanguoidung/{{$us->id}}" ><button type="button" class="btn btn-primary">Xóa</button></a>
      </div>
    </div>
  </div>
</div>

@endforeach
   
@endsection

