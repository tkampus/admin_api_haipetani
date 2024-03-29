@extends('app')

@section('title', 'Daftar Ahli')

@section('link')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
   .event-gambar-mini {
      max-height: 4rem;
   }

   .event-gambar-max {
      width: -webkit-fill-available;
      max-width: -webkit-fill-available;
   }
</style>
@endsection

@section('content')

<!-- End of Topbar -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-2 text-gray-800">Table Ahli</h1>
      <a href="{{route('createakun')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Create New Account</a>
   </div>

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">DataTables Ahli</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No. </th>
                     <th>Username</th>
                     <th>Gambar</th>
                     <th>No Hp</th>
                     <th>Email</th>
                     <th>NIK</th>
                     <th>Jenis Kelamin</th>
                     <th>Tanggal Lahir</th>
                     <th>alamat</th>
                     <th>NIP</th>
                     <th>Keahlian 1</th>
                     <th>Keahlian 2</th>
                     <th>Kantor</th>
                     <th>Created At</th>
                     <th>Updated At</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>No. </th>
                     <th>Username</th>
                     <th>Gambar</th>
                     <th>No Hp</th>
                     <th>Email</th>
                     <th>NIK</th>
                     <th>Jenis Kelamin</th>
                     <th>Tanggal Lahir</th>
                     <th>alamat</th>
                     <th>NIP</th>
                     <th>Keahlian 1</th>
                     <th>Keahlian 2</th>
                     <th>Kantor</th>
                     <th>Created At</th>
                     <th>Updated At</th>
                     <th>Action</th>
                  </tr>
               </tfoot>
               <tbody>
                  @foreach($akun as $key => $item)
                  <tr>
                     <td>{{ $key + 1 }}</td>
                     <td>{{$item->username}}</td>
                     <td class="text-center">
                        <a class="btn-image-event" data-toggle="modal" data-target="#modalgambar" data-id="{{ $item->nohp }}">
                           <img class="event-gambar-mini" src="{{ route('getimgprofil', ['role' => 'ahli', 'nohp' => $item->nohp ]) }}" alt="">
                        </a>
                     </td>
                     <td>{{$item->nohp}}</td>
                     <td>{{$item->email}}</td>
                     <td>{{$item->nik}}</td>
                     <td>{{$item->jeniskelamin}}</td>
                     <td>{{$item->tanggallahir}}</td>
                     <td>{{$item->alamat}}</td>
                     <td>{{$item->nip}}</td>
                     <td>{{$item->keahlian1}}</td>
                     <td>{{$item->keahlian2}}</td>
                     <td>{{$item->kantor}}</td>
                     <td>{{$item->created_at}}</td>
                     <td>{{$item->updated_at}}</td>
                     <td>
                        <a href="/Detail:{{$item->id}}" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Detail : {{$item->username}}">
                           <i class="fas fa-info-circle"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-circle btn-sm btn-delete" data-id="{{$item->id}}" data-toggle="modal" title="Hapus : {{$item->username}}" data-target="#staticBackdrop" data-toggle="tooltip" data-placement="top" data-username="{{$item->username}}" data-email="{{$item->nohp}}">
                           <i class="fas fa-trash"></i>
                        </a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>

</div>

<!-- modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Menghapus Account :</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p>Apakah anda yakin akan menghapus akun <b><span id="usernameToDelete"></span></b>?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <form method="post" action="{{Route('deleteakun')}}">
               @csrf
               <input class="form-confirm-delete" type="hidden" name="id" value="">
               <button type="submit" data-id="" class="btn btn-danger">Delete</button>
            </form>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modalgambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Event ID : </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <img class="event-gambar-max" src="" alt="">
         </div>
      </div>
   </div>
</div>



@endsection

@section('script')
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- script -->
<script>
   $(document).ready(function() {
      // Tangkap event klik tombol delete
      $(".btn-delete").on("click", function() {
         var idToDelete = $(this).data("id"); // Ambil ID item dari data-id
         var username = $(this).data('username');
         var email = $(this).data('email');

         // Isi modal dengan informasi detail pengguna
         $("#staticBackdropLabel").text("Menghapus Account : " + username);
         $("#usernameToDelete").text(email);

         // Set action untuk tombol delete pada modal
         $(".form-confirm-delete").attr("value", idToDelete);
      });
      $(".btn-image-event").on("click", function() {
         var idprofil = $(this).data("id");
         var newSrc = "/getimgprofil:ahli:" + idprofil;
         $(".event-gambar-max").attr("src", newSrc);
         $(".modal-title").text("Event ID : " + idprofil);
      });
   });
</script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
@endsection