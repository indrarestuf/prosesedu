<div class="my-1 p-3 bg-white rounded shadow"> 
                     
                    <form method="POST" action="{{ route('admin.usercreate') }}">
                        @csrf

                        <div class="form-group">

                                <input id="name" placeholder="Nama Lengkap" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>


                        </div>
                        
                        <div class="form-group">
         
                                <input id="username"  placeholder="Username"  type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                        </div>

                        <div class="form-group">
                                <input id="email"  placeholder="Email"  type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        </div>
                        
                   <div class="form-group">
                  <select class="form-control custom-select" name="role">
                    <option>Pilih Status</option>
                    <option value="1" >Tutor</option>
                    <option value="2" >Siswa</option>
                  </select>

              </div>
       


                        <div class="form-group">
                        <input id="password"  placeholder="Kata Sandi"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        </div>

                        <div class="form-group">
                        <input id="password-confirm"  placeholder="Konfirmasi Kata Sandi"  type="password" class="form-control" name="password_confirmation" required>
                        </div>

                                <button type="submit" class="btn btn-block btn-primary">
                                    Tambah User
                                </button>

                    </form>
  </div>
