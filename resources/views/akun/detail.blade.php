@extends('app')

@section('title', 'Detail Account')

@section('link')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
   @media (min-width: 992px) {
      .div-ganti-pw {
         position: relative;
         top: -22rem;
      }
   }
</style>
@endsection

@section('content')

<!-- End of Topbar -->
<div class="container-fluid">
   <form method="post" action="{{route('updateakun')}}" enctype="multipart/form-data">
      @csrf
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between">
         <h2 class="h5 mb-2 text-gray-800">
            <a href="{{$back['url']}}" class="text-decoration-none">
               <i class="fa fa-chevron-left"></i> Kembali ke {{$back['title']}}</a>
         </h2>
         <button type="submit" class="mb-2 btn btn-primary">Update Akun</button>
      </div>
      <!-- DataTales Example -->
      <div class="row">
         <div class="col-lg-6">
            <div class="card shadow mb-4">
               <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Accont</h6>
               </div>
               <div class="card-body">
                  <div class="form-group">
                     <label for="inputEmail4">No Hp</label>
                     <input type="text" name="nohp" class="form-control" id="inputEmail4" placeholder="No Hp" required value="{{$data['nohp']}}" readonly>
                  </div>
                  <div class="form-group">
                     <label for="inputusername">Username</label>
                     <input type="text" name="username" class="form-control" id="inputusername" placeholder="Username" required value="{{$data['username']}}">
                  </div>
                  <div class="form-group">
                     <label for="inputgambar">Gambar</label>
                     <div class="custom-file">
                        <input type="file" name="gambar" accept="image/*" class="custom-file-input" id="inputgambar" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01" style="z-index: 0;">Choose file</label>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="inputState1">Role</label>
                     <input type="text" name="role" class="form-control" id="inputState1" placeholder="Role" required value="{{$data['role']}}" readonly>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="card shadow mb-4">
               <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary title-user-role">Detail Accont {{$data->role}}</h6>
               </div>
               <div class="card-body">
                  <div class="form-group">
                     <label for="inputemail">Email</label>
                     <input type="email" name="email" class="form-control" id="inputemail" value="{{$data['email']}}">
                  </div>
                  <div class="form-group">
                     <label for="inputnik">NIK</label>
                     <input type="number" name="nik" class="form-control" id="inputnik" value="{{$data['nik']}}">
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="inputjeniskelamin">Jenis kelamin</label>
                        <select id="inputjeniskelamin" name="jeniskelamin" class="form-control">
                           @if($data['jeniskelamin'] == "laki-laki")
                           <option selected value="laki-laki">Laki-laki</option>
                           <option value="perempuan">perempuan</option>
                           @endif
                           @if($data['jeniskelamin'] == "perempuan")
                           <option value="laki-laki">Laki-laki</option>
                           <option selected value="perempuan">perempuan</option>
                           @endif
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputtanggal">Tanggal Lahir</label>
                        <input type="date" name="tanggallahir" class="form-control" id="inputtanggal" value="{{$data['tanggallahir']}}">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="inputalamat">Alamat</label>
                     <input type="text" name="alamat" class="form-control" id="inputalamat" value="{{$data['alamat']}}">
                  </div>
                  @if($data['role']=='ahli')
                  <div class="form-group user-role-ahli">
                     <label for="inputbintang">Keahlian 2</label>
                     <select id="inputbintang" name="bintang" class="form-control" style="max-height: 150px; overflow-y: auto;">
                        @for ($i = 1; $i <= 50; $i++) <option @if($data['bintang']==$i/10) selected @endif value="{{ $i/10 }}">{{ $i/10 }}</option>
                           @endfor
                     </select>
                  </div>
                  <div class="form-group user-role-ahli">
                     <label for="inputnip">NIP</label>
                     <input type="number" name="nip" class="form-control" id="inputnip" value="{{$data['nip']}}">
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6 user-role-ahli">
                        <label for="inputkeahlian1">Keahlian 1</label>
                        <select id="inputkeahlian1" name="keahlian1" class="form-control">
                           <option>Bidang Keahlian 1</option>
                           <option @if($data['keahlian1']=='pertanian' ) selected @endif value="pertanian">Bidang Pertanian</option>
                           <option @if($data['keahlian1']=='perternakan' ) selected @endif value="perternakan">Bidang Perternakan</option>
                           <option @if($data['keahlian1']=='teknologi' ) selected @endif value="teknologi">Teknologi Pertanian dan Perternakan</option>
                           <option @if($data['keahlian1']=='pasar' ) selected @endif value="pasar">Pemasaran Pertanian dan Perternakan</option>
                           <option @if($data['keahlian1']=='lingkungan' ) selected @endif value="lingkungan">konservasi dan lingkungan</option>
                        </select>
                     </div>
                     <div class="form-group col-md-6 user-role-ahli">
                        <label for="inputkeahlian2">Keahlian 2</label>
                        <select id="inputkeahlian2" name="keahlian2" class="form-control">
                           <option>Bidang Keahlian 2</option>
                           <option @if($data['keahlian2']=='pertanian' ) selected @endif value="pertanian">Bidang Pertanian</option>
                           <option @if($data['keahlian2']=='perternakan' ) selected @endif value="perternakan">Bidang Perternakan</option>
                           <option @if($data['keahlian2']=='teknologi' ) selected @endif value="teknologi">Teknologi Pertanian dan Perternakan</option>
                           <option @if($data['keahlian2']=='pasar' ) selected @endif value="pasar">Pemasaran Pertanian dan Perternakan</option>
                           <option @if($data['keahlian2']=='lingkungan' ) selected @endif value="lingkungan">konservasi dan lingkungan</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group user-role-ahli">
                     <label for="inputkantor">Kantor</label>
                     <input type="text" name="kantor" class="form-control" id="inputkantor" value="{{$data['kantor']}}">
                  </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </form>
   <div class="row div-ganti-pw">
      <div class="col-lg-6">
         <form method="post" action="{{route('gantipasswordakun')}}">
            <div class="accordion" id="accordionExample">
               <div class="card shadow mb-4">
                  @csrf
                  <div class="card-header py-3" id="headingOne">
                     <h6 class="m-0 font-weight-bold text-primary">
                        <a class="text-justify btn-collapse" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none;">
                           Ganti Password
                           <i class="fa fa-chevron-down"></i>
                        </a>
                     </h6>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                     <div class="card-body">
                        <input type="hidden" name="nohp" class="form-control" id="inputPassword40" placeholder="nohp" required value="{{$data['nohp']}}">
                        <div class="form-group">
                           <label for="inputPassword4">Password Sebelumnya</label>
                           <input type="password" name="l-password" class="form-control" id="inputPassword4" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                           <label for="inputPassword41">Password Baru</label>
                           <input type="password" name="password" class="form-control" id="inputPassword41" placeholder="Konfirmasi Password" required>
                        </div>
                        <div class="form-group">
                           <label for="inputPassword42">Konfirmasi Password Baru</label>
                           <input type="password" name="c-password" class="form-control" id="inputPassword42" placeholder="Konfirmasi Password" required>
                        </div>
                        <button type="submit" class="float-right mb-3 btn btn-primary">Reset Password Akun</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>


@endsection

@section('script')

<!-- Page level custom scripts -->
<script src="js/demo/form-account.js"></script>
<!-- script -->
@endsection